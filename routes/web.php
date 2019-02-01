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



//--SIGN IN--//
Route::get('/subscribe','Users_Sign_In_Control@Sign_in_page');

Route::post('/subscribe', 'Users_Sign_In_Control@Sign_in');
//



//--EVENTS--//
Route::get('/events_month', 'Event_user@View_events_month');

Route::post('/events_month', 'Event_user@Sign_in_event');

Route::get('/events_past', 'Event_user@View_events_past');

Route::get('/events_private', 'Event_user@View_events_private');

Route::get('/events_idea', 'Event_user@View_events_idea');

Route::post('/events_idea', 'Event_user@Vote_event');

Route::post('/event', 'Event_user@Sign_in_event');

Route::post('/Download', 'Event_user@Download_photos_events');
//



//--CREATE EVENTS
Route::get('/create_events_idea', 'Create_eventCtrl@View_create_idea');

Route::post('/create_events_idea', 'Create_eventCtrl@Suggest');

Route::get('/create_events', 'Create_eventCtrl@View_create_event');

Route::post('/create_events', 'Create_eventCtrl@Create_event');

//we have a get ccreate upgrade for the error of t
Route::get('/create_upgrade_event', 'Create_eventCtrl@View_create_event');

Route::post('/create_upgrade_event', 'Create_eventCtrl@View_create_event');

Route::post('/upgrade_event', 'Create_eventCtrl@Upgrade');

Route::post('/delete_past', 'Create_eventCtrl@Delete_past');

Route::post('/notify', 'Create_eventCtrl@Notify_event');

Route::get('/maj_events', 'Create_eventCtrl@MAJ_event');
//



//--PHOTOS--//


Route::get('/view_photos', 'PhotosCtrl@View_photos');

Route::post('/like', 'PhotosCtrl@Like');

Route::post('/create_comment', 'PhotosCtrl@Create_comments');

Route::post('/post_photo', 'PhotosCtrl@Create_photos');

Route::post('/notify_photo', 'PhotosCtrl@Notify_photo');

Route::post('/delete_com', 'PhotosCtrl@Delete_comments');

//



//--CONNEXION--//

Route::get('/connexion','ConnexionCtrl@Formulaire');

Route::post('/connexion', 'ConnexionCtrl@Log_in');

Route::get('/deconnexion', 'Log_outCtrl@Log_out');

Route::post('/change_status', 'ConnexionCtrl@Change_status');

Route::get('/change_status', 'ConnexionCtrl@View_change_status');

Route::get('/legal_notice', 'ConnexionCtrl@View_legal_notice');


//



//--Boutique--//

Route::get('/pannier', 'PannierCtrl@View_pannier');

Route::get('/create_product', 'BoutiqueCtrl@View_create_product');

Route::post('/create_product', 'BoutiqueCtrl@Create_product');

Route::get('/shop', 'BoutiqueCtrl@View_shop');

Route::post('/add_product', 'PannierCtrl@Add_product');

Route::post('/validate_order', 'PannierCtrl@Validate_order');

Route::post('/delete_select', 'PannierCtrl@Delete_product_pannier');
//


//--PDF--//
Route::post('/pdf_event', 'PDFController@pdf');




/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/