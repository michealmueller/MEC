<?php

namespace App\Console\Commands;

use App\Http\Controllers\RssController;
use Illuminate\Console\Command;

class getrssfeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getrssfeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all RSS Feed data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $rss = new RssController;
        $rss->store();
    }
}
