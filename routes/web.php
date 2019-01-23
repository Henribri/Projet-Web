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
    return view('welcome');
});

//on a nos route qui font appel au controller qui gérera l'inscription 
Route::get('/inscription','Users_Sign_In_Control@Sign_in_page');

Route::post('/inscription', 'Users_Sign_In_Control@Sign_in');


Route::get('/event', function () {
    return view('Event');
});

Route::post('/event', 'Event_user@Sign_in');

Route::get('/connexion', function () {
    return view('Connexion');
});

Route::post('/connexion', 'ConnexionCtrl@Log_in');