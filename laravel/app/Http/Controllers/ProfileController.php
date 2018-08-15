<?php

namespace App\Http\Controllers;

use App\Profile;
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
        $this->data['user'] = Auth::user();
        $this->data['timezones'] = \DateTimeZone::listIdentifiers();

        return view('profile')->with('data',$this->data);
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
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;

            $user->org_name = $request['org_name'];
            $user->email = $request['email'];
        }

        if($user->save()){
            session()->put('success', 'Profile updated');
            return back()->withInput(['tab'=>'edit']);
        }
        session()->put('error', 'Something went wrong!');
        return back()->withInput(['tab'=>'edit']);
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
