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
        //$this->middleware('auth');
        $this->rss = new Rss;
        $this->data = [
            'feeddata' => $this->rss->fetch(3),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->data['user'] = Auth::user();
        $this->data['timezones'] = \DateTimeZone::listIdentifiers();
        //dd($this->data);

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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_height=100,max_width=100',
            'org_name' => 'required|string'
        ]);

        //general info update
        $updated = DB::table('users')->update([
            'org_name'=>$request->org_name,
        ]);


        //avatar update
        if($request->avatar) {


            $user = Auth::user();

            $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars', $avatarName);

            $user->avatar = $avatarName;
            $user->org_name = $request->org_name;
            $user->save();
        }

        return back()
            ->with('success','Updated Profile.');
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
