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

Route::get('/', ['middleware' => 'auth', function () {
    return view('home');
}]);


// Authentication routes...
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
});


Route::group(['prefix' => 'user'], function () {
    Route::get('list', ['uses' => 'UserController@all']);

});

Route::group(['prefix' => 'patient'], function () {
    Route::get('/', ['uses' => 'PatientController@index']);
    Route::get('countFind', ['uses' => 'PatientController@countFind']);
    Route::get('find', ['uses' => 'PatientController@find']);
    Route::get('{id}/detail', ['uses' => 'PatientController@detail']);
    Route::get('notFound', ['uses' => 'PatientController@notFound']);
    Route::get('add', ['uses' => 'PatientController@add']);
    Route::get('{id}', ['uses' => 'PatientController@findOne']);
    Route::get('{id}/edit', ['uses' => 'PatientController@edit']);

    Route::post('create', ['uses' => 'PatientController@create']);
    Route::post('update', ['uses' => 'PatientController@update']);

});

