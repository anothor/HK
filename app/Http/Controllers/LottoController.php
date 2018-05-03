<?php

namespace App\Http\Controllers;

use App\Lotto;
use App\User;
use App\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        $obj = Lotto::where('user_id',Auth::user()->id)->simplePaginate(2);
        $data['obj']=$obj;
        return view('lotto',$data);
    }

    public function check()
    {
        return view('lotto_rewards');        
    }

    public function getNumber(Request $request)
    {
        $date_start = $request->datepicked." 00:00:00";
        $date_end = $request->datepicked." 23:59:59";
        $date = $request->datepicked;
        // dd($request->datepicked);

        $obj = Lotto::where('user_id',Auth::user()->id)->whereBetween('created_at', [$date_start, $date_end])->simplePaginate(15);
        // dd($obj);
        $data['obj']=$obj;
        return view('lotto_rewards',$data);      
    }

    public function getReward(Request $request)
    {
        $rt = getRumtime();
        switch($rt) {
            case 15:
                $runtime = '+15 minutes';
                break;
            case 30:
                $runtime = '+30 minutes';
                break;
            case 45:
                $runtime = '+45 minutes';
                break;
            case 60:
                $runtime = '+1 hours';
                break;
        }


        $no = Lotto::find($request->id);

        // $round_start = date('Y-m-d H:00:00',strtotime($no->created_at));
        $round_end = $no->created_at->modify($runtime);    
        $reward = DB::table('rewards')->where('number',$no->number)->where('type',$no->type)->whereBetween('created_at', [$no->created_at, $round_end])->get();   
        
        // dd($reward);
        $data['reward']=$reward;
        $data['id']=$request->id;
        $data['user']=$no->user_id;
        $data['price']=$no->price;
        return view('lotto_check_rewards',$data);      
    }

    public function getMoney(Request $request)
    {
        $lotto = Lotto::find($request->id);
        $lotto->is_win = 1;
        $lotto->get_reward = 1;
        $lotto->reward = $lotto->price*getPriceNumber($lotto->type);
        $lotto->save();

        $user = User::find($lotto->user_id);
        $user->money += $lotto->reward;
        $user->save();

        // dd($lotto,$user);
        return redirect(url('lotto-reward-success'))->with('success','รับเงินรางวัลสำเร็จ');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method']="post";
        $data['url']=url('lotto');
        return view('lotto_buy',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buyer = User::find($request->user_id);

        if ($buyer->money >= $request->price ) {

             $type_number=strlen($request['number']);
            // dd($request);
            $obj = new Lotto;

            $obj->user_id = $request->user_id;
            $obj->number = $request->number;
            $obj->price = $request->price;
            $obj->type = $type_number;
            $obj->save();

            $balance = $buyer->money-$request->price;

            $buyer->money = $balance;
            $buyer->save();

            return redirect(url('lotto/create'))->with('success','ซื้อหวยสำเร็จ! ยอดเงินคงเหลือ ฿'.$balance);

        }else{
            return back()->with('error','ยอดเงินของคุณไม่พอ!! กรุณาระบบราคาใหม่');
        }

       
    }

    // public function payment($id,$price)
    // {
    //     $balance = User::find($id);
    //     $balance->money 
    // }


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
