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


use App\Event;

Route::get('/', function () {
    $events = App\Event::all();

    App\Event::create([
        'name' => 'un evenement',
        'description' => 'ceci est un evenement juste pour remplir la base de donnée',
        'location' => 'Nowhere',
        'prince' => '0',
        'starts_at' => new DateTime('+5 days')
    ]);

    App\Event::create([
        'name' => 'deux evenement',
        'description' => 'ceci est un evenement juste pour remplir la base de donnée',
        'location' => 'Nowhere',
        'prince' => '0',
        'starts_at' => new DateTime('+10 days')
    ]);

    return view('events.index')->withEvents($events);
});
