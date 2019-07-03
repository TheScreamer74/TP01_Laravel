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

Route::get('/ask', 'QuestionController@create')->name('question.create')->middleware('auth');

Route::get('/ask/{id}', 'QuestionController@create')->name('question.create')->middleware('auth');

Route::post('/ask', 'QuestionController@store')->name('question.store')->middleware('auth');

Route::put('/ask/{id}', 'QuestionController@edit')->name('question.edit')->middleware('auth');

Route::post('/ask/{id}', 'QuestionController@update')->name('question.update')->middleware('auth');

Route::delete('ask/{id}', 'QuestionController@destroy')->name('question.destroy')->middleware('auth');

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

Route::get('/redact', 'CategoryController@create')->name('category.create')->middleware('auth');

Route::post('/redact', 'CategoryController@store')->name('category.store')->middleware('auth');

Route::put('/redact/{id}', 'CategoryController@edit')->name('category.edit')->middleware('auth');

Route::post('/redact/{id}', 'CategoryController@update')->name('category.update')->middleware('auth');

Route::delete('/redact/{id}', 'CategoryController@destroy')->name('category.destroy')->middleware('auth');

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

Route::get('/moderation', 'CategoryController@moderate')->name('category.moderation')->middleware('auth');


Auth::routes(['register' => false]);

