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

Route::view('/home','home');

//on a nos route qui font appel au controller qui gérera l'inscription 
Route::get('/inscription','User_Sign_In_Controller@Sign_in_page');

Route::post('/inscription', 'User_Sign_In_Controller@Sign_in');


Route::get('/event', 'Event_user@View_event');

Route::post('/event', 'Event_user@Sign_in_event');

Route::get('/connexion','ConnexionCtrl@Formulaire');

Route::post('/connexion', 'ConnexionCtrl@Log_in');

Route::get('/deconnexion', 'Log_outCtrl@Log_out');

Route::get('/updateevent', 'Create_eventCtrl@Upgrade');

route::get('/magasin' , 'list_product_controller@display_product');

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/