<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::auth();

Route::resource('books', 'BookController');
Route::resource('authors', 'AuthorController');
Route::post('add/{id}', 'BookController@add');

Route::get('list', 'BookListController@index');
Route::get('manage', 'BookListController@manage');
Route::post('manage', 'BookListController@update');
