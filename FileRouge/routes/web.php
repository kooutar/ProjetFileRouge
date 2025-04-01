<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('About');
});

Route::get('/inscriptionEtudiant',function(){
    return view('pages.EtudiantPage.inscrire');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/inscriptionProf',function(){
    return view('pages.profPage.inscriptionProf');
});

Route::get('/courses',function(){
    return view('pages.EtudiantPage.courses');
});

Route::get('/auth/{google}', [EtudiantController::class, 'redirectToProvider']);
Route::get('/auth/{google}/callback', [EtudiantController::class, 'handleProviderCallback']);

Route::post('/register', [EtudiantController::class, 'store'])->name('register');

