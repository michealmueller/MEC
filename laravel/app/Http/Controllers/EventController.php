<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Calendar;
use App\Event;
use App\Http\Controllers\RssController as Rss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
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
        $this->rss = new Rss;
        $this->rss->store();
        $this->data = [
            'timezonedata' => self::getTimeZone(),
            'eventData' => self::getEventInfo(),
        ];
    }



    public function index($tz =null)
    {
        //dd($this->data['timezonedata']->timezone->name);

        $tz = Input::get('timezone');
        if($tz === null){
            $timezone = $this->data['timezonedata']->time_zone->name;
        }else{
            $timezone = $tz;
        }

        $events = [];
        $data = Event::all();

        if($data->count()){

            foreach ($data as $key => $value) {
                //create carbon object with timezone information so that it can be converted to the users TZ
                //time that is stored in DB is converted from user time to UTC so we need to take it from UTC to user TZ

                //dd($this->data);
                $timezoneDTZ = new \DateTimeZone($timezone);
                $start_date = Carbon::parse($value->start_date)->setTimezone('UTC');
                $end_date = Carbon::parse($value->end_date)->setTimezone('UTC');

                $start_date = Carbon::parse($value->start_date)->setTimezone($timezoneDTZ);
                $end_date = Carbon::parse($value->end_date)->setTimezone($timezoneDTZ);

                //dd($date->settimezone('UTC'));
                $events[] = Calendar::event(
                    $value->title,
                    false,
                    new \DateTime($start_date),
                    new \DateTime($end_date),
                    $value->id,
                    [
                        'eventBackgroundColor' => $value->backgroundColor,
                        'eventTextColor' => $value->textColor,
                        'eventBorderColor' => $value->borderColor,
                        'url' => '/view/event/'.$value->id,
                        'avatar'=> User::findOrFail($value->creator)->avatar,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)->setCallbacks([
           'eventRender'=>'function(event,element,view){
                var dateString = event.start.format("YYYY-MM-DD");
                
                $(view.el[0]).find(".fc-day[data-date="+dateString+"]")
                .css("background-image","url(/storage/app/avatars/"+event.avatar+")")
                .css("background-repeat","no-repeat")
                .css("background-size", "100%")
                .css("opacity",".3");
            }',

        ]);

        return view('welcome')->with(['calendar'=>$calendar, 'data'=>$this->data]);
    }

    public function viewEvent($eventId)
    {
        //$this->data['user'] = Auth::user();
        $eventSingle = Event::whereId($eventId)->get();

        return view('viewEvent')->with( 'eventData',$eventSingle[0]);
    }

    public function editEvent($eventId)
    {
        //$this->data['user'] = Auth::user();
        $eventSingle = Event::whereId($eventId)->get();
        //dd($eventSingle[0]);
        return view('editEvent')->with([
            'data' => $this->data,
            'eventData'=>$eventSingle[0]
        ]);
    }

    public function updateEvent(Request $request, $eventID)
    {
        $timezoneDTZ = new \DateTimeZone($this->data['timezonedata']->time_zone->name);
        $start_date = Carbon::parse($request->start_date, $timezoneDTZ);
        $end_date = Carbon::parse($request->end_date, $timezoneDTZ);

        $event = new Event;
        $event->exists = true;
        $event->id = $eventID;
        $event->title = $request->title;
        $event->start_date = $start_date->setTimezone('UTC');
        $event->end_date = $end_date->setTimezone('UTC');
        $event->brief_url = $request->brief;
        $event->comments = $request->comments;
        $event->backgroundColor = $request->backgroundColor;
        $event->borderColor = $request->borderColor;
        $event->textColor = $request->textColor;
        $event->creator = Auth::id();

        $event->update();

        return redirect('/view/event/'.$eventID);
    }

    public function newEvent(){
        //$this->data['user'] = Auth::user();
        return view('createEvent');
    }

    public function createEvent(Request $request)
    {

        //get the users timezone and convert it to UTC then save to DB.
        $timezoneDTZ = new \DateTimeZone($request->timezone);
        $start_date = Carbon::parse($request->start_date, $timezoneDTZ);
        $end_date = Carbon::parse($request->end_date, $timezoneDTZ);

        $event = new Event;
        $event->title = $request->title;
        $event->start_date = $start_date->setTimezone('UTC');
        $event->end_date = $end_date->setTimezone('UTC');
        $event->brief_url = $request->brief;
        $event->comments = $request->comments;
        $event->backgroundColor = $request->backgroundColor;
        $event->borderColor = $request->borderColor;
        $event->textColor = $request->textColor;
        $event->creator = Auth::id();
        $save = $event->save();

        if($save) {
            session()->put('success', 'Event Created!');
            return redirect('/');
        }

        return back();
    }

    public function removeEvent($eventId)
    {
        Event::destroy($eventId);
        session()->put('success','Event Removed');
        return redirect('/');
    }

    public function getEventInfo()
    {
        $eventData = Event::all();
        return $eventData;
    }

    public function getTimeZone()
    {

        $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');

        $ch = curl_init();
        $endpoint = 'https://api.ipdata.co/'.$ip.'?api-key=f3c6b481fd5bc27015b9b7eb6a60df4d4b21ed14f0438be8995b53b5';
        //dd($endpoint, $ch);

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

}