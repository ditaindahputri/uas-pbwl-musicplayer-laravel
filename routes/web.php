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

Auth::routes();

route::group(['middleware'=>'auth'],function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/artist', 'ArtistController');
Route::resource('/album', 'AlbumController');
Route::resource('/track', 'TrackController');
Route::resource('/played', 'PlayedController');
Route::get('/', function () {
    return view('index');
});
});
