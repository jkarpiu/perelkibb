<?php

use App\Http\Controllers\perelkiController;
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

Route::get('/', 'perelkiController@index')->name('/');

Route::get('/item/{id}', 'perelkiController@item');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', function () {
    return view('add');
})->name('add');

Route::get('search', 'perelkiController@search');

Route::post('/add', 'perelkiController@add');

Route::post('/com_add', 'commentsController@add');

Route::post('/per_plus', 'perelkiController@addPoint');
Route::post('/per_minus', 'perelkiController@removePoint');

