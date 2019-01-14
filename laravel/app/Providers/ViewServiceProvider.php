<?php

namespace App\Providers;

use App\Admin;
use App\Organization;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\RssController as Rss;
use App\Http\Controllers\EventController as EventController;
use App\Event as Event;
use SEO;

class ViewServiceProvider extends ServiceProvider
{
    protected $data;
    protected $rss;
    protected $event;
    protected $feeds;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
//TODO::move RSS storing to backend as a cron job, then pull from DB for front page.

            $org_list = Organization::all()->random(count(Organization::all()));
            $this->EventController = new EventController;
            $this->rss = new Rss;
            $this->data = [
                'feeddata' => $this->rss->fetch(6),
                'org_list' => $org_list,
                'org_list_full' => Organization::all(),
                //'org_requests' => DB::table('requests')->where('organization_id', Auth::user()->organization_id),
            ];
        //set the timezone in the session

        //session()->put('timezone', $this->data['timezonedata']->time_zone->name);



        view()->composer('*', function ($view) {
            $view->with(['data' => $this->data, 'user' => Auth::user()]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
