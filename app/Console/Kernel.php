<?php

namespace App\Console;

use Carbon\Traits\Date;
use GuzzleHttp\Client;
use http\Env\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {




        $schedule->call(function () {
          $date = Date::now()->format('DD/MM/YYYY');
          $host = Request()->getHost();

          $schedule = \App\Schedule::where('date', $date)->first();
          if (!$schedule) {
            $client = new Client();
            $res = $client->request(
              'GET',
              "http://tv.sawadland.com:8999/https://webws.365scores.com/web/games/?langId=1&timezoneName=Asia/Baghdad&userCountryId=-1&appTypeId=5&sports=1&startDate=$date&endDate=$date",
              ['headers' => ['origin' => 'http://' . $host]]
            );

            $resAr = $client->request(
              'GET',
              "http://tv.sawadland.com:8999/https://webws.365scores.com/web/games/?langId=27&timezoneName=Asia/Baghdad&userCountryId=-1&appTypeId=5&sports=1&startDate=$date&endDate=$date",
              ['headers' => ['origin' => 'http://' . $host]]
            );


            $schedule = new Schedule();
            $schedule->date = $date;
            $schedule->content = $res->getBody()->getContents();
            $schedule->content_ar = $resAr->getBody()->getContents();

            $schedule->save();
          }
        })->everyMinute();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
