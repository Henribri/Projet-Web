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
Route::get('/subscribe','Users_Sign_In_Control@Sign_in_page');

Route::post('/subscribe', 'Users_Sign_In_Control@Sign_in');




Route::get('/events_month', 'Event_user@View_events_month');

Route::post('/events_month', 'Event_user@Sign_in_event');

Route::get('/events_past', 'Event_user@View_events_past');

Route::get('/events_private', 'Event_user@View_events_private');

Route::get('/events_idea', 'Event_user@View_events_idea');

Route::post('/events_idea', 'Event_user@Vote_event');

//creer idees
Route::get('/create_events_idea', 'Create_eventCtrl@View_create_idea');

Route::post('/create_events_idea', 'Create_eventCtrl@Suggest');


//creer event
Route::get('/create_events', 'Create_eventCtrl@View_create_event');

Route::post('/create_events', 'Create_eventCtrl@Create_event');



Route::get('/photos', 'PhotosCtrl@View_photos');

Route::post('/like', 'PhotosCtrl@Like');

Route::post('/photos', 'PhotosCtrl@Create_comments');

Route::post('/event', 'Event_user@Sign_in_event');

Route::get('/connexion','ConnexionCtrl@Formulaire');

Route::post('/connexion', 'ConnexionCtrl@Log_in');

Route::get('/deconnexion', 'Log_outCtrl@Log_out');

Route::post('/update_event', 'Create_eventCtrl@Upgrade');

Route::get('/shop','list_product_controller@display_product');

Route::post('/shop','list_product_controller@Add_product');

Route::get('/shop2','list_product_controller@display_product_bis');

Route::post('/shop2','list_product_controller@Add_product');

Route::get('/create_product','create_product_controller@Create_product_page');

Route::post('/create_product','create_product_controller@Create_product');

Route::get('/list_product','list_product_controller@Supp_product_page');

Route::post('/list_product','list_product_controller@Supp_product');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('test','test_controller@test_view');

Route::get('/pannier','list_product_controller@list_pannier');

Route::get('/add_product','create_product_controller@Create_product_page');

Route::post('/add_product','create_product_controller@Create_product');