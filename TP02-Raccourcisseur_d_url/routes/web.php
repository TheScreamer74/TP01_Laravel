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
    $url = request('url');



    $validation = Validator::make(compact('url'), ['url' => 'required|url']);

    if($validation->fails()){
        dd('Failed');

    } else {
        dd('Success');
    }


    $record = Url::where('url', $url)->first();

    if($record) {
        return view('result')->with('shortened', $record->shortened);
    }

    $row = Url::create([
        'url' => $url,
        'shortened' => Url::getUniqueShortUrl()
    ]);

    if($row) {
        return view('result')->with('shortened', $record->shortened);
    }
});


Route::get('/{shortened}', function ($shortened) {

    $url = Url::where('shortened', $shortened)->first();

    if(! $url){
        return redirect('/');
    }

    return redirect($url->url);

});