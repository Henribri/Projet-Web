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

Route::get('/a_propos', function(){
    return view('a_propos');
});

Route::get('/bonjour/{nom}', function(){
    return view('bonjour' , ['prenom' => request('nom')]);
});

//on a nos route qui font appel au controller qui gérera l'inscription 
Route::get('/inscription','Users_Sign_In_Control@Sign_in_page');

Route::post('/inscription', 'Users_Sign_In_Control@Sign_in');