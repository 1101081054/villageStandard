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
    \Illuminate\Support\Facades\Log::alert('dasfoiebgoi', array('dfghjk', 'BHNJMK'));
    return view('welcome');
});

Route::get('testApi', 'TestController@testApi');
Route::get('test', 'TestController@test');
Route::get('rabbitmq', 'TestController@rabbitmq');


require_once 'api.php';
