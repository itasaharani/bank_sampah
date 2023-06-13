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

Route::get('/mahasiswa/read', 'mhsAPIController@read');
Route::post('/mahasiswa/create','mhsAPIController@create');
Route::post('/mahasiswa/update/{nim}','mhsAPIController@update');
Route::delete('/mahasiswa/delete/{nim}','mhsAPIController@delete');

Route::get('/task/read', 'mhsAPIController@readtask');
Route::post('/task/create','mhsAPIController@createtask');
Route::post('/task/update/{id}','mhsAPIController@updatetask');
Route::delete('/task/delete/{id}','mhsAPIController@deletetask');

