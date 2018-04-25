<?php

namespace App\Http\Controllers;

use App\Lotto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        $obj = Lotto::where('user_id',Auth::user()->id)->simplePaginate(15);
        $data['obj']=$obj;
        return view('lotto',$data);
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
