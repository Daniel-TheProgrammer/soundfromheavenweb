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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('voting', 'VotingController@index');
Route::get('newvoting', 'VotingController@index');
Route::post('voting/vote','VotingController@vote');
Route::get('voting/success','VotingController@success');
Route::get('voting/failed','VotingController@failed');
Route::get('voting/payment/confirm','VotingController@paymentconfirm');
Route::post('voting/payment/confirm','VotingController@paymentconfirm');
Route::post('voting/payment/confirm/stripe','VotingController@stripepaymentconfirm');
Route::get('voting/count','VotingController@count');

Route::post('payment/stripe/createintent','StripeController@createintent');

Route::get('payment/payunit/payforvote','PayUnitController@payforvote');
Route::get('payment/payunit/confirm','PayUnitController@confirm');
Route::get('payment/payunit/notifylater','PayUnitController@notifylater');

Route::get('about-us','HomeController@aboutus');
Route::get('competition', 'HomeController@competition');
Route::get('gallery','HomeController@gallery');
Route::get('tracks','HomeController@tracks');
Route::get('tickets','HomeController@tickets');
Route::get('contact-us','HomeController@contactus');
Route::get('contestants','HomeController@contestant');
Route::get('test/login','TestController@login');
Route::get('test/practise','TestController@practise');

Route::get('test/payunit','TestController@payunit');

Route::post('user/list','UserController@fetchuser');
Route::post('voting/list','UserController@fetchvoting');