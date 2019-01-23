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

Route::get('/inscription', function(){
    return view('inscription');
});

Route::post('/inscription', function(){
    request()->validate([
        'name_user' => ['required'],
        'surname_user' => ['required'],
        'localisation_user' => ['required'],
        'email_user' => ['required' , 'email'],
        'password_user' => ['required' , 'confirmed' , 'min:6'] ,
        'password_user_confirmation' => ['required'],
    ]);

    $user = App\Users::create([
        'Name_user' => request('name_user'),
        'Surname_user' => request('surname_user'),
        'Localisation_user' => request('localisation_user'),
        'Email_user' => request('email_user'),
        'Password_user' => request('password_user'),
        'Id_status' => 1, 
    ]);
    
    return "Formulaire reçu";
});

//on a nos route qui font appel au controller qui gérera l'inscription 
//Route::get('/inscription','Users_Sign_In_Control@Sign_in_page');

//Route::post('/inscription', 'Users_Sign_In_Control@Sign_in');