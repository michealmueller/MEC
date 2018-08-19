<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\RssController as Rss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('profile')->with(['sharing'=>$sharing, 'org_list'=>$notSharedOrgs]);
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
        $request->validate([
            'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:1024',
            'org_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'min:6|confirmed'
        ]);

        if(Auth::check())
        {
            $user = Auth::user();
        }

        if(!$request->hasFile('avatar')) {
            $user->org_name = $request['org_name'];
            $user->email = $request['email'];
        }

        if($request->hasFile('avatar')) {
            $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('org_logos', $avatarName);
            //$user->avatar = $avatarName;

            $user->email = $request['email'];
            //update organization info
            $organization = Organization::whereId($user->organization->id)->get();
            $organization = $organization[0];
            $organization->org_logo = $avatarName;
            $organization->org_name = $request->org_name;
        }

        if($user->save() && $organization->save()){
            session()->put('success', 'Profile updated');
            return back()->withInput(['tab'=>'edit']);
        }

        session()->put('error', 'Something went wrong!');
        return back()->withInput(['tab'=>'edit']);
    }

    public function updateShare(Request $request)
    {

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
        foreach($shared as $k=>$v){
            $sharedOrgsArray[] = $shared[$k]->shared_id;
        }
        $orgs = Organization::all();
        foreach ($orgs as $org){
            $list[] = $org->id;
        }
        $notShared = array_diff($list, $sharedOrgsArray);

        foreach($notShared as $org_id){
            $notSharedOrgs[] = Organization::whereId($org_id)->get()->first();
        }

        return $notSharedOrgs;
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
