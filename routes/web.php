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

Route::middleware(['auth', 'verified'])->group(function (){
   Route::get('/notes', "NotesController@index")->name("notes.index");

    Route::post('/notes', "NotesController@store")->name("notes.store");

    Route::get('/notes/create', "NotesController@create")->name("notes.create");

    Route::get('/notes/{note}', "NotesController@show")->name("notes.show");

    Route::put('/notes/{note}', "NotesController@update")->name("notes.update");

    Route::delete('/notes/{note}', "NotesController@destroy")->name("notes.destroy");

    Route::get('/notes/{note}/edit', "NotesController@edit")->name("notes.edit");
//    Route::resources([
//        '/notes'  => 'NotesController'
//    ]);
   Route::get('/dashboard', 'HomeController@index')->name('home');

//    Route::resource('notes', 'NotesController');

});



Auth::routes(['verify' => true]);

Route::get('/settings/account', 'Settings\AccountController@index');

Route::get('/settings/profile', 'Settings\ProfileController@edit')->name('settings.profile.edit');
Route::put('/settings/profile', 'Settings\ProfileController@update')->name('settings.profile.update');
