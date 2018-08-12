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
        $tz = Input::get('timezone');
        if($tz === null){
            $timezone = 'America/New_York';
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
                        'backgroundColor' => $value->backgroundColor,
                        'textColor' => $value->color,
                        'color' => '',
                        'url' => '/view/event/'.$value->id,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

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
        $timezoneDTZ = new \DateTimeZone($this->data['timezonedata']['timezone']);
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
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        if($query && $query['status'] == 'success') {
            return $query;
        } else {
            $query['timezone'] = 'America/New_York';
          return $query;
        }
    }

}