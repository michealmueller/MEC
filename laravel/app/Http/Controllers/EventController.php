<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Calendar;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Organization;

class EventController extends Controller
{

    private $data;
    private $rss;
    private $org;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [
            'timezonedata' => self::getTimeZone(),
            'eventData' => self::getEventInfo(),
        ];
        $this->org = new Organization;

    }



    public function index($tz =null)
    {
        return view('welcome');
    }

    public function getEventsAndSharedOrgEvents()
    {
        $sharedOrgs = DB::table('shared')->where('organization_id', Auth::user()->organization->id)->get()->toArray();
        foreach($sharedOrgs as $k=>$v){
            $sharedOrgsArray[] = $sharedOrgs[$k]->shared_id;
        }
    }

    public function viewEvent($eventId)
    {
        //$this->data['user'] = Auth::user();
        $eventSingle = Event::whereId($eventId)->get()->first();

        //$eventSingle = str_replace('\r\n', "\r\n", $eventSingle);

        return view('viewEvent')->with( 'eventData',$eventSingle);
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
        if($request->radGroup1_2 == 0){
            $event->private = 0;
        }

        $save = $event->update();
        if($save) {
            session()->put('success', 'Event Created!');

            $this->pushToBot($request, $request->radGroup1_2, $eventID);

            return redirect('/'.Auth::user()->organization->org_name.'/calendar');
        }
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
        $event->organization_id = Auth::user()->organization->id;
        if($request->radGroup1_2 == 0){
            $event->private = 0;
        }
        $save = $event->save();
        if($save) {
            session()->put('success', 'Event Created!');
            $this->pushToBot($request, $request->radGroup1_2, $event->id);
            return redirect('/'.Auth::user()->organization->org_name.'/calendar');
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
        if($ip == '::1'){
            $ip = '71.60.23.77';
        }
//dd($ip);

        $ch = curl_init();
        //$endpoint = 'https://api.ipdata.co/'.$ip.'?api-key=edf6d2ba1015b406ad11cb762bae85463abf819ceee18f022c50ff5c';
        $endpoint = 'http://www.geoplugin.net/json.gp?ip='.$ip;
        //dd($endpoint, $ch);

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json"
        ));

        $response = curl_exec($ch);
        session()->put('timezone', json_decode($response)->geoplugin_timezone);
        curl_close($ch);
        if($response == true){
            //session()->put('info', 'Sorry I could not determine your timezone, setting your requested timezone to '. $_GET['timezone']);
            $response = collect([
                    'data' =>(object)[
                        'time_zone' => (object) [
                            'name' => json_decode($response)->geoplugin_timezone
                        ]
                    ]
                ]
            );

            return $response['data'];

        }elseif($response == false && !isset($_GET['timezone'])){
            session()->put('info', 'Sorry I could not determine your timezone, setting timezone to America/New_York! -- EST');
            $response = collect([
                    'data' =>(object)[
                        'time_zone' => (object) [
                            'name' => 'America/New_York'
                        ]
                    ]
                ]
            );
            return $response['data'];
        }
        return json_decode($response);
    }

    public function pushToBot($request, $eventType, $eventId)
    {
        //get the orgs that have been shared
        $share = DB::table('shared')->where('organization_id', Auth::user()->organization_id)->get();
//dd($share);
        foreach($share as $orgID){
            $ids[] = $orgID->shared_id;
        }

        foreach ($ids as $org){
                //get hook url
            if ($eventType == 0) {
                $hooks[] = DB::table('discordbot')->where('organization_id', $org)->value('public_webhook_url');
            } elseif ($eventType == 1) {
                $hooks[] = DB::table('discordbot')->where('organization_id', $org)->value('private_webhook_url');
            }
        }

        $data = [
            'username' => 'CitizenWarfare-New Public Event',
            'avatar_url' => 'https://i.imgur.com/4M34hi2.png',
            'content' => 'A new event has been posted.',
            'embeds' => [
                [
                    'author' => [
                        'name' => $this->org->findorfail(Auth::user()->organization_id)->org_name,
                        'url' => $this->org->findorfail(Auth::user()->organization_id)->org_rsi_site,
                        'icon_url' => 'https://events.citizenwarfare.com/storage/app/org_logos/' . $this->org->findorfail(Auth::user()->organization_id)->org_logo,
                    ],
                    'title' => $request->title,
                    'url' => 'https://events.citizenwarfare.com/view/event/' . $eventId,
                    'description' => '',
                    'color' => hexdec($request->borderColor),
                    'fields' => [
                        [
                            'name' => 'Start Date',
                            'value' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s') . ' UTC',
                            'inline' => true,
                        ],
                        [
                            'name' => 'End Date',
                            'value' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s') . ' UTC',
                            'inline' => true,
                        ],
                        [
                            'name' => 'Desc',
                            'value' => $request->comments,
                        ],
                    ],
                    'thumbnail' =>
                        [
                            'url' => 'https://events.citizenwarfare.com/storage/app/org_logos/' . $this->org->findorfail(Auth::user()->organization_id)->org_logo,
                        ],
                    'image' =>
                        [
                            'url' => 'https://dto9r5vaiz7bu.cloudfront.net/xc7ywq3c0bsnj/tavern_upload_medium.jpg',
                        ],
                    'footer' =>
                        [
                            'text' => 'Please Consider Donating! --> https://paypal.me/muellertek/',
                        ],
                ],
            ],
        ];

        foreach($hooks as $hook) {
            if ($hook != '' || $hook != null) {
                $ch = curl_init($hook);

                if (isset($ch)) {
                    $data = json_encode($data);

                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json'));

                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $result = curl_exec($ch);

                }
            }
        }
        if ($result) {
            session()->put('success', 'Event has been pushed to CitizenWarfare Bot');
            //curl_close($ch);
        }
    }
}