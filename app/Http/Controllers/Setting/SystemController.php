<?php

namespace App\Http\Controllers\Setting;

use App\Reward;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $app = DB::table('settings')->select()->where('app_key',1)->get()->toArray();
        foreach( $app as $options)
        {
             // echo $options->option;
            // if ($options->option == "phone") {
            //     $data['phone_id']=$options->id;
            //     $data['phone']=$options->value;
            // }elseif($options->option == "line_id") {
            //     $data['line_id']=$options->id;
            //     $data['line']=$options->value;
            // }elseif($options->option == "bank_1") {
            //     $data['bank_1_id']=$options->id;
            //     $data['bank_1']=$options->value;
            // }elseif($options->option == "bank_acc_1") {
            //     $data['bank_acc_1_id']=$options->id;
            //     $data['bank_acc_1']=$options->value;
            // }

            switch($options->option) {
                case "line_id":
                    $data['line_id']=$options->id;
                    $data['line']=$options->value;
                    break;
                case "phone_1":
                    $data['phone_1_id']=$options->id;
                    $data['phone_1']=$options->value;
                    break;
                case "phone_2":
                    $data['phone_2_id']=$options->id;
                    $data['phone_2']=$options->value;
                    break;
                case "phone_3":
                    $data['phone_3_id']=$options->id;
                    $data['phone_3']=$options->value;
                    break;

                case "bank_1":
                    $data['bank_1_id']=$options->id;
                    $data['bank_1']=$options->value;
                    break;
                case "bank_acc_1":
                    $data['bank_acc_1_id']=$options->id;
                    $data['bank_acc_1']=$options->value;
                    break;

                case "bank_2":
                    $data['bank_2_id']=$options->id;
                    $data['bank_2']=$options->value;
                    break;
                case "bank_acc_2":
                    $data['bank_acc_2_id']=$options->id;
                    $data['bank_acc_2']=$options->value;
                    break;

                case "bank_3":
                    $data['bank_3_id']=$options->id;
                    $data['bank_3']=$options->value;
                    break;
                case "bank_acc_3":
                    $data['bank_acc_3_id']=$options->id;
                    $data['bank_acc_3']=$options->value;
                    break;

                case "bank_4":
                    $data['bank_4_id']=$options->id;
                    $data['bank_4']=$options->value;
                    break;
                case "bank_acc_4":
                    $data['bank_acc_4_id']=$options->id;
                    $data['bank_acc_4']=$options->value;
                    break;

                case "bank_5":
                    $data['bank_5_id']=$options->id;
                    $data['bank_5']=$options->value;
                    break;
                case "bank_acc_5":
                    $data['bank_acc_5_id']=$options->id;
                    $data['bank_acc_5']=$options->value;
                    break;
                }

        }
    // dd($data);
        return view('setting_general', $data);
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

    public function reward()
    {
    // $reward2 = $this->randomReward(2);
    // $reward3 = $this->randomReward(3);

    // $data['r2']=$reward2;
    // $data['r3']=$reward3;

    // dd($data);
    $app = DB::table('settings')->select('value')->where('app_key',1)->where('option','reward_time')->get()->toArray();
        foreach ($app as $time) {
            $runtime=$time->value;
        }

        // $r2=DB::table('rewards')->insert(
        //     ['type' => '2', 'number' => $this->randomReward(2), 'runtime' => $runtime]
        // );
        // $r3=DB::table('rewards')->insert(
        //     ['type' => '3', 'number' => $this->randomReward(3), 'runtime' => $runtime]
        // );


        $reward2 = new Reward;
        $reward2->type = 2;
        $reward2->number = $this->randomReward(2);
        $reward2->runtime = $runtime;
        $reward2->created_at = now();
        $reward2->save();
        //
        $reward3 = new Reward;
        $reward3->type = 3;
        $reward3->number = $this->randomReward(3);
        $reward3->runtime = $runtime;
        $reward3->created_at = now();
        $reward3->save();
        
        echo "23 ok";

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
        }elseif($type == 3 && $no < 100){
            $reward="0";
            $reward.=strval($no);
        }else{
            $reward=strval($no);
        }


        return $reward;

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function generalUpdate(Request $request)
    {
        // dd($request);         
            DB::table('settings')->where('id',$request->line_id)->update(['value'=>$request->line]);

            if($request->has('phone_1') && $request->has('phone_1_id')){
                DB::table('settings')->where('id',$request->phone_1_id)->update(['value'=>$request->phone_1]); 
            }
            if($request->has('phone_2') && $request->has('phone_2_id')){
                DB::table('settings')->where('id',$request->phone_2_id)->update(['value'=>$request->phone_2]); 
            } 
            if($request->has('phone_3') && $request->has('phone_3_id')){
                DB::table('settings')->where('id',$request->phone_3_id)->update(['value'=>$request->phone_3]); 
            } 

            if($request->has('bank_1') && $request->has('bank_acc_1')){
                DB::table('settings')->where('id',$request->bank_1_id)->update(['value'=>$request->bank_1]);
                DB::table('settings')->where('id',$request->bank_acc_1_id)->update(['value'=>$request->bank_acc_1]); 
            }
            if($request->has('bank_2') && $request->has('bank_acc_2')){
                DB::table('settings')->where('id',$request->bank_2_id)->update(['value'=>$request->bank_2]);
                DB::table('settings')->where('id',$request->bank_acc_2_id)->update(['value'=>$request->bank_acc_2]); 
            }
            if($request->has('bank_3') && $request->has('bank_acc_3')){
                DB::table('settings')->where('id',$request->bank_3_id)->update(['value'=>$request->bank_3]);
                DB::table('settings')->where('id',$request->bank_acc_3_id)->update(['value'=>$request->bank_acc_3]); 
            }
            if($request->has('bank_4') && $request->has('bank_acc_4')){
                DB::table('settings')->where('id',$request->bank_4_id)->update(['value'=>$request->bank_4]);
                DB::table('settings')->where('id',$request->bank_acc_4_id)->update(['value'=>$request->bank_acc_4]); 
            }
            if($request->has('bank_5') && $request->has('bank_acc_5')){
                DB::table('settings')->where('id',$request->bank_5_id)->update(['value'=>$request->bank_5]);
                DB::table('settings')->where('id',$request->bank_acc_5_id)->update(['value'=>$request->bank_acc_5]); 
            }

            return redirect(url('setting/general'))->with('success','บันทึกการตั้งค่าเรียบร้อย');            

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
}
