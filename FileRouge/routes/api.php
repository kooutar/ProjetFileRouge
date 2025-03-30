<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registre',[EtudiantController::class,'store']);
Route::post('/login',[EtudiantController::class,'login']);
