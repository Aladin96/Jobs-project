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
    return view('index');

});
Route::view('company' , 'recruteurs.show');

Route::get('/candidat/{show}', 'CandidatsController@show');
Route::get('/candidat/{show}/edit', 'CandidatsController@edit');

Route::put('/candidat/{id}', 'CandidatsController@update');

Route::get('/recruteur/{show}', 'RecruteursController@show');

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
