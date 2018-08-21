<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //$this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //session()->put('error', 'Sorry Registration is Required, contact support@citizenwarfare.com for more information.');
        $pubEvents = Event::where('private', 0)->with('organization')->get();

        return view('home')->with('pubEvents', $pubEvents);
    }

    public function Privacy()
    {
        //dd($this->data);
        return view('privacy');
    }

    public function Terms()
    {
        return view('terms');
    }

    public function Dev()
    {
        return view('aboutdev');
    }
}
