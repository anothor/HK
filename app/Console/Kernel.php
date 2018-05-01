<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
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
        '\App\Console\Commands\CronJob',
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $app = DB::table('settings')->select('option','value')->where('app_key',1)->get()->toArray();
        foreach( $app as $options)
        {
            if ($options->option == "reward_time") {
                    $runtime=$options->value;
            }elseif($options->option == "reward_enable") {
                    $activated=$options->value;
            }elseif($options->option == "reward_start") {
                    $start=$options->value;
            }elseif($options->option == "reward_end") {
                    $stop=$options->value;
            }
        }
        
        if ($activated) {
            if ($runtime == 1) {
                $schedule->command('CronJob:cronjob')->everyMinute()->timezone('Asia/Bangkok')->appendOutputTo(storage_path('logs/schedule.log'));                
            }elseif ($runtime == 5) {
                $schedule->command('CronJob:cronjob')->everyFiveMinutes()->timezone('Asia/Bangkok')->appendOutputTo(storage_path('logs/schedule.log'));
            }elseif ($runtime == 15) {
                $schedule->command('CronJob:cronjob')->everyFifteenMinutes()->timezone('Asia/Bangkok')->appendOutputTo(storage_path('logs/schedule.log'));
            }elseif ($runtime == 30) {
                $schedule->command('CronJob:cronjob')->everyThirtyMinutes()->timezone('Asia/Bangkok')->appendOutputTo(storage_path('logs/schedule.log'));
            }elseif ($runtime == 60) {
                $schedule->command('CronJob:cronjob')->hourly()->timezone('Asia/Bangkok')->appendOutputTo(storage_path('logs/schedule.log'));
            }

        }
        
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
