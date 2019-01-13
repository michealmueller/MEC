<?php

namespace App\Http\Controllers;

use App\Event;
use App\Organization;
use App\Profile;
use App\RecentActivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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
        $recent = new RecentActivity;
        $requests = null;
        $recentActivity = $recent->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get()->all();

        $sorted = [];
        $pubEvents = Event::where('private', 0)->orderBy('start_date', 'DESC')->get()->all();

        //remove outdated public events
        if(!$today = Carbon::now()->setTimezone(session()->get('timezone'))->format('Y-m-d')){
            $today = Carbon::now()->setTimezone(session()->get('timezone'))->format('Y-m-d');
        }

        foreach ($pubEvents as $k => $event) {
            $parsed = Carbon::parse($event->start_date)->setTimezone(session()->get('timezone'))->format('Y-m-d');
            if ($parsed < $today) {
                unset($pubEvents[$k]);
            }
            //sort for front page and profile.
            $weekStart = Carbon::getWeekStartsAt();
            $weekEnd = Carbon::getWeekEndsAt();

            if(Carbon::parse($event->start_date)->setTimezone(session()->get('timezone'))->format('Y-m-d') < $weekEnd && $event > $weekStart){
                $sorted['thisWeek'][] = $event;
            }elseif(Carbon::parse($event->start_date)->setTimezone(session()->get('timezone'))->format('m') === Carbon::now()->setTimezone(session()->get('timezone'))->format('m')){
                $sorted['thisMonth'][] = $event;
            }elseif(Carbon::parse($event->start_date)->setTimezone(session()->get('timezone'))->format('Y-m-d') === Carbon::now()->setTimezone(session()->get('timezone'))->format('Y-m-d')){
                $sorted['today'][] = $event;
            }
        }
        if(Auth::user()->organization){
            $requests = Auth::user()->organization->requests->all();
        }
        return view('profile2')->with(['sorted' =>$sorted, 'status'=> $status, 'org_list' => $orgs, 'recent'=>$recentActivity, 'requests' => $requests]);
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

        if($request->hasFile('avatar')) {
            $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->email = $request['email'];

        if($user->save()) {
            session()->put('success', 'Profile updated');
            $recent = new RecentActivity;
            $recent->create([
               'user_id' => Auth::user()->id,
               'message' => 'Profile Updated.'
            ]);
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
