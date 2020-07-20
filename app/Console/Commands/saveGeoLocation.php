<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Event;
use App\Events\geoLogin;

class saveGeoLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lonlat:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save User Geo Latitude Longtitude';

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
        event(new geoLogin);
    }
}
