<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/candidat', 'Auth\LoginController@showCandidatLoginForm');
Route::get('/login/recruteur', 'Auth\LoginController@showRecruteurLoginForm');

Route::get('/register/candidat', 'Auth\RegisterController@showCandidatRegisterForm');
Route::get('/register/recruteur', 'Auth\RegisterController@showRecruteurRegisterForm');

Route::post('/login/candidat', 'Auth\LoginController@candidatLogin');
Route::post('/login/recruteur', 'Auth\LoginController@recruteurLogin');

Route::post('/register/candidat', 'Auth\RegisterController@createCandidat');
Route::post('/register/recruteur', 'Auth\RegisterController@createRecruteur');

Route::resource('offre','OffreController')->only(['index','show','create','edit','store','update','destory']);

Route::view('/home', 'home')->middleware('auth');
Route::view('/recruteur', 'recruteur');
Route::view('/candidat', 'candidat');

