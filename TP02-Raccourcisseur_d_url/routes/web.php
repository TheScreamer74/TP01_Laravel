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

use App\Url;


Route::get('/', 'UrlsController@Create');

Route::post('/', 'UrlsController@Index');



Route::get('/{shortened}', function ($shortened) {

    $url = Url::where('shortened', $shortened)->first();

    if(! $url){
        return redirect('/');
    }

    return redirect($url->url);

});