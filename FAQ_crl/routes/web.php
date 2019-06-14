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

Route::get('/', 'CategoryController@index')->name('category.index');

Route::get('/ask', 'QuestionController@create')->name('question.create');

Route::post('/ask', 'QuestionController@store')->name('question.store');

Route::get('/redact', 'CategoryController@create')->name('category.create');

Route::post('/redact', 'CategoryController@store')->name('category.store');

Route::get('/contact', 'ContactController@index')->name('contact.index');

Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/{id}', 'CategoryController@destroy')->name('category.destroy');

