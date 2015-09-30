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

Route::get('/', [function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/home');
    } else {
        return view('portal');
    }
}]);

Route::get('/home', [function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return view('home');
    } else {
        return view('portal');
    }
}]);



// Authentication routes...
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
});


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('list', ['uses' => 'UserController@all']);

});

Route::group(['prefix' => 'patient', 'middleware' => 'auth'], function () {
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


Route::group(['prefix' => 'medicine', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'MedicineController@index']);

    Route::get('countFind', ['uses' => 'MedicineController@countFind']);
    Route::get('find', ['uses' => 'MedicineController@find']);
    Route::get('{id}/detail', ['uses' => 'MedicineController@detail']);
    Route::get('notFound', ['uses' => 'MedicineController@notFound']);
    Route::get('add', ['uses' => 'MedicineController@add']);
    Route::get('{id}', ['uses' => 'MedicineController@findOne']);
    Route::get('{id}/edit', ['uses' => 'MedicineController@edit']);

    Route::post('create', ['uses' => 'MedicineController@create']);
    Route::post('update', ['uses' => 'MedicineController@update']);
//
});

