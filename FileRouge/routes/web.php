<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;

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
Route::get('/statistiqueAdmin ',function(){
    return view('pages.AdminPage.pageStatistique');
});

Route::get('/ProfesseursAdmin ',[ProfesseurController::class,'getAllProf'])->name('allProf');
Route::get('/auth/{google}', [EtudiantController::class, 'redirectToProvider']);
Route::get('/auth/{google}/callback', [EtudiantController::class, 'handleProviderCallback']);

Route::post('/register', [EtudiantController::class, 'store'])->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/logout',[UserController::class,'logout'])->name('logout');


Route::post('/registreProf',[ProfesseurController::class,'store'])->name('registreProf');


Route::get('/accepter-prof/{id}', [ProfesseurController::class, 'accepterprof'])->name('accepter.prof');

Route::get('/refuser-prof/{id}', [ProfesseurController::class, 'refuserprof'])->name('refuser.prof');


