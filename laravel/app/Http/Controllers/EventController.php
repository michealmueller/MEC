<?php

namespace App\Http\Controllers;

use App\RecentActivity;
use App\User;
use App\Event;
use Carbon\Carbon;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $events = new EventController();
        $timezonedata = $events->getTimeZone();
        //dd($timezonedata);
        session()->put('timezone', $timezonedata->time_zone->name);


        $eventSingle = Event::whereId($eventId)->get()->first();

        if($eventSingle == null){
            abort('404');
        }
        $attenData = [];
        if(Auth::check()) {
            $user_id = Auth::user()->id;

            $attenData = [
                'user_id' => $user_id,
                'event_id' => $eventSingle->id,
            ];
        }
        //get attendance
        $attendees = [];
        if(isset($eventSingle->attending)) {
            foreach ($eventSingle->attending as $attendee) {
                $attendees[] =[
                    'user' => User::findOrFail($attendee->user_id),
                    'status' => $attendee->status,
            ];
            };
            //dd($eventSingle);
            return view('viewEvent')
                ->with( 'eventData',$eventSingle)
                ->with('attenData', json_encode($attenData))
                ->with('attendees', $attendees);

        }
        return view('viewEvent')
            ->with( 'eventData',$eventSingle)
            ->with('attenData', json_encode($attenData));
    }

    public function editEvent($eventId)
    {
        //$this->data['user'] = Auth::user();
        $eventSingle = Event::whereId($eventId)->get();
        $timezones = config('timezones.zones');

        return view('editEvent')->with([
            'data' => $this->data,
            'eventData'=>$eventSingle[0],
            'timezones' => $timezones,
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

            $this->pushToBot($request, $request->radGroup1_2, $eventID, $start_date, $end_date);
            if(Auth::user()->organization) {
                return redirect('/' . Auth::user()->organization->org_name . '/calendar');
            }else{
                return redirect('/user/' . Auth::user()->id . '/calendar');
            }
        }
        return redirect('/view/event/'.$eventID);
    }

    public function newEvent(){
        $events = new EventController();
        $timezonedata = $events->getTimeZone();
        //dd($timezonedata);
        session()->put('timezone', $timezonedata->time_zone->name);
        $timezones = config('timezones.zones');
        return view('createEvent')->with('timezones', $timezones);
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
        if(Auth::user()->organization) {
            $event->organization_id = Auth::user()->organization->id;
            if($request->radGroup1_2 == 0){
                $event->private = 0;
            }
        }else{
            $event->user_id = Auth::user()->id;
            $event->private = 0;
        }

        $save = $event->save();
        if($save) {
            session()->put('success', 'Event Created!');
            $this->pushToBot($request, $request->radGroup1_2, $event->id, $start_date, $end_date);
            if(Auth::user()->organization) {
                return redirect('/' . Auth::user()->organization->org_name . '/calendar');
            }else{
                return redirect('/user/' . Auth::user()->id . '/calendar');
            }
        }
        session()->put('error', 'something went wrong when creating the event, if this happened on mobile please inform me !');
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

    protected function is_bot($user_agent) {

        $botRegexPattern = "(googlebot\/|Googlebot\-Mobile|Googlebot\-Image|Google favicon|Mediapartners\-Google|bingbot|slurp|java|wget|curl|Commons\-HttpClient|Python\-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST\-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub\.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum\.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips\-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail\.RU_Bot|discobot|heritrix|findthatfile|europarchive\.org|NerdByNature\.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb\-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web\-archive\-net\.com\.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks\-robot|it2media\-domain\-crawler|ip\-web\-crawler\.com|siteexplorer\.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki\-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e\.net|GrapeshotCrawler|urlappendbot|brainobot|fr\-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf\.fr_bot|A6\-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive\.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j\-asr|Domain Re\-Animator Bot|AddThis|YisouSpider|BLEXBot|YandexBot|SurdotlyBot|AwarioRssBot|FeedlyBot|Barkrowler|Gluten Free Crawler|Cliqzbot)";


        return preg_match("/{$botRegexPattern}/", $user_agent);

    }

    public function getTimeZone()
    {
        if(env('APP_ENV') === 'development'){
            session()->put('info', 'You are in Development Environment - Setting TZ to EST');
            $response = collect([
                    'data' => (object)[
                        'time_zone' => (object)[
                            'name' => 'America/New_York'
                        ]
                    ]
                ]
            );
            return $response['data'];
        }else {
            $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
            //dd($ip);

            $ch = curl_init();
            //$endpoint = 'https://api.ipdata.co/'.$ip.'?api-key=edf6d2ba1015b406ad11cb762bae85463abf819ceee18f022c50ff5c';
            $endpoint = 'http://www.geoplugin.net/json.gp?ip=' . $ip;
            //dd($endpoint, $ch);

            curl_setopt($ch, CURLOPT_URL, $endpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Accept: application/json"
            ));

            $response = curl_exec($ch);
            curl_close($ch);
            if (json_decode($response)->geoplugin_timezone) {
                session()->put('timezone', json_decode($response)->geoplugin_timezone);
                $response = collect([
                        'data' => (object)[
                            'time_zone' => (object)[
                                'name' => json_decode($response)->geoplugin_timezone
                            ]
                        ]
                    ]
                );

                return $response['data'];

            }
        }
    }

    public function pushToBot($request, $eventType, $eventId, $start, $end)
    {
        $orgSetTZ = '';
        //get the orgs that have been shared
        if(Auth::user()->organization) {
//Organization event Setup
            $share = DB::table('shared')->where('organization_id', Auth::user()->organization_id)->get();

            foreach ($share as $orgID) {
                $ids[] = $orgID->shared_id;
            }

            foreach ($ids as $org) {
                //get all shared hook urls
                if ($eventType == 0) {
                    $hooks[$org] = DB::table('discordbot')->where('organization_id', $org)->value('public_webhook_url');
                }
            }
            //get your organizations hook url
            if ($eventType == 0) {
                $hooks[Auth::user()->organization_id] = DB::table('discordbot')->where('organization_id', Auth::user()->organization_id)->value('public_webhook_url');
            } elseif ($eventType == 1) {
                $hooks[Auth::user()->organization_id] = DB::table('discordbot')->where('organization_id', Auth::user()->organization_id)->value('private_webhook_url');
            }

            $orgSetTZ = DB::table('discordbot')->where('organization_id', Auth::user()->organization_id)->value('timezone');
            //check org set timezone for null and set to UTC if null

            if ($orgSetTZ == null) {
                $orgSetTZ = 'UTC';
            }

            //add self to hooks list


            $data = [
                'username' => 'CitizenWarfare-New Event',
                'avatar_url' => 'https://i.imgur.com/4M34hi2.png',
                'content' => 'A new event has been posted.',
                'embeds' => [
                    [
                        'author' => [
                            'name' => $this->org->findorfail(Auth::user()->organization_id)->org_name,
                            'url' => $this->org->findorfail(Auth::user()->organization_id)->org_rsi_site,
                            'icon_url' => 'https://citizenwarfare.com/storage/app/org_logos/' . $this->org->findorfail(Auth::user()->organization_id)->org_logo,
                        ],
                        'title' => $request->title,
                        'url' => 'https://citizenwarfare.com/view/event/' . $eventId,
                        'description' => '',
                        'color' => hexdec($request->borderColor),
                        'fields' => [
                            [
                                'name' => 'Start Date',
                                'value' => $start->setTimezone($orgSetTZ)->format('Y-m-d g:iA') . ' ' . $orgSetTZ,
                                'inline' => true,
                            ],
                            [
                                'name' => 'End Date',
                                'value' => $end->setTimezone($orgSetTZ)->format('Y-m-d g:iA') . ' ' . $orgSetTZ,
                                'inline' => true,
                            ],
                            [
                                'name' => 'Desc',
                                'value' => $request->comments,
                            ],
                        ],
                        'thumbnail' =>
                            [
                                'url' => 'https://citizenwarfare.com/storage/app/org_logos/' . $this->org->findorfail(Auth::user()->organization_id)->org_logo,
                            ],
                        'image' =>
                            [
                                'url' => 'https://dto9r5vaiz7bu.cloudfront.net/xc7ywq3c0bsnj/tavern_upload_medium.jpg',
                            ],
                        'footer' =>
                            [
                                'text' => 'Please Consider Donating --> https://paypal.me/muellertek/',
                            ],
                    ],
                ],
            ];
        }else {
//single user event setup.
            $hooks = DB::table('discordbot')->whereNotNull('public_webhook_url')->get();
            dd($hooks);
            $orgSetTZ = DB::table('discordbot')->where('organization_id', Auth::user()->organization_id)->value('timezone');
            //check org set timezone for null and set to UTC if null

            if ($orgSetTZ == null) {
                $orgSetTZ = 'UTC';
            }
            $data = ['username' => 'CitizenWarfare-New Event',
                'avatar_url' => 'https://i.imgur.com/4M34hi2.png',
                'content' => 'A new event has been posted.',
                'embeds' => [
                [
                    'author' => [
                        'name' => Auth::user()->username,
                        'url' => '',
                        'icon_url' => 'https://citizenwarfare.com/storage/app/org_logos/' . Auth::user()->avatar,
                    ],
                    'title' => $request->title,
                    'url' => 'https://citizenwarfare.com/view/event/' . $eventId,
                    'description' => '',
                    'color' => hexdec($request->borderColor),
                    'fields' => [
                        [
                            'name' => 'Start Date',
                            'value' => $start->setTimezone($orgSetTZ)->format('Y-m-d g:iA') . ' ' . $orgSetTZ,
                            'inline' => true,
                        ],
                        [
                            'name' => 'End Date',
                            'value' => $end->setTimezone($orgSetTZ)->format('Y-m-d g:iA') . ' ' . $orgSetTZ,
                            'inline' => true,
                        ],
                        [
                            'name' => 'Desc',
                            'value' => $request->comments,
                        ],
                    ],
                    'thumbnail' =>
                        [
                            'url' => 'https://citizenwarfare.com/storage/app/org_logos/' . Auth::user()->avatar,
                        ],
                    'image' =>
                        [
                            'url' => 'https://dto9r5vaiz7bu.cloudfront.net/xc7ywq3c0bsnj/tavern_upload_medium.jpg',
                        ],
                    'footer' =>
                        [
                            'text' => 'Please Consider Donating --> https://paypal.me/muellertek/',
                        ],
                    ],
                ],
            ];
        }
//actual push to bot!
        $data = json_encode($data);
        $result = null;
        foreach($hooks as $k=>$v) {
            if ($v == '' || $v == null || $v== 'undefined') {
                unset($hooks[$k]);
            }else{
                //dd($hooks, $k, $v);
                $ch = curl_init($v);

                if (isset($ch)) {
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json Content-Length: '.strlen($data)));

                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $result[$k] = curl_exec($ch);
                }
                if(curl_getinfo($ch, CURLINFO_HTTP_CODE) != 204){
                    dd($result, $hooks, $k, $v);
                    if(curl_error($ch)) {
                        $result[$k]['error'] = curl_error($ch);
                    }
                    abort('404','There was an issue with Curl, I could not send the data to Discord, please contact support at support@citizenwarfare.com');
                    die;
                }
            }
        }
        if ($result != null) {
            session()->put('success', 'Event has been pushed to CitizenWarfare Bot');
            //curl_close($ch);
        }else{
            session()->put('info', 'Your event may have been created, but was not pushed to the bot.');
        }
    }
}