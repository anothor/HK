<?php

namespace App\Http\Controllers\Setting;

use App\User;
use App\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('setting_transfer',$data);
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
        // echo $id;
        $transfers = Transfer::find($id);
        $player = User::find($transfers->user_id);

        $data['id']=$transfers->id;
        $data['code']=$transfers->code;
        $data['type']=$transfers->type;
        $data['user_id']=$transfers->user_id;
        $data['bank']=$transfers->bank;
        $data['money']=$transfers->money;
        //$data['slip']= Storage::url($transfers->slip);
        $data['slip']= $transfers->slip;
        $data['status']=$transfers->status;
        $data['created_at']=$transfers->created_at;
        

        $data['user']=$player->username;
        $data['bank_user']=$player->bank." : ".$player->bank_acc;
        $data['balance']=$player->money;

        // dd($data);
        return view('setting_transfer_update',$data);
    }

    public function transferUpdate($id)
    {
        //
        $transfers = Transfer::find($id);

        $transfers->admin_id = Auth::user()->id;
        $transfers->status = "completed";
        $transfers->updated_at = now();
        $transfers->save();
        //
        $user = User::find($transfers->user_id);

        if ($transfers->type == "topup") {
            $user->money += $transfers->money;
        } else {
            $user->money -= $transfers->money;
        }
        $user->updated_at = now();
        $user->save();
        // dd($user->money);

        return redirect(url('setting/transfer'))->with('success','ทำรายการสำเร็จ');
    }

    public function transferCancel($id)
    {
        //
        $transfers = Transfer::find($id);

        $transfers->admin_id = Auth::user()->id;
        $transfers->status = "cancel";
        $transfers->updated_at = now();
        $transfers->save();

        return redirect(url('setting/transfer'))->with('success','ยกเลิกรายการสำเร็จ');        
        
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
