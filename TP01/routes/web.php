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

    App\Event::create([
        'name' => 'EVO Japan',
        'description' => 'Tekken matches with korean',
        'location' => 'Japan',
        'prince' => '50'
        ]);

    $events = App\Event::all();

    return view('events.index')->withEvents($events);
});
