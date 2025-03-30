<?php

use Illuminate\Support\Facades\Route;

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

