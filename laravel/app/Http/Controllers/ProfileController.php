<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\RssController as Rss;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Http\Controllers\OrganizationController as OrganizationController;

class ProfileController extends Controller
{

    private $data;
    private $rss;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->organization_id){
            session()->put('info', 'You must wait to be approved.');
            return redirect('/');
        }
        $status = self::determineFounderSub(Auth::user());
        $sharing = [];
        $shared = DB::table('shared')->where('organization_id', Auth::user()->organization->id)->get();
        if(count($shared) > 0){
            $sharing = $shared;
            foreach($sharing as $k=>$v)
            {
                $org_name = Organization::whereId($v->shared_id)->value('org_name');
                $sharing[$k]->org_name = $org_name;
            }
        }
        $notSharedOrgs = self::getNotSharedOrgs($shared);

        $org_requests = self::getOrgRequests(Auth::user()->organization_id);

        $OrgController = new OrganizationController;

        $members = Auth()->user()->organization->users;

        return view('profile')->with(['sharing'=>$sharing, 'org_list'=>$notSharedOrgs, 'org_requests' => $org_requests,
            'status'=>$status, 'members' => $members]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            //validate input.
            //dd($request);
            $request->validate([
                'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:1024',
                'username' => ['required', Rule::unique('users')->ignore(Auth::id())],
                'email' => ['required', Rule::unique('users')->ignore(Auth::id())],
                'password' => 'min:6|confirmed'
            ]);

            if (Auth::check()) {
                $user = Auth::user();
                $organization = Organization::whereId($user->organization->id)->get();
                $organization = $organization[0];
            }

            if (!$request->hasFile('avatar')) {
                $user->email = $request['email'];
                $user->username = $request['username'];
            }

            if ($request->hasFile('avatar')) {
                $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('org_logos', $avatarName);
                //$user->avatar = $avatarName;

                //update organization info

                $organization->org_logo = $avatarName;
            }

            $user->email = $request['email'];

            if ($user->save() && $organization->save()) {
                session()->put('success', 'Profile updated');
                return back()->withInput(['tab' => 'edit']);
            }

            session()->put('error', 'Something went wrong!');
            return back()->withInput(['tab' => 'edit']);
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

    public function addDiscordBot(Request $request)
    {

    }

    public function updateShare(Request $request)
    {
        $sharedOrgsArray = [];
        $sharedOrgs = DB::table('shared')->where('organization_id', Auth::user()->organization->id)->get()->toArray();
        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->shared_id;
        }
        $add = array_diff($request['share'],$sharedOrgsArray); //needs Added to DB
        $remove = array_diff($sharedOrgsArray, $request['share']); //needs removed from DB
        //dd($add, $remove, $request['share'], $sharedOrgs, $sharedOrgsArray);

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

    public function determineFounderSub($user)
    {
        //Founder should be before jan 1st 2019
        $regDate = Carbon::parse($user->created_at);

        if($regDate->year <= 2019){
            $status['founder'] = true;
        }

        if($user->card_brand != null){
            $status['sub'] = true;
        }else{
            $status['sub'] = false;
        }
        //dd($status);
        return $status;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
