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



Auth::routes(['verify'=> true]);

Route::get('/', array('as'=>'index','uses'=>'HomeController@index') );
Route::resource('firsts','FirstController');
Route::resource('makales','MakaleController');


Route::resource('projes','ProjeController');
Route::resource('birims','BirimController');
Route::get('changePassword', 'Auth\ChangePasswordController@showChangeForm')->name('changePassword');

Route::post('changePassword', 'Auth\ChangePasswordController@changePassword');

Route::get('sendMail', 'MailController@index');

