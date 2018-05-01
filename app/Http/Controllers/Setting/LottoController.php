<?php

namespace App\Http\Controllers\Setting;

use App\Setting;
use App\Reward;
use App\Lotto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LottoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $price_2 = Setting::where('app_key',1)->where('option','price_2')->get();
        foreach($price_2 as $pr2){
            $p2 = $pr2->value;
            $id_p2 = $pr2->id;
        }

        $price_3 = Setting::where('app_key',1)->where('option','price_3')->get();
        foreach($price_3 as $pr3){
            $p3 = $pr3->value;
            $id_p3 = $pr3->id;
        }

        $time = Setting::where('app_key',1)->where('option','reward_time')->get();
        foreach($time as $row){
            $reward_time = $row->value;
            $id_t = $row->id;
        }

        $renable = Setting::where('app_key',1)->where('option','reward_enable')->get();
        foreach($renable as $row){
            $reward_enable = $row->value;
            $id_en = $row->id;
        }

        // $start = Setting::where('app_key',1)->where('option','reward_start')->get();
        // foreach($start as $row){
        //     $reward_start = $row->value;
        //     $id_st = $row->id;
        // }

        // $end = Setting::where('app_key',1)->where('option','reward_end')->get();
        // foreach($end as $row){
        //     $reward_end = $row->value;
        //     $id_ren = $row->id;
        // }

        // $app = Setting::where('app_key',1)->get();
        // foreach($app as $options){
        //     foreach ($options as $option => $value) {
            
        //     }
        // }
        $data['id_price_2']=$id_p2;
        $data['id_price_3']=$id_p3;
        $data['id_runtime']=$id_t;
        $data['id_enable']=$id_en;                      
        // $data['id_start']=$id_st;                      
        // $data['id_end']=$id_ren;                      
        $data['price_2']=$p2;
        $data['price_3']=$p3;
        $data['runtime']=$reward_time;
        $data['enable']=$reward_enable;
        // $data['start']=$reward_start;           
        // $data['end']=$reward_end;                           
        $data['method']="put";
        $data['url']=url('setting/lotto');

        // dd($data);
        return view('setting_lotto',$data);
    }

    public function getArray(){
        $time = DB::table('settings')->select('value')->where('app_key',1)->where('option','reward_time')->get()->toArray();
        foreach ($time as $runtime) {
            $data['runtime']=$runtime->value;
        }
        
        // $app = Setting::where('app_key',1)->get()->toArray();
        $app = DB::table('settings')->select('option','value')->where('app_key',1)->get()->toArray();
        // dd($app);

        foreach( $app as $options)
            {
                 // echo $options->option;
                if ($options->option == "reward_time") {
                    $data['runtime2']=$options->value;
                }elseif($options->option == "reward_enable") {
                    $data['activated']=$options->value;
                }elseif($options->option == "reward_start") {
                    $data['start']=$options->value;
                }elseif($options->option == "reward_end") {
                    $data['stop']=$options->value;
                }
            }
        
        // foreach( $app as $options)
        // {
            // dump($options);
            // echo $options['option']

            // if ($options['option'] == "reward_time") {
            //         $data['runtime']=$options['value'];
            // }elseif($options['option'] == "reward_enable") {
            //         $data['activated']=$options['value'];
            // }elseif($options['option'] == "reward_start") {
            //         $data['start']=$options['value'];
            // }elseif($options['option'] == "reward_end") {
            //         $data['stop']=$options['value'];
            // }
        // }

        if ($data['activated']) {
            dd( $data);
        }else{
            echo "No data";
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function settingUpdate(Request $request)
    {
        if($request->has('reward_enable')){
            $reward_enable=$request->reward_enable;
        }else{
            $reward_enable=0;
        }
        // dd($request);
            DB::table('settings')->where('id',$request->id_price_2)->update(['value'=>$request->price_2]);            
            DB::table('settings')->where('id',$request->id_price_3)->update(['value'=>$request->price_3]);
            DB::table('settings')->where('id',$request->id_runtime)->update(['value'=>$request->reward_time]);
            DB::table('settings')->where('id',$request->id_enable)->update(['value'=>$reward_enable]);                   
            return redirect(url('setting/lotto'))->with('success','บันทึกการตั้งค่าเรียบร้อย');            

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRewards(Request $request)
    {
        $date_start = $request->datepicked." 00:00:00";
        $date_end = $request->datepicked." 23:59:59";
        $date = $request->datepicked;
        
        $rewards = Reward::where('created_at','>=',$date_start)->where('created_at','<=',$date_end)->orderby('created_at','DESC')->get();        
        // $data['rewards']=$rewards;  
        // dd($data);
        return view('setting_reward',compact('rewards','date')); 
    }

    public function getWinners(Request $request)
    {
        $rewards = DB::table('rewards')->where('id',$request->id)->get();
        foreach ($rewards as $value) {
            $reward['number']=$value->number;
            $reward['type']=$value->type;
            $reward['runtime']=$value->runtime;
            $reward['round']=$value->created_at;
        }

        $number = $reward['number'];
        $round = $reward['round'];
        $round_start = date('Y-m-d H:i:s',strtotime('-'.$reward['runtime'].' minutes',strtotime($reward['round'])));

        $winners = DB::table('lottos')->where('number',$reward['number'])->where('type',$reward['type'])->whereBetween('created_at', [$round_start, $reward['round']])->get();

        // dd($winners);
        return view('setting_reward_winner',compact('winners','number','round')); 
    }


}
