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

// Here We started....

Route::group(['namespace' => "Api\\v1", 'as' => 'api.v1.', 'prefix' => 'v1', 'middleware' => 'auth.basic:,company_name'], function(){
    Route::post('users', 'UserController@createUser');
    Route::get('users/{card_number}', 'UserController@getUser');
	Route::get('users/cardValidate/{card_number}', 'UserController@getCheckCard');
    Route::post('users/{card_number}/attachments', 'UserController@createAttachment');
    Route::post('users/{card_number}/attachments/create_all', 'UserController@createAttachmentMultiple');
    Route::post('users/{card_number}/attachments/create_all', 'UserController@createAttachmentMultiple');
    Route::get('users/{card_number}/card_loads', 'UserController@cardLoads');
	Route::post('users/{card_number}/assignCardload', 'UserController@assignCardload');
	Route::get('users/card_loads/loads', 'UserController@loadCardsDetails');
});
