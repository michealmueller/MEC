<?php

namespace App\Http\Controllers;

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
        session()->put('error', 'Sorry Registration is disabled, contact support@citizenwarfare.com for more information.');
        return back();
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
}
