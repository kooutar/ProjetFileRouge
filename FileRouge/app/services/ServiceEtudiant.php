<?php

namespace App\services;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\repositories\Etudiant as reposteryEtudiant;


class ServiceEtudiant
{
    private $EtudiantRepositery;
    public function __construct(reposteryEtudiant $EtudiantRepositery)
    {
        $this->EtudiantRepositery=$EtudiantRepositery;
    }

    public function socialLoginService($socialUser)
    {
        // Vérifier si l'utilisateur existe déjà
        $user = $this->EtudiantRepositery->findByEmail($socialUser->getEmail());
       
        if (!$user) {
           
            

            // Si l'utilisateur n'existe pas, le créer
            $user = $this->EtudiantRepositery->registre([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(uniqid()), // Générer un mot de passe aléatoire
                'social_id' => $socialUser->getId(),
                'social_type' => "google",
            ]);
        }

        // Connecter l'utilisateur
        Auth::login($user);

        return $user;
    }

    public function RegistreService(array $data){
       
        $data['password']=Hash::make($data['password']);
        return $this->EtudiantRepositery->registre($data);
    }
    public function LoginService(array $data){
         $this->EtudiantRepositery->login($data);
    }
}
