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



/*
|--------------------------------------------------------------------------
| /ask + <parameters>
|--------------------------------------------------------------------------
|
| The routes to access to QuestionController
| You can create, Modify and Delete entries
|
|
|
*/

Route::get('/ask/{id}', 'QuestionController@create')->name('question.create');

Route::post('/ask', 'QuestionController@store')->name('question.store');

Route::put('/ask/{id}', 'QuestionController@edit')->name('question.edit');

Route::post('/ask/{id}', 'QuestionController@update')->name('question.update');

Route::delete('ask/{id}', 'QuestionController@destroy')->name('question.destroy');

/*
|--------------------------------------------------------------------------
| /redact + <parameters>
|--------------------------------------------------------------------------
|
| The routes to access to CategoryController
| You can create, Modify and Delete entries
|
|
|
*/

Route::get('/redact', 'CategoryController@create')->name('category.create');

Route::post('/redact', 'CategoryController@store')->name('category.store');

Route::put('/redact/{id}', 'CategoryController@edit')->name('category.edit');

Route::post('/redact/{id}', 'CategoryController@update')->name('category.update');

Route::delete('/redact/{id}', 'CategoryController@destroy')->name('category.destroy');

/*
|--------------------------------------------------------------------------
| /contact
|--------------------------------------------------------------------------
|
| The routes to access to ContactController
| There's no entries in the database, this controller send mails
|
|
|
*/

Route::get('/contact', 'ContactController@index')->name('contact.index');

Route::post('/contact', 'ContactController@store')->name('contact.store');

/*
|--------------------------------------------------------------------------
| Root Route
|--------------------------------------------------------------------------
|
| 
|
|
|
|
*/

Route::get('/', 'CategoryController@index')->name('category.index');


Auth::routes(['register' => false]);

