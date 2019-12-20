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

// route Search
Route::get('/search', 'SearchController@index');

// Paypal Routes

Route::post('/ExecutePayment', 'PaypalController@payWithPaypal')->name('pay');
Route::get('/status', 'PaypalController@status');
Route::get('/cancel', 'PaypalController@canceled');

// Candidats Routes
Route::get('/candidats', 'CandidatsController@index');
Route::get('/candidat/{show}', 'CandidatsController@show')->name('candidat');
Route::get('/candidat/{show}/edit', 'CandidatsController@edit');
Route::put('/candidat/{id}', 'CandidatsController@update');
Route::post('/candidater' , 'CandidaturesController@store');
Route::get('/candidatures/{offre}' , 'CandidaturesController@index');
Route::get('/annuler/{candidature}' , 'CandidaturesController@destroy');
                       /// cv ///
Route::get('/cv' , 'CvsController@index');
Route::get('/candidat/{show}/{cv}', 'CvsController@show');
Route::post('/cv' , 'CvsController@store');
Route::post('/cv/modifier' , 'CvsController@update');
Route::get('/modifier/cv/{cv}' , 'CvsController@edit');
Route::delete('supp_cv/{cv}' , 'CvsController@destroy');



// RECRUTEUR Routes
Route::get('/recruteur/{show}', 'RecruteursController@show');
Route::get('/recruteur/{show}/edit', 'RecruteursController@edit');
Route::put('/recruteur/{id}', 'RecruteursController@update');
Route::get('/offre/create', 'OffresController@create');
Route::post('/offre/create', 'OffresController@store');

// DASHBOARD Routes
Route::get('dashboard', 'AdminsController@index');
Route::get('dashboard/offers', 'AdminsController@manageOffers');
Route::get('dashboard/accept/{offer}', 'AdminsController@acceptOffers');
Route::get('dashboard/recruiters', 'AdminsController@index');
Route::get('dashboard/candidates', 'AdminsController@index');
    // |--> Statistics Offers
Route::get('dashboard/statistics/offers', 'AdminsController@statisticsOffers');

// Jobs
Route::get('/offres' , 'OffresController@index');
Route::get('/offre/{show}' , 'OffresController@show');
Route::get('/offre/{edit}/modifier' , 'OffresController@edit');
Route::put('/offre/{update}/modifier' , 'OffresController@update');

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

// |--> ADMIN
Route::get('/login/dashboard', 'Auth\LoginController@adminLoginView');
Route::Post('/login/dashboard', 'Auth\LoginController@adminLogin');


// logout
Route::get('/logout', 'Auth\LoginController@logout');
