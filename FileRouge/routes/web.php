<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\certificat;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ProfMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CoursController;
use App\Http\Middleware\EtudiantMiddleware;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\InscriptionController;


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

        Route::get('/detailleCoures/{id}',[CoursController::class,'detailleCoures'])->name('detailleCoures');
        Route::get('/courses',[CoursController::class,'afficheCouresdansDachboordEtudiant'])->name('courses.index');
        Route::match(['get', 'post'], '/inscrireCours/{idcours}', [InscriptionController::class, 'inscrire'])->name('inscrireCours');

        Route::get('/profile',[EtudiantController::class,'getProfile'])->name('profile');

        Route::post('/chapitre/{id}/terminer', [ChapitreController::class, 'terminer'])->name('chapitre.terminer');
        Route::get('/chapitre/{id}/terminer', [ChapitreController::class, 'terminer'])->name('chapitre.terminer');
        Route::get('/certificat/{iduser}/{idcours}', [certificat::class, 'generateCertificat'])->name('certificat.generate');

        Route::post('/cours/{id}/noter', [InscriptionController::class, 'noter'])->name('cours.noter');
       Route::get('/chat/{cours_id}',function(){
        return view('pages.EtudiantPage.chat');
       });
       Route::post('/envoyer-message',[chatController::class,'envoyerMessage']);

       Route::get('/subcategories/{id}', [CategorieController::class, 'getSubcategories']);


});



Route::middleware(['auth',ProfMiddleware::class])->group(function(){
            // go to dachboord prof
        Route::get('/dashboardProf',function(){
                return view('pages.profPage.DashboordProf');
            });
            // go to add cours
        Route::get('/addCours',[ProfesseurController::class,'toFormAddCours'])->name('addCours');
        Route::delete('/supprimer-cours/{id}',[CoursController::class,'delete'])->name('supprimer.cours');
        Route::put('/updateCours/{id}',[CoursController::class,'update'])->name('update.cours');
        Route::get('/mesCours',[CoursController::class,'index'])->name('mesCours');
        Route::post('/addCours',[CoursController::class,'store'])->name('addCours');
        Route::post('/addChpaitre',[ChapitreController::class,'store'])->name('store.chapitre');
        Route::get('/chapitres/{idcours}',[ChapitreController::class,'getchapitresCours'])->name('mesChapitres');
        Route::delete('/supprimer-chapitre/{id}',[ChapitreController::class,'delete'])->name('chapitres.destroy');
        Route::put('/updateChapitre/{id}',[ChapitreController::class,'update'])->name('chapitres.update');

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
        
        Route::post('/accepter-cours/{id}', [CoursController::class, 'acceptercours'])->name('accepter.cours');
        Route::post('/refuser-cours/{id}', [CoursController::class, 'refusercours'])->name('refuser.cours');


        Route::get('/get-cv/{id}', [ProfesseurController::class, 'getCv']);
        Route::post('/ajoutCatecegorie',[CategorieController::class,'store'])->name('ajoutCatecegorie');
        Route::delete('/deleteCategorie/{id}',[CategorieController::class,'deleteCategorie'])->name('deleteCategorie');
        Route::put('/updateCategorie/{id}',[CategorieController::class,'updateCategorie'])->name('updateCategorie');
        Route::get('/tageCategorie ',[CategorieController::class,'getAllcategories']);
        Route::get('/ProfesseursAdmin ',[ProfesseurController::class,'getAllProf'])->name('allProf');
        Route::get('/statistiqueAdmin ',[AdminController::class,'index']);

        Route::get('/coursAdmin ',[CoursController::class,'indexadmin'])->name('allCours');


});





