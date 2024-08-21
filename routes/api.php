<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'states'], function()
{
    Route::get('/{countryId}', 'StateController@loadStates');
});

Route::group(['prefix' => 'cities'], function()
{
    Route::get('/{stateId}', 'CityController@loadCities');
});
Route::group(['prefix' => 'departments'], function()
{
    Route::get('/{departmentId}', 'DepartmentController@loadCities');
});
Route::get('register', function () {
    return view('user-form');
})->middleware('guest')->name('register.form');

Route::post('register', [UserController::class, 'register'])->middleware('guest')->name('register');