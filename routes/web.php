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
Route::get('/inscription','Users_Sign_In_Control@Sign_in');

Route::post('/inscription', 'Users_Sign_In_Control@Sign_in');




Route::get('/events_month', 'Event_user@View_events_month');
Route::post('/events_month', 'Event_user@Sign_in_event');

Route::get('/events_past', 'Event_user@View_events_past');

Route::get('/events_private', 'Event_user@View_events_private');

Route::get('/events_idea', 'Event_user@View_events_idea');



Route::get('/photos', 'PhotosCtrl@View_photos');

Route::post('/like', 'PhotosCtrl@Like');

Route::post('/photos', 'PhotosCtrl@Create_comments');

Route::post('/event', 'Event_user@Sign_in_event');

Route::get('/connexion','ConnexionCtrl@Formulaire');

Route::post('/connexion', 'ConnexionCtrl@Log_in');

Route::get('/deconnexion', 'Log_outCtrl@Log_out');

Route::get('/updateevent', 'Create_eventCtrl@Upgrade');

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/