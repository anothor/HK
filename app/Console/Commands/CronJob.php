<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Random lucky number 2,3';

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
        $app = DB::table('settings')->select('value')->where('app_key',1)->where('option','reward_time')->get()->toArray();
        foreach ($app as $time) {
            $runtime=$time->value;
        }
        
        $reward2=$this->randomReward(2);
        $reward3=$this->randomReward(3);
        $datetime = now();

        $r2=DB::insert('insert into rewards (type,number,runtime,created_at) values (?, ?, ?, ?)', [2, $reward2, $runtime,$datetime]);
        $r3=DB::insert('insert into rewards (type,number,runtime,created_at) values (?, ?, ?, ?)', [3, $reward3, $runtime,$datetime]);      
        
        // $r2=DB::table('rewards')->insert(
        //     ['type' => '2', 'number' => $reward2, 'runtime' => $runtime]
        // );
        // $r3=DB::table('rewards')->insert(
        //     ['type' => '3', 'number' => $reward3, 'runtime' => $runtime]
        // );
        
        $this->info(now().'- Added data successfully | '.$reward2.' / '.$reward3);
    }

    public function randomReward($type){

        if ($type == 2) {
            $limit =99;
        }elseif($type == 3){
            $limit =999;
        }

        $no = (int)rand(0,$limit)+(int)idate('d');
        if ($no > $limit) {
            $reward=substr(strval($no),1);
        }elseif($type == 2 && $no < 10){
            $reward="0";
            $reward.=strval($no);
        }elseif($type == 3 && $no < 100){
            $reward="0";
            $reward.=strval($no);
        }else{
            $reward=strval($no);
        }

        return $reward;

    }
}
