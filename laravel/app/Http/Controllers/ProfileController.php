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
        $status = self::determineFounderSub(Auth::user());

        $orgs = Organization::all();
        return view('profile')->with(['status'=> $status, 'org_list' => $orgs]);
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


        $user = Auth::user();

        $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars', $avatarName);

        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->avatar = $avatarName;
        $user->email = $request['email'];

        if($user->save()) {
            session()->put('success', 'Profile updated');
            return back();
        }else {
            session()->put('error', 'Something went wrong!');
            return back();
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
