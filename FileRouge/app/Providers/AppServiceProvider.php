<?php

namespace App\Providers;

use App\repositories\Admin;
use App\repositories\Categorie;
use App\repositories\Chapitre;
use App\repositories\Etudiant;
use App\repositories\Interfaces\InterfaceAdmin;
use App\repositories\Interfaces\InterfaceCategorie;
use App\repositories\Interfaces\InterfaceChapitre;
use App\repositories\Interfaces\InterfaceEtudiant;
use App\repositories\Interfaces\InterfaceProfesseur;
use App\repositories\Professeur;
use App\repositories\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(InterfaceEtudiant::class, Etudiant::class);
        $this->app->bind(InterfaceProfesseur::class, Professeur::class);
        $this->app->bind(InterfaceCategorie::class, Categorie::class);
        $this->app->bind(InterfaceChapitre::class, Chapitre::class);
        $this->app->bind(InterfaceAdmin::class, Admin::class);
        
        // $this->app->bind(Tag::class,interfaceT)// add interface tag
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
