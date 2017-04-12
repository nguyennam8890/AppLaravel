<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// Route::get('list', function () {
//     return view('index');
// });
Route::get('list',['uses'         =>'SinhvienController@getList']);
Route::post('add',['uses'         =>'SinhvienController@postAdd']);
Route::get('edit/{id}',['uses'    =>'SinhvienController@getEdit']);
Route::post('edit/{id}',['uses'   =>'SinhvienController@postEdit']);
Route::post('delete/{id}',['uses' =>'SinhvienController@getDelete']);