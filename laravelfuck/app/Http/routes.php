<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Mail;

///跳转到登陆界面
Route::get('/', function () {
    return view('auth.login');
});


Route::get('index' ,'TestController@index');

Route::get('mail/queue',function(){
   Mail::later(5,'emails.queued_email',["name" => "gewenrui"],function($message){
            $message->to('941137860@qq.com','john smith')->subject('welcome');
   });

    return "get emails";
});

Route::group(['prefix' => 'Home'],function () {
    Route::get('index','Home\IndexController@index');
    Route::get('Article','Home\ArticleController@index');
    Route::post('store','Home\ArticleController@store');
    Route::get('show/{show}','Home\ArticleController@show');
    Route::post('addCommet','Home\ArticleController@addCommet');
    Route::get('qq','Home\IndexController@sendReminderEmail');
    Route::post('sendMail','Home\IndexController@sendMail');
    Route::get('showPerson/{showPerson}','Home\PersonController@index');
    Route::get('follow/{id}','Home\PersonController@follow');
    Route::post('up','Home\VoteController@up');
    Route::post('down','Home\VoteController@down');
});

Route::group(['prefix' => 'Admin','middleware' => 'auth'],function(){
    Route::get('index','Admin\IndexController@index');
    Route::get('edit','Admin\IndexController@edit');
    Route::post('alter','Admin\IndexController@alter');
    Route::post('pic','Admin\IndexController@pic');
    Route::get('destory/{destory}','Admin\IndexController@destory');
});








/**     用户路由部分    ***/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
/**    登出路由   **/
Route::get('out','Auth\AuthController@getLogout');