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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/cesi', function () {
    return view('cesi');
});

Route::get('/arras', function () {
    return view('arras');
});

Route::get('/bde', function () {
    return view('bde');
});

Route::get('/associations', function () {
    return view('associations');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/suggestion_box', function () {
    return view('suggestion_box');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/past_events', function () {
    return view('past_events');
});

