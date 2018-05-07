<?php
use app\User;
use app\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

function getUserById($id)
{
    $users =  DB::table('users')->select('username')->where('id',$id)->get();
    foreach ($users as $user) {
        $username=$user->username;
    }
    return $username;
}

function getUserMoney($id)
{
    $users =  DB::table('users')->select('money')->where('id',$id)->get();
    foreach ($users as $user) {
        $money=$user->money;
    }
    return $money;
}


function dateFormat($date)
{
    return date('Y-m-d H:i',strtotime($date));
}

function getPriceNumber($type)
{
    if($type == 2){
        $option="price_2";
    }elseif($type == 3){
        $option="price_3";
    }else{
        $option="null";
    }

    $setting = DB::table('settings')->select('value')->where('option',$option)->get();
    foreach ($setting as $value) {
        $price=$value->value;
    }
    return $price;
}

function getRumtime()
{
    $setting = DB::table('settings')->select('value')->where('option','reward_time')->get();
    foreach ($setting as $value) {
        $runtime=$value->value;
    }
    return $runtime;
}

function getRecentReward($limit)
{
    $rewards = DB::table('rewards')->orderBy('id','DESC')->limit($limit)->get();
    return $rewards;
}

function gotReward($id)
{
    $grw = DB::table('lottos')->select('get_reward')->where('id',$id)->get();
    foreach ($grw as $value) {
        $status=$value->get_reward;
    }
    return $status;
}

function getBank()
{
    $setting = DB::table('settings')->where('option','like','bank%')->get();
    foreach ($setting as $options) {
         // echo $options->option;
        if ($options->option == "bank_1") {
            $data[]=$options->value;
        }elseif($options->option == "bank_2") {
            $data[]=$options->value;
        }elseif($options->option == "bank_3") {
            $data[]=$options->value;
        }elseif($options->option == "bank_4") {
            $data[]=$options->value;
        }elseif($options->option == "bank_5") {
            $data[]=$options->value;
        }
    }
    return $data;
}

function getBankAcc()
{
    $setting = DB::table('settings')->where('option','like','bank%')->get();
    foreach ($setting as $options) {
        $data['bank'][]=$options->option;
        $data['value'][]=$options->value;
         // echo $options->option;
        // if ($options->option == "bank_1") {
        //     $data[]=$options->value;
        // }elseif($options->option == "bank_2") {
        //     $data[]=$options->value;
        // }elseif($options->option == "bank_3") {
        //     $data[]=$options->value;
        // }elseif($options->option == "bank_4") {
        //     $data[]=$options->value;
        // }elseif($options->option == "bank_5") {
        //     $data[]=$options->value;
        // }
    }
    return $data;
}

function getTransferStatus($status)
{
    switch($status) {
        case "pending":
            return "<span class='badge badge-warning'>ดำเนินการ</span>";
            break;
        case "completed":
            return "<span class='badge badge-success'>สำเร็จ</span>";
            break;
        case "cancel":
            return "<span class='badge badge-default'>ยกเลิก</span>";;
            break;
    }
}