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

//route qui permettent d'accéder à la connexion
Route::get('/connexion' , 'Users_Connexion@formulaire');

Route::post('/connexion' , 'Users_Connexion@traitement');

//route qui permettent d'accéder à la création d'idée
Route::get('/create_idea' , 'Create_idea_controller@Create_idea_page');

Route::post('/create_idea' , 'Create_idea_controller@Create_idea');

//route qui permettent d'accéder à la création d'événements
Route::get('/create_event' , 'Create_event_controller@Create_event_page');

Route::post('/create_event' , 'Create_event_controller@Create_event');