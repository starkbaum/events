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
    return view('welcome');
});




Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get('/admin', 'AdminController@index')->name('admin.index');


// Routes for sports
Route::get('/admin/sports', 'SportController@index')->name('admin.sports.index');
Route::get('/admin/sports/create', 'SportController@create')->name('admin.sports.create');
Route::post('/admin/sports/store', 'SportController@store')->name('admin.sports.store');
Route::get('/admin/sports/delete/{sport}', 'SportController@destroy')->name('admin.sports.delete');
Route::get('/admin/sports/{sport}', 'SportController@edit')->name('admin.sports.edit');
Route::put('/admin/sports/update/{sport}', 'SportController@update')->name('admin.sports.update');

