<?php

namespace App\Providers;


use App\repositories\Admin;
use App\repositories\Cours;
use App\repositories\Chapitre;
use App\repositories\Etudiant;
use App\repositories\Categorie;
use App\repositories\Professeur;
use App\repositories\Inscription;
use App\repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\repositories\Interfaces\InterfaceUser;
use App\repositories\Interfaces\InterfaceAdmin;
use App\repositories\Interfaces\InterfaceCours;
use App\repositories\Interfaces\InterfaceChapitre;
use App\repositories\Interfaces\InterfaceEtudiant;
use App\repositories\Interfaces\InterfaceCategorie;
use App\repositories\Interfaces\InterfaceProfesseur;
use App\repositories\Interfaces\InterfaceInscription;


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
        $this->app->bind(
            InterfaceUser::class,
            UserRepository::class
        );

        $this->app->bind(
            InterfaceCours::class,
            Cours::class
        );
        $this->app->bind(
            InterfaceInscription::class,
            Inscription::class
        );
        
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
