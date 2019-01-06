<?php

namespace App\Http\Controllers;

use App\Events\AuthorizeRequest;
use App\Organization;
use App\OrgCalendar;
use App\Traits\ValidateInputTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\ProfileController as ProfileController;

class OrganizationController extends Controller
{
    const CRYPT_STD_DES = 1;

    public function requests($id, $organization_id, $user_id)
    {
        if($id == 1){
            $user = User::whereId($user_id)->get();
            $user = $user[0];

            $user->organization_id = $organization_id;
            $updated = $user->update();

            if($updated){
                $eventFired = event(new AuthorizeRequest($user));
                if($eventFired) {
                    session()->put('success', 'User has been approved and added to the Org.');
                    //add user to members DB
                    DB::table('members')->insert([
                        'user_id' => $user->id,
                        'organization_id' => $user->organization_id,
                        'created_at' => Carbon::now(),
                    ]);
                    DB::table('requests')
                        ->where('user_id', $user_id)
                        ->where('organization_id', $organization_id)
                        ->delete();
                    return back();
                }
            }
            session()->put('error', 'There was an error approving the user, <b>notification was not sent.</b>');
            return back();
        }else{
            DB::table('requests')
                ->where('user_id', $user_id)
                ->where('organization_id', $organization_id)
                ->delete();
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

            return $hash;
    }

    public function index()
    {
        //
        return view('createOrganization');
    }

    public function profile(Organization $organization)
    {
        $profileController = new ProfileController();
        $org_requests = self::getOrgRequests($organization->id);
        $members = $organization->users;

        $sharing = [];
        $shared = DB::table('shared')->where('organization_id', Auth::user()->organization->id)->get();
        if (count($shared) > 0) {
            $sharing = $shared;
            foreach ($sharing as $k => $v) {
                $org_name = Organization::whereId($v->shared_id)->value('org_name');
                $sharing[$k]->org_name = $org_name;
            }
        }
        $notSharedOrgs = self::getNotSharedOrgs($shared);

        return view('organizationProfile')->with([
            'orgid' => $organization->id,
            'user' => Auth::user(),
            'organization' => $organization,
            'members' => $members,
            'org_requests' => $org_requests,
            'sharing' => $sharing,
            'org_list' =>$notSharedOrgs,
        ]);
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
            /*} else {
                $orgMembers = User::whereOrganizationId($exists[0]->id)->where('lead', 1)->get();

                foreach ($orgMembers as $member) {
                    //fire request event
                    event(new OrganizationRequest($member, $exists[0]));

                }
                session()->put('info', 'Your request to join this organization has been sent, Watch your email for more info.');
                $request = DB::table('requests')->insert([
                    'user_id' => $user->id,
                    'organization_id' => $exists[0]->id,
                    'created_at' => Carbon::now(),
                ]);

                return $user;
            }*/

            //set use information after creating organization.
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
        /*//TODO:: finish joining and organization.
        $orgMembers = User::whereOrganizationId($exists[0]->id)->where('lead', 1)->get();

        foreach ($orgMembers as $member) {
            //fire request event
            event(new OrganizationRequest($member, $exists[0]));

        }
        session()->put('info', 'Your request to join this organization has been sent, Watch your email for more info.');
        $request = DB::table('requests')->insert([
            'user_id' => $user->id,
            'organization_id' => $exists[0]->id,
            'created_at' => Carbon::now(),
        ]);

        return $user;*/
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
        if($this->updateValidator($request->all(), $organization->id)->validate()) {
            if($request->hasFile('org_logo')){
                $request->org_logo->storeas('org_logos', $request->org_logo);
                $organization->org_logo = $request->org_logo;
            }
            $organization->org_name = $request->org_name;
            $organization->org_rsi_site = $request->org_rsi_site;
            $organization->org_discord = $request->org_discord;

            $save = $organization->update();
            if($save){
                //set notification
                session()->put('success', 'Organization Information Updated!');
                //set recent activity
                //TODO:: this!
                return back();
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }

    public function getOrgRequests($org_id)
    {
        $requestsData = [];
        $orgRequests = DB::table('requests')->where('organization_id', $org_id)->get();

        foreach($orgRequests as $req){
            $requestsData[] = User::whereId($req->user_id)->get()->first();
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
                'replaceText' => '<a href="https://events.citizenwarfare.com/join/ref/'.$refHash.'">'.$refHash.'</a>',
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
