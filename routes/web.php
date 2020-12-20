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

    Route::get('login','AuthController@showLogin')->name('login');
    Route::post('login','AuthController@login')->name('login');

    Route::get('logout','AuthController@logout')->name('logout');

});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::resource('tasks', 'TaskController');
    Route::get('tasks/{task}/delete','TaskController@delete')->name('tasks.delete');

    Route::post('tasks/{task}/done','DoneTaskController')->name('tasks.done');

    Route::resource('tasks.notes','NoteController')
        ->only(['store','destroy']);
//    Route::group([
//       'prefix'=>'tasks/{task}'
//    ],function (){
//  Route::resource('tasks.notes','NoteController')
//        ->only(['store','destroy']);
//    });
});
//Route::resource('tasks', 'TaskController');

