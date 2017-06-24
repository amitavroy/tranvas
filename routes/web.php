<?php

Route::get('/', 'HomeController@welcome')->name('welcome');

/**
 * Event related routes
 */
Route::get('events', 'Event\EventController@index')->name('events');
Route::get('events/view/{event}', 'Event\EventController@view')->name('event-view');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
