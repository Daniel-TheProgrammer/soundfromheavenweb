<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});


	Route::post('login','PassportController@login');
		Route::get('metadata','HomeController@metadata');
		Route::get('master/descriptions','MasterController@descriptions');
		
		Route::post('loginwithfirebase', 'Auth\AuthController@loginwithfirebase');
		Route::post('loginwithmobilepassword', 'Auth\AuthController@loginwithmobilepassword');
		Route::post('loginwithfirebase1', 'Auth\AuthController@loginwithfirebase1');
		
		Route::post('amazon/getpresignedurl','AmazonController@getpresignedurl');
		//Route::get('task1','TaskController@task');
		//Route::post('task1','TaskController@task');
		//Route::post('completetask','TaskController@completetask');
		Route::group(['middleware' => 'auth:api'], function() {
			
			Route::get('logout', 'Auth\AuthController@logout');
			Route::get('user', 'Auth\AuthController@user');
			Route::post('profile','Auth\AuthController@profile');
			Route::get('task','TaskController@task');
			Route::post('saveresponse','QuestionaireController@saveapiuserresponse');
			Route::post('completetask','TaskController@completetask');
			Route::post('bank/update','BankController@update');
			Route::post('redeem/create','RedeemController@create');
			Route::post('redeem/fetch','RedeemController@fetch');
			Route::post('points/fetch','PointsController@fetch');
			Route::post('password/change','Auth\AuthController@changepasswordwithoutconfirmation');
			Route::post('push/token','PushController@savepushtoken');
			Route::post('user/profileimageurl','UserApiController@saveprofileimageurl');
			
		});
		Route::post('verifytoken', 'Auth\AuthController@verifytoken');
	