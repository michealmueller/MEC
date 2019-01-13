<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sorted = [];
        $pubEvents = Event::where('private', 0)->with('organization')->get();

        $events = new EventController();
        $timezonedata = $events->getTimeZone();
        //dd($timezonedata);
        session()->put('timezone', $timezonedata->time_zone->name);
        //remove outdated public events
        if(!$today = Carbon::now()->setTimezone(session()->get('timezone'))->format('Y-m-d')){
            $today = Carbon::now()->setTimezone(session()->get('timezone'))->format('Y-m-d');
        }
        //dd($this->data['pubEvents']);
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

        return view('home')->with('sorted', $sorted);
    }

    public function faq(){
        return view('faq');
    }
}
