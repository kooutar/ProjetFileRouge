<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ProfMiddleware;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CoursController;
use App\Http\Middleware\EtudiantMiddleware;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CategorieController;
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

Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::middleware(['auth',EtudiantMiddleware::class])->group(function(){
    Route::get('/courses',function(){
        return view('pages.EtudiantPage.courses');
    });
});



Route::middleware(['auth',ProfMiddleware::class])->group(function(){
    // go to dachboord prof
    Route::get('/dashboardProf',function(){
        return view('pages.profPage.DashboordProf');
    });
    // go to add cours
    Route::get('/addCours',[ProfesseurController::class,'toFormAddCours'])->name('addCours');

Route::get('/mesCours',function(){
    return view('pages.profPage.mesCours');
});
Route::get('/mescours',[CoursController::class,'index'])->name('mesCours');

Route::post('/addCours',[CoursController::class,'store'])->name('addCours');
});







Route::get('/auth/{google}', [EtudiantController::class, 'redirectToProvider']);
Route::get('/auth/{google}/callback', [EtudiantController::class, 'handleProviderCallback']);
Route::post('/register', [EtudiantController::class, 'store'])->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/registreProf',[ProfesseurController::class,'store'])->name('registreProf');




Route::middleware(['auth',AdminMiddleware::class])->group(function(){  

Route::get('/accepter-prof/{id}', [ProfesseurController::class, 'accepterprof'])->name('accepter.prof');
Route::get('/refuser-prof/{id}', [ProfesseurController::class, 'refuserprof'])->name('refuser.prof');
Route::get('/get-cv/{id}', [ProfesseurController::class, 'getCv']);
Route::post('/ajoutCatecegorie',[CategorieController::class,'store'])->name('ajoutCatecegorie');
Route::delete('/deleteCategorie/{id}',[CategorieController::class,'deleteCategorie'])->name('deleteCategorie');
Route::put('/updateCategorie/{id}',[CategorieController::class,'updateCategorie'])->name('updateCategorie');
Route::get('/tageCategorie ',[CategorieController::class,'getAllcategories']);
Route::get('/ProfesseursAdmin ',[ProfesseurController::class,'getAllProf'])->name('allProf');
Route::get('/statistiqueAdmin ',function(){
    return view('pages.AdminPage.pageStatistique');
});


});








