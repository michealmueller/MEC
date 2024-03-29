<?php

namespace App\Http\Controllers;

use App\Organization;
use Calendar;
use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\EventController as EventController;

class OrgCalendarController extends Controller
{
    protected $data;

    public function __construct()
    {
        $event = new EventController;
        $this->data = [
            //'timezonedata' => $event->getTimeZone(),
            'eventData' => $event->getEventInfo(),
            'timezones' => config('timezones.zones'),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($organization)
    {
        //todo::put this into middleware
        if(Auth::user()->organization->id != Organization::whereOrgName($organization)->value('id')){
            session()->put('error', 'Sorry but you do not have permission to view this Organizations Private Calendar');
            return back();
        }

        $tz = Input::get('timezone');
        if($tz === null){
            $timezone = $this->data['timezonedata']->time_zone->name ?? 'UTC';
        }else{
            $timezone = $tz;
        }

        if(isset($timezone->message)){
            $timezone = 'UTC';
        }
        $events = [];

        //get organization events and user events and combine them together.
        $data = self::getEventsAndSharedOrgEvents();
        $userEvents = self::getAllUserEvents();

        $data = $data->concat($userEvents);

        if($data->count()){

            foreach ($data as $key => $value) {
                //create carbon object with timezone information so that it can be converted to the users TZ
                //time that is stored in DB is converted from user time to UTC so we need to take it from UTC to user TZ
                $timezoneDTZ = new \DateTimeZone($timezone);
                $start_date = Carbon::parse($value->start_date)->setTimezone('UTC');
                $end_date = Carbon::parse($value->end_date)->setTimezone('UTC');

                $start_date = Carbon::parse($value->start_date)->setTimezone($timezoneDTZ);
                $end_date = Carbon::parse($value->end_date)->setTimezone($timezoneDTZ);

                //dd($date->settimezone('UTC'));
                $events[] = Calendar::event(
                    $value->title ,
                    false,
                    new \DateTime($start_date),
                    new \DateTime($end_date),
                    $value->id,
                    [
                        'BackgroundColor' => $value->backgroundColor,
                        'TextColor' => $value->textColor,
                        'BorderColor' => $value->borderColor,
                        'url' => '/view/event/'.$value->id,
                        //'avatar'=> User::findOrFail($value->creator)->organization->org_logo,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)->setCallbacks([
            'eventRender'=>'function(event,element,view){
                var dateString = event.start.format("YYYY-MM-DD");
                
                $(view.el[0]).find(".fc-day[data-date="+dateString+"]")
                .css("background-image","url(/storage/app/org_logos/"+event.avatar+")")
                .css("background-repeat","no-repeat")
                .css("background-size", "100%");
            }'

        ]);
        //dd($this->data, $calendar, $timezone);
        return view('welcome')->with(['timezones'=>$this->data['timezones'], 'calendar'=>$calendar, 'selectedTZ'=>$timezone]);
    }

    public function userCal(User $user)
    {
        /*//todo::put this into middleware
        if(Auth::user()->organization->id != Organization::whereOrgName($organization)->value('id')){
            session()->put('error', 'Sorry but you do not have permission to view this Organizations Private Calendar');
            return back();
        }*/

        //$tz = Input::get('timezone');
        $timezone = session()->get('timezone');
        $events = [];

        $data = self::getUserEvents($user);
        $userEvents = self::getAllUserEvents();
//check for duplicate events, and self created events.
        foreach($userEvents as $k=>$item){
            $eventID = $item->id;
            foreach ($data as $event){
                if($eventID === $event->id){
                    unset($userEvents[$k]);
                }
            }
        }
        $data = $data->concat($userEvents);

        if($data->count()){

            foreach ($data as $key => $value) {
                //create carbon object with timezone information so that it can be converted to the users TZ
                //time that is stored in DB is converted from user time to UTC so we need to take it from UTC to user TZ
                $timezoneDTZ = new \DateTimeZone($timezone);
                $start_date = Carbon::parse($value->start_date)->setTimezone('UTC');
                $end_date = Carbon::parse($value->end_date)->setTimezone('UTC');

                $start_date = Carbon::parse($value->start_date)->setTimezone($timezoneDTZ);
                $end_date = Carbon::parse($value->end_date)->setTimezone($timezoneDTZ);

                //dd($date->settimezone('UTC'));
                $events[] = Calendar::event(
                    $value->title ,
                    false,
                    new \DateTime($start_date),
                    new \DateTime($end_date),
                    $value->id,
                    [
                        'BackgroundColor' => $value->backgroundColor,
                        'TextColor' => $value->textColor,
                        'BorderColor' => $value->borderColor,
                        'url' => '/view/event/'.$value->id,
                        //'avatar'=> User::findOrFail($value->creator)->organization->org_logo,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)->setCallbacks([
            'eventRender'=>'function(event,element,view){
                var dateString = event.start.format("YYYY-MM-DD");
                
                $(view.el[0]).find(".fc-day[data-date="+dateString+"]")
                .css("background-image","url(/storage/app/org_logos/"+event.avatar+")")
                .css("background-repeat","no-repeat")
                .css("background-size", "100%");
            }'

        ]);
        return view('welcome')->with(['timezones'=>$this->data['timezones'],'calendar'=>$calendar, 'selectedTZ'=>$timezone]);
    }

    public function getUserEvents($user)
    {
        $userEvents = Event::where('user_id', $user->id)->get();
        //get events that have been shared to us.
        /*$sharedOrgs = DB::table('shared')->where('shared_id', Auth::user()->organization->id)->get()->toArray();

        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->organization_id;
        }
        foreach($sharedOrgsArray as $k=>$v){
            $event = Event::where('organization_id', $v)->where('private', 0)->get();

            if(count($event)) {
                foreach($event as $key=>$val){
                    $data->push($val);
                }
            }
        }*/
        return $userEvents;
    }

    public function getAllUserEvents()
    {
        $userEvents = Event::whereNotNull('user_id')->get();
        //get events that have been shared to us.
        /*$sharedOrgs = DB::table('shared')->where('shared_id', Auth::user()->organization->id)->get()->toArray();

        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->organization_id;
        }
        foreach($sharedOrgsArray as $k=>$v){
            $event = Event::where('organization_id', $v)->where('private', 0)->get();

            if(count($event)) {
                foreach($event as $key=>$val){
                    $data->push($val);
                }
            }
        }*/
        return $userEvents;
    }

    public function getEventsAndSharedOrgEvents()
    {
        $sharedOrgsArray = [];
        //get organization Events
        $data = Event::where('organization_id', Auth::user()->organization->id)->get();
//get events that have been shared to us.
        $sharedOrgs = DB::table('shared')->where('shared_id', Auth::user()->organization->id)->get()->toArray();

        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->organization_id;
        }
        foreach($sharedOrgsArray as $k=>$v){
            $event = Event::where('organization_id', $v)->where('private', 0)->get();

            if(count($event)) {
                foreach($event as $key=>$val){
                    $data->push($val);
                }
            }
        }
        return $data;
    }

    public function giveLead(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->lead = 1;
        $user->update();

        $response = collect(
            (object)[
                'selector' => 'lead'.$request->id,
                'notificationType' => 'info',
                'notificationMsg' => 'Successfully set user '. $user->username .' as an event lead',

                'replaceText' => '<span class="u-label u-label-warning g-color-white">Event Lead</span><br>
                                <button class="btn btn-xs btn-danger" onclick="ajaxRequest(\'/profile/remove/lead\',\'\',\'save\',\'\', '.$request->id.')">
                                Remove Event Lead</button>',

                'errorMsg' => 'Could not add user '. $user->username .' as an Event lead.'
            ]);
        return $response;
    }

    public function removeLead(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->lead = 0;
        $user->update();

        $response = collect(
            (object)[
                'selector' => 'lead'.$request->id,
                'notificationType' => 'danger',
                'notificationMsg' => 'Removed user '. $user->username .' as an event lead',
                'replaceText' => '<button class="btn btn-xs btn-success" onclick="ajaxRequest(\'/profile/add/lead\',\'\',\'save\',\'\', '.$request->id.')">
                               Make Event Lead</button>',
                'errorMsg' => 'Could not add user '. $user->username .' as an Event lead.'
            ]);
        return $response;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrgCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(OrgCalendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrgCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(OrgCalendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrgCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrgCalendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrgCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgCalendar $calendar)
    {
        //
    }
}
