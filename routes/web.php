<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::get('/issue', function () {
    return view('issue');
});

Route::post('/issue/submit', 'IssueController@submit' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
