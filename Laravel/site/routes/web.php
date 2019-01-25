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

//route qui permettent de créer un utilisateur
Route::get('/inscription','User_Sign_In_Control@Sign_in_page');

Route::post('/inscription', 'User_Sign_In_Control@Sign_in');

//Route pour afficher les utilisateurs
Route::get('/list_user', 'list_user_controller@display_user');

//route qui permettent d'accéder à la connexion
Route::get('/connexion' , 'User_Connexion@formulaire');

Route::post('/connexion' , 'User_Connexion@Log_in');

route::get('/mon-compte', 'Connexion_controller@accueil');

//route qui permettent d'accéder à la création d'idée
Route::get('/create_idea' , 'Create_idea_controller@Create_idea_page');

Route::post('/create_idea' , 'Create_idea_controller@Create_idea');

//route qui permettent d'accéder à la création d'événements
Route::get('/create_event' , 'Create_event_controller@Create_event_page');

Route::post('/create_event' , 'Create_event_controller@Create_event');

//Route pour afficher la boite à idées et les événements
Route::get('/list_idea', 'list_event_and_idea@display_idea');

Route::get('/list_event', 'list_event_and_idea@display_event');

//route qui permettent d'accéder à la création de produit
Route::get('/create_product' , 'Create_product_controller@Create_product_page');

Route::post('/create_product' , 'Create_product_controller@Create_product');

//Route pour afficher les produits
Route::get('/list_product', 'list_product_controller@display_product');