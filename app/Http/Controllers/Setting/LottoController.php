<?php

namespace App\Http\Controllers\Setting;

use App\Setting;
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

        $start = Setting::where('app_key',1)->where('option','reward_start')->get();
        foreach($start as $row){
            $reward_start = $row->value;
            $id_st = $row->id;
        }

        $end = Setting::where('app_key',1)->where('option','reward_end')->get();
        foreach($end as $row){
            $reward_end = $row->value;
            $id_ren = $row->id;
        }

        // $app = Setting::where('app_key',1)->get();
        // foreach($app as $options){
        //     foreach ($options as $option => $value) {
            
        //     }
        // }
        $data['id_price_2']=$id_p2;
        $data['id_price_3']=$id_p3;
        $data['id_runtime']=$id_t;
        $data['id_enable']=$id_en;                      
        $data['id_start']=$id_st;                      
        $data['id_end']=$id_ren;                      
        $data['price_2']=$p2;
        $data['price_3']=$p3;
        $data['runtime']=$reward_time;
        $data['enable']=$reward_enable;
        $data['start']=$reward_start;           
        $data['end']=$reward_end;                           
        $data['method']="put";
        $data['url']=url('setting/lotto');

        // dd($data);
        return view('setting_lotto',$data);
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
        // if($request->form_setting=='price'){
            // DB::table('settings')->where('app_key',1)->where('option','price_2')->update(['value'=>$request->price_2]);
            DB::table('settings')->where('id',$request->id_price_2)->update(['value'=>$request->price_2]);            
            DB::table('settings')->where('id',$request->id_price_3)->update(['value'=>$request->price_3]);
            
        //     return redirect(url('setting/lotto'))->with('success','บันทึกการตั้งค่าเรียบร้อย');
        // }elseif ($request->form_setting=='time') {
            # code...reward_time 
            DB::table('settings')->where('id',$request->id_runtime)->update(['value'=>$request->reward_time]);
            DB::table('settings')->where('id',$request->id_enable)->update(['value'=>$reward_enable]);            
            DB::table('settings')->where('id',$request->id_start)->update(['value'=>$request->reward_start]);            
            DB::table('settings')->where('id',$request->id_end)->update(['value'=>$request->reward_end]);            
            return redirect(url('setting/lotto'))->with('success','บันทึกการตั้งค่าเรียบร้อย');            
        // }


        // $where = null;
        // $count = Setting::count();

        // DB::beginTransaction();

        // for ($i = 1; $i < $count; $i++){
        //     try{
        //         if($i == 1){
        //             $where = ['id' => $i, 'app_key' => 1, 'price_2'];
        //             Setting::where($where)->update(['value' => $request->value_from_view]);
        //         }else if ($i == 2){
        //             $where = ['id' => $i, 'app_key' => 1, 'price_3'];
        //             Setting::where($where)->update(['value' => $request->value_from_view]);
        //         }else if ($i == 3){
        //             $where = ['id' => $i, 'app_key' => 1, 'reward_time'];
        //             Setting::where($where)->update(['value' => $request->value_from_view]);
        //         }
        //         DB::commit();	
        //     }catct(QueryException $e){
        //         DB::rollback();
        //         return error หรือ throw new QueryException ก็ว่าไป
        //     }	
        // }
        
        // DB::transaction(function () {
        //     DB::table('setting')->update('update users set votes = 100 where name = ?', ['John']);

        // });
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

        // dd($request);
        
        // if ($request->form_setting == 'price') {
            // $p2 = Setting::find(1);
            // // $p2 = Setting::where('app_key',1)->where('option', 'price_2');
            // $p2->value = $request->2price;
            // $p2-save();
        //     dd($request);

        //     return redirect(url('setting/lotto'))->with('success','บันทึกการตั้งค่าเรียบร้อย');
            
        // }
        // $p2 = Setting::where('app_key',1)->where('option', 'price_2');
        // $p2->value = $request['2price'];
        // $p2-save();

        // $p3 = Setting::where('app_key',1)->where('option', 'price_3');
        // $p3->value = $request['3price'];
        // $p3-save();



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
