<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Calendar;
use App\Event;
use App\Http\Controllers\RssController as Rss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'feeddata' => $this->rss->fetch(3),
            'timezonedata' => self::getTimeZone(),
        ];
    }



    public function index()
    {
        //dd($timeZone);
        $this->data['user'] = Auth::user();
        $events = [];
        $data = Event::all();

        if($data->count()){

            foreach ($data as $key => $value) {
                //create carbon object with timezone information so that it can be converted to the users TZ
                //time that is stored in DB is converted from user time to UTC so we need to take it from UTC to user TZ
                $timezoneDTZ = new \DateTimeZone($this->data['timezonedata']['timezone']);
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
                    '',
                    [
                    'timezone'=>'local',
                        'backgroundColor'=>$value->backgroundColor,
                        'textColor'=>$value->color,
                        'color'=>''
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        return view('welcome')->with(['calendar'=>$calendar, 'data'=>$this->data]);
    }

    public function newEvent(){
        $this->data['user'] = Auth::user();
        return view('createEvent')->with('data', $this->data);
    }

    public function createEvent(Request $request)
    {
        //get the users timezone and convert it to UTC then save to DB.
        $timezoneDTZ = new \DateTimeZone($this->data['timezonedata']['timezone']);
        $start_date = Carbon::parse($request->start_date, $timezoneDTZ);

        $end_date = Carbon::parse($request->end_date, $timezoneDTZ);

        $event = new Event;
        $event->title = $request->title;
        $event->start_date = $start_date->setTimezone('UTC');
        $event->end_date = $end_date->setTimezone('UTC');
        $event->comments = $request->comments;

        $save = $event->save();

        if($save) {
            session()->put('success', 'Event Created!');
            return redirect('/');
        }

        return back();
    }

    private function getTimeZone()
    {

        $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        if($query && $query['status'] == 'success') {
          return $query;
        } else {
          echo 'Unable to get location';
        }
    }

}