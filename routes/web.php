<?php

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

Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/', 'NoteController@index')->middleware('auth');
    Route::get('/notes', 'NoteController@index');
    Route::get('/notes/create', 'NoteController@create');
    Route::delete('/notes/{note}', 'NoteController@delete');
    Route::get('/notes/{note}', 'NoteController@show');
    Route::post('/notes', 'NoteController@store'); 
    Route::get('/notes/{note}/edit', 'NoteController@edit');
    Route::put('/notes/{note}', 'NoteController@update');
    Route::get('/search', 'NoteController@search');
    Route::get('/', 'HomeController@index')->name('home');
});

Auth::routes();