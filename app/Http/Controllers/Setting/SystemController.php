<?php

namespace App\Http\Controllers\Setting;

use App\Reward;
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
        return view('setting_general');
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


        $reward2 = new Reward;
        $reward2->type = 2;
        $reward2->number = $this->randomReward(2);
        $reward2->save();
        //
        $reward3 = new Reward;
        $reward3->type = 3;
        $reward3->number = $this->randomReward(3);
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
