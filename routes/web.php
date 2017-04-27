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
Route::get('list', ['uses' => 'SinhvienController@getList']);
Route::post('add', ['uses' => 'SinhvienController@postAdd']);
Route::get('edit/{id}', ['uses' => 'SinhvienController@getEdit']);
Route::post('edit/{id}', ['uses' => 'SinhvienController@postEdit']);
Route::post('delete/{id}', ['uses' => 'SinhvienController@getDelete']);
//information

Route::get('information', function () {
    return view('information');
});
Route::get('information/listinformation', ['uses' => 'InformationController@getListInformation']);
Route::post('information/add', ['uses' => 'InformationController@postAdd']);
Route::get('information/edit/{id}', ['uses' => 'InformationController@getEdit']);
Route::post('information/edit/{id}', ['uses' => 'InformationController@postEdit']);
Route::post('information/delete/{id}', ['uses' => 'InformationController@postDelete']);
Route::get('test1', function () {
    return view('test1');
});
Route::get('test2', function () {
    return view('test2');
});
Route::get('directive', function () {
    return view('directive');
});
Route::get('temp', function () {
    return view('template');
});
Route::get('temp2', function () {
    return view('template2');
});
Route::get('temp2/home', function () {
    return view('home');
});
Route::get('login', function() {
    return view('login');
});