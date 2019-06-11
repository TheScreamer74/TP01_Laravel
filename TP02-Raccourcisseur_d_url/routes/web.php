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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/', function (){

    $url = Url::where('url', request('url'))->first();

    if($url) {
        return view('result')->with('shortened', $url->shortened);
    }

    function getUniqueShortUrl(){
        $shortened = str_random(5);

        if ( Url::where('shortened', $shortened)->count() >  0 ){
            return getUniqueShortUrl();
        }

        return $shortened;
    }

    $row = Url::create([
        'url' => request('url'),
        'shortened' => getUniqueShortUrl()
    ]);

    if($row) {
        return view('result')->with('shortened', $url->shortened);
    }
});


Route::get('/{shortened}', function ($shortened) {

    $url = Url::where('shortened', $shortened)->first();

    if(! $url){
        return redirect('/');
    }

    return redirect($url->url);

});