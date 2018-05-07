<?php
namespace App\Http\Controllers;

use App\User;
use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transfers = Transfer::all();

        $banks = getBankAcc();
        for ($i=0; $i < 10; $i++) { 
            $k=1;
            if ($banks['bank'][$i]=="bank_1" && !is_null($banks['value'][$i])) {
                $data['banks'][]=$banks['value'][$i]." : ".$banks['value'][$i+$k];
            }elseif ($banks['bank'][$i]=="bank_2" && !is_null($banks['value'][$i])) {
                $data['banks'][]=$banks['value'][$i]." : ".$banks['value'][$i+$k];
            }elseif ($banks['bank'][$i]=="bank_3" && !is_null($banks['value'][$i])) {
                $data['banks'][]=$banks['value'][$i]." : ".$banks['value'][$i+$k];
            }elseif ($banks['bank'][$i]=="bank_4" && !is_null($banks['value'][$i])) {
                $data['banks'][]=$banks['value'][$i]." : ".$banks['value'][$i+$k];
            }elseif ($banks['bank'][$i]=="bank_5" && !is_null($banks['value'][$i])) {
                $data['banks'][]=$banks['value'][$i]." : ".$banks['value'][$i+$k];
            }
        }
        $data['transfers']=$transfers;
        return view('transfer',$data);
    }
    public function formTransfer(Request $request)
    {
        //
        $data['type']=$request->type;
        if ($request->type=="topup") {
            $data['banks']=getBank();
            return view('transfer_topup',$data);
        }else{
            return view('transfer_withdraw');
        }
        // dd($request);
        
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

        if ($request->type=="topup") {
            
           
            $topup = new Transfer;
            $topup->code = strtoupper(str_random(10));
            $topup->type = $request->type;
            $topup->user_id = Auth::user()->id;
            $topup->bank = $request->bank;
            $topup->money = $request->money;

            $filename = date("Y-m-d").'-'.$topup->code.'-'.$topup->money.'.'.$request->file('slip')->getClientOriginalExtension();
            // dd($filename);
            $topup->slip = $filename;

            if($topup->save()){
                $path = $request->file('slip')->storeAs('public', $filename);

                $data['code'] = $topup->code;
                $data['type'] = $request->type;
                return view('transfer_success',$data);
            }else{
                return back()->with('error','รายการของคุณไม่ต้อง!! กรุณาทำรายการใหม่');
            }


        } elseif ($request->type=="withdraw") {

            $player = User::find(Auth::user()->id);

            if ($player->money >= $request->money ) {
                
                $withdraw = new Transfer;
                
                $withdraw->code = strtoupper(str_random(10));
                $withdraw->type = $request->type;
                $withdraw->user_id = Auth::user()->id;
                $withdraw->bank = $request->bank;
                $withdraw->money = $request->money;

                $withdraw->save();
                
                $data['code'] = $withdraw->code;
                $data['type'] = $request->type;
                // return view('transfer')->with('success','การแจ้งถอนเงินของคุณสำเร็จแล้ว เจ้าหน้าที่จะดำเนินการโอนเงินโดยเร็วที่สุด');
                return view('transfer_success',$data);
                

            }else{
                return back()->with('error','ยอดเงินของคุณไม่ต้อง!! กรุณาระบุจำนวนเงินใหม่');
            }
        }
        
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
