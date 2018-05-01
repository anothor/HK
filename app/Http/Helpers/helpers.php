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