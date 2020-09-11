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

Route::get('/issues/{id}', 'App\Http\Controllers\IssueController@getIssuesByCustomer')->name('issues');

Route::get('/issues', 'App\Http\Controllers\IssueController@getIssues');

Route::post('/issue/submit', 'App\Http\Controllers\IssueController@submit' );

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');



Auth::routes();

