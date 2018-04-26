<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/manual', function () {
    return view('manual');
});

Route::post('/settingUpdate','Setting\LottoController@settingUpdate');

Route::get('/random','Setting\SystemController@reward');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/changePassword','HomeController@showChangePasswordForm');

Route::post('/changePassword','HomeController@changePassword')->name('changepassword');

Route::group(['middleware'=>['web','auth']], function(){
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/topup', function () {
        return view('topup');
    });

    // Route::get('/lotto', function () {
    //     return view('lotto');
    // });

    Route::resource('lotto','LottoController');

    // Route::get('/lottoBuy', function () {
    //     return view('lotto_buy');
    // });

    Route::get('/lotto/rewards', function () {
        return view('lotto_rewards');
    });

    Route::resource('setting/lotto','Setting\LottoController');

    Route::resource('setting/general','Setting\SystemController');

    Route::resource('setting/users','Setting\UserController');

    Route::post('/setting/users/resetpassword','Setting\UserController@resetPassword');

    Route::get('/setting/users/resetpassword/{id}/{username}', function ($id,$username) {
        $data['id']=$id;
        $data['username']=$username;
        return view('resetpassword_user',$data);
    });

    Route::get('/setting', function(){
        if (Auth::user()->is_admin == 1) {
            return view('setting');
        } else {
            return view('restricted');
        }
    });

});

