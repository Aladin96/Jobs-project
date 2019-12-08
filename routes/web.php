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
// route racine
Route::get('/','HomeController@index');

// Paypal Routes

Route::post('/ExecutePayment', 'PaypalController@payWithPaypal')->name('pay');
Route::get('/status', 'PaypalController@status');
Route::get('/cancel', 'PaypalController@canceled');

// Candidats Routes
Route::get('/candidats', 'CandidatsController@index');
Route::get('/candidat/{show}', 'CandidatsController@show')->name('candidat');
Route::get('/candidat/{show}/edit', 'CandidatsController@edit');
Route::put('/candidat/{id}', 'CandidatsController@update');
Route::get('/cv' , 'CvsController@index');
Route::post('/cv' , 'CvsController@store');


// RECRUTEUR Routes
Route::get('/recruteur/{show}', 'RecruteursController@show');
Route::get('/recruteur/{show}/edit', 'RecruteursController@edit');
Route::put('/recruteur/{id}', 'RecruteursController@update');
Route::get('/offre/create', 'OffresController@create');
Route::post('/offre/create', 'OffresController@store');

// Jobs
Route::get('/offres' , 'OffresController@index');
Route::get('/offre/{show}' , 'OffresController@show');

// Favoris
Route::get('/favoris', 'FavoriController@index');
Route::post('/favoris', 'FavoriController@store');

// Authentification
Auth::routes();

//Register

  // |--> CANDIDAT
Route::get('/register/candidat', 'Auth\RegisterController@createCandidatView');
Route::Post('/register/candidat', 'Auth\RegisterController@createCandidat');

   // |--> RECRUTEUR
Route::get('/register/recruteur', 'Auth\RegisterController@createRecruteurView');
Route::Post('/register/recruteur', 'Auth\RegisterController@createRecruteur');

// LOGIN

  // |--> CANDIDAT
Route::get('/login/candidat', 'Auth\LoginController@candidatLoginView');
Route::Post('/login/candidat', 'Auth\LoginController@candidatLogin');

// |--> RECRUTEUR
Route::get('/login/recruteur', 'Auth\LoginController@recruteurLoginView');
Route::Post('/login/recruteur', 'Auth\LoginController@recruteurLogin');

// logout
Route::get('/logout', 'Auth\LoginController@logout');
