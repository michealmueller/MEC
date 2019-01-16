<?php

namespace App\Http\Controllers;

use App\Events\AuthorizeRequest;
use App\Organization;
use App\OrganizationRequest;
use App\OrganizationRequests;
use App\OrgCalendar;
use App\RecentActivity;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    const CRYPT_STD_DES = 1;

    public function requests($id, Organization $organization, User $user)
    {
        if($id == 1){
            //update user
            $user->organization_id = $organization->id;
            $updated = $user->update();

            if($updated){
                $eventFired = event(new AuthorizeRequest($user));
                if($eventFired) {
                    session()->put('success', 'User has been approved and added to the Org.');
                    //add user to members DB
                    DB::table('members')->insert([
                        'user_id' => $user->id,
                        'organization_id' => $organization->id,
                        'created_at' => Carbon::now(),
                    ]);
                    $requests = new OrganizationRequests;
                    $requests->where('user_id', $user->id)
                        ->where('organization_id', $organization->id)
                        ->delete();

                    $user->organization_requests_id = null;
                    $user->update();

                    $recent = new RecentActivity;
                    $recent->create([
                        'organization_id' => $organization->id,
                        'message' => 'Approved User Request.',
                    ]);
                    return back();
                }
            }
            session()->put('error', 'There was an error approving the user, <b>notification was not sent.</b>');
            return back();
        }else{
            $requests = new OrganizationRequests;
            $requests->where('user_id', $user->id)
                ->where('organization_id', $organization->id)
                ->delete();

            $user->organization_requests_id = null;
            $user->update();
        }
        return back();
    }

    public function generateHash($organization_id)
    {

        $organization = DB::table('organizations')->where('id', $organization_id)->value('org_name');
            //generate the hash for invitations
            $time = Carbon::now()->format('s').Carbon::now()->format('H');
            $hash = crypt($organization, $time);

            $hash = crypt(19, Carbon::now()->format('s').Carbon::now()->format('H'));
            $hash = str_replace('.', '', $hash);
            $hash = str_replace('/', '', $hash);
            $hash = str_replace('\\', '', $hash);

            //store the hash in the DB for future reference( this gets overwritten every time its generated.)
            DB::table('organizations')->where('id', $organization_id)->update([
                'refHash' => $hash
            ]);

            $recent = new RecentActivity;
            $recent->create([
                'organization_id' => $organization->id,
                'message' => 'Generated a new Reference code.',
            ]);
            return $hash;
    }

    public function index()
    {
        //
        return view('createOrganization');

    }

    public function profile(Organization $organization)
    {
        $members = $organization->users;
        $recent = new RecentActivity;
        $recentActivity = $recent->where('organization_id', $organization->id)->orderBy('created_at', 'DESC')->get()->all();

        if(Auth::check() && isset(Auth::user()->organization)){
            $org_requests = self::getOrgRequests($organization);
            $sharing = [];
            $shared = DB::table('shared')->where('organization_id', $organization->id)->get();
            if (count($shared) > 0) {
                $sharing = $shared;
                foreach ($sharing as $k => $v) {
                    $org_name = Organization::whereId($v->shared_id)->value('org_name');
                    $sharing[$k]->org_name = $org_name;
                }
            }
            $notSharedOrgs = self::getNotSharedOrgs($shared);

            return view('organizationProfile2')->with([
                'orgid' => $organization->id,
                'user' => Auth::user(),
                'organization' => $organization,
                'members' => $members,
                'org_requests' => $org_requests,
                'sharing' => $sharing,
                'org_list' =>$notSharedOrgs,
                'recent' => $recentActivity,
            ]);
        }else{
            if(count(DB::table('requests')->where('user_id', Auth::user()->id)->get()) > 0){
                $requested = true;
            }else{
                $requested = false;
            }
            return view('organizationProfile2')->with([
                'orgid' => $organization->id,
                'user' => Auth::user(),
                'organization' => $organization,
                'members' => $members,
                'requested' => $requested,
                'arrData' =>json_encode([
                    'org_id'=> $organization->id,
                    'user_id' => Auth::user()->id,
                ]),
                'recent' => $recentActivity,
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'org_logo' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
            'org_rsi_site' => 'required|url|unique:organizations,org_rsi_site',
            'org_name' => 'required|max:255|unique:organizations,org_name',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(Request $request)
    {
        //
        if($this->validator($request->all())->validate()) {
            dd($request);
            //create the Organization
            $logoPath = $request->org_logo->storeas('org_logos', $request->org_logo);
            $organization = Organization::create([
                'org_logo' => $logoPath,
                'org_name' => $request->org_name,
                'org_rsi_site' => $request->org_rsi_site,
                'org_discord' => $request->org_discord,
            ]);

            $user = Auth::user();
            $user->organization_id = $organization->id;
            $user->lead = 1;
            $user->update();

            //create the ref code for use in the email.

            $this->generateHash($organization->id);

            //Create the calendar
            $calendar = OrgCalendar::create([
                'cal_url' => '/' . $organization->org_name . '/calendar',
                'organization_id' => $organization->id,
                'public' => 0,
            ]);
            $recent = new RecentActivity;
            $recent->create([
                'user_id' => Auth::user()->id,
                'message' => 'You created the Organization '.$user->organization->org_name,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {
        //get admins to notify them
        $orgLeads = User::whereOrganizationId($request->user_id)->where('lead', 1)->get();

        foreach ($orgLeads as $leads) {
            //fire request event
            event(new OrganizationRequest($leads, Organization::findOrFail($request->org_id) ));

        }
        session()->put('info', 'Your request to join this organization has been sent, Watch your email for more info.');
        $saved = OrganizationRequests::create([
            'user_id' => $request->user_id,
            'organization_id' => $request->org_id,
        ]);


        if($saved){
            //update user table
            $user = Auth::user();
            $user->organization_requests_id = $saved->id;
            $user->update();

            $response = collect(
                (object)[
                    'selector' => 'answer',
                    'selector2' => '',
                    'notificationType' => 'success',
                    'notificationMsg' => 'Successfully Requested Membership.',
                    'replaceText' => '<h4>Request Sent</h4>',
                    'errorMsg' =>'Error while sending your request'
                ]);

            $recent = new RecentActivity;
            $recent->create([
                'user_id' => Auth::user()->id,
                'message' => 'You joined the Organization '.$user->organization->org_name,
            ]);
            $recent->create([
                'organization_id' => $request->org_id,
                'message' => 'There is a new Recruitment Request'
            ]);
            return $response;
        }
    }

    protected function updateValidator($data, $org_id)
    {
        return Validator::make($data, [
            'org_logo' => 'image|mimes:jpeg,jpg,png,gif|max:1024,'.$org_id,
            'org_rsi_site' => 'required|url|unique:organizations,org_rsi_site,'.$org_id,
            'org_name' => 'required|max:255|unique:organizations,org_name,'.$org_id,
            'org_discord' => 'max:255',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
        //dd($request->org_logo->getClientOriginalExtension());
        if($this->updateValidator($request->all(), $organization->id)->validate()) {
            if($request->hasFile('org_logo')){
                $logoName = $organization->id.'_logo.'.$request->org_logo->getClientOriginalExtension();

                $request->org_logo->storeAs('org_logos', $logoName);
                $organization->org_logo = $logoName;
            }
            $organization->org_name = $request->org_name;
            $organization->org_rsi_site = $request->org_rsi_site;
            $organization->org_discord = $request->org_discord;

            $save = $organization->update();
            if($save){
                $recent = new RecentActivity;
                $recent->create([
                    'organization_id' => $organization->id,
                    'message' => 'Updated Organization Information.',
                ]);
                //set notification
                session()->put('success', 'Organization Information Updated!');
                //set recent activity
                //TODO:: this!
                return back();
            }
        }
    }

    public function getOrgRequests(Organization $organization)
    {
        $requestsData = [];
        $orgRequests = $organization->requests->all();
        foreach($orgRequests as $req){
            $requestsData[] = User::findOrFail($req->user_id);
        }
        return $requestsData;
    }

    public function genRefCode(Request $request)
    {
        $org = new OrganizationController;
        $refHash = $org->generateHash(Auth::user()->organization_id);
        $response = collect(
            (object)[
                'selector' => 'refHash',
                'selector2' => 'refHash2',
                'notificationType' => 'info',
                'notificationMsg' => 'Successfully created your new reference code',
                'replaceText' => '<a href="https://citizenwarfare.com/join/ref/'.$refHash.'">'.$refHash.'</a>',
                'errorMsg' =>'Error While generating your new reference code'
            ]);

        return $response;
    }

    public function updateShare(Request $request)
    {
        $sharedOrgsArray = [];
        $sharedOrgs = DB::table('shared')->where('organization_id', Auth::user()->organization->id)->get()->toArray();
        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->shared_id;
        }

        //check if form value is null ( happens when all items are removed from right listbox.
        if(!is_null($request['share'])) {
            $add = array_diff($request['share'], $sharedOrgsArray); //needs Added to DB
            $remove = array_diff($sharedOrgsArray, $request['share']); //needs removed from DB
        }else{
            $add = [];
            $remove = $sharedOrgsArray;
        }

        if(count($add) > 0){
            foreach($add as $share){
                DB::table('shared')
                    ->insert([
                        'organization_id' => Auth::user()->organization->id,
                        'shared_id' => $share,
                    ]);
            }
        }
        if(count($remove) > 0){
            foreach($remove as $share){
                DB::table('shared')
                    ->where('organization_id', Auth::user()->organization->id)
                    ->where('shared_id', $share)
                    ->delete();
            }
        }
        session()->put('success', 'Updated Share Settings.');
        return back();
        /*dd($request);
        foreach($request->share as $share) {
            $updated = DB::table('shared')->insert([
                'organization_id' => Auth::user()->organization->id,
                'shared_id' => $share
            ]);
        }*/
    }

    public function getNotSharedOrgs($shared)
    {
        $sharedOrgsArray = [];
        foreach($shared as $k=>$v){
            $sharedOrgsArray[] = $shared[$k]->shared_id;
        }
        $orgs = Organization::all();
        foreach ($orgs as $org){
            $list[] = $org->id;
        }
        $notShared = array_diff($list, $sharedOrgsArray);
        //unset the users organization so that it cannot be selected.
        $userOrg = array_search(Auth::user()->organization_id, $notShared);
        unset($notShared[$userOrg]);

        if(count($notShared) >=1) {
            foreach ($notShared as $org_id) {
                $notSharedOrgs[] = Organization::whereId($org_id)->get()->first();
            }
            return $notSharedOrgs;
        }

    }
}
