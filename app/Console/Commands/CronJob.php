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
        $reward2=$this->randomReward(2);
        $reward3=$this->randomReward(3);

        DB::insert('insert into rewards (type,number) values (?, ?)', [2, $reward2]);
        DB::insert('insert into rewards (type,number) values (?, ?)', [3, $reward3]);        
        
        $this->info('random and added data successfully!!!');
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
        }else{
            $reward=strval($no);
        }

        return $reward;

    }
}
