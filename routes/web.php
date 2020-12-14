<?php

use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('register', 'AuthController@showRegister');
    Route::post('register', 'AuthController@register')->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::resource('tasks', 'TaskController');
});

//Route::resource('tasks', 'TaskController');
