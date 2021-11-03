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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cocktails/gacha','CocktailController@gacha')->name('cocktails.gacha');
Route::post('cocktails/show','CocktailController@show')->name('cocktails.show');

Auth::routes();

// 
Route::get('/home', 'HomeController@index')->name('home');

// カクテルログ
Route::group(['prefix'=>'notes','middleware'=>'auth'], function(){
    Route::get('create','NoteController@create')->name('notes.create');
    Route::post('store','NoteController@store')->name('notes.store');
    Route::get('show/{id}','NoteController@show')->name('notes.show');
    Route::get('edit/{id}','NoteController@edit')->name('notes.edit');
    Route::post('update/{id}','NoteController@update')->name('notes.update');
    Route::post('destroy/{id}','NoteController@destroy')->name('notes.destroy');
});
