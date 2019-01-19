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

Route::get('/inscription', function(){
    return view('Inscription');
});

Route::post('/inscription', function(){

    $user= new App\Users;

    $user->Name_user=request('name_user');
    $user->Surname_user=request('surname_user');
    $user->Localisation_user=request('localisation_user');
    $user->Email_user=request('email_user');
    $user->Password_user=request('password_user');
    $user->Status_user='Etudiant';

    $user->save();

    return "Inscription recue";
});