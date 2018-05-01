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

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/', function () {
    return view('index');
});
Route::get('/manual', function () {
    return view('manual');
});

Route::get('/random','Setting\SystemController@reward');

Route::get('/array','Setting\LottoController@getArray');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/changePassword','HomeController@showChangePasswordForm');

Route::group(['middleware'=>['web','auth']], function(){

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::post('/changePassword','HomeController@changePassword')->name('changepassword');

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

    Route::get('setting/rewards', function () {
        return view('setting_reward');
    });

    Route::get('setting/rewards/get/','Setting\LottoController@getRewards');

    Route::get('setting/rewards/winner/{id}', 'Setting\LottoController@getWinners');

    Route::post('/settingUpdate','Setting\LottoController@settingUpdate');

    Route::post('/generalUpdate','Setting\SystemController@generalUpdate');

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

