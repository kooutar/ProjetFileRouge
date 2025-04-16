<?php

namespace App\repositories;

use App\repositories\Interfaces\InterfaceUser;
use Illuminate\Support\Facades\Auth;

class UserRepository implements InterfaceUser
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function login(array $credentials)
    {
        if(Auth::attempt($credentials)){
            $user = Auth::user();
    
            if ($user->admin) {
                // $redirect_url = '/statistiqueAdmin';
                return redirect('/statistiqueAdmin');
            } elseif ($user->professeur ) {     
                // $redirect_url = '/dashboardProf';
                if($user->professeur->status=='activer'){
                    return redirect('/dashboardProf');
                }else{
                    return redirect('/login')->with('message', "Votre compte n'est pas encore activé.");
                }

                
            } elseif ($user->etudiant) {
                return redirect('/courses');
                // $redirect_url = '/courses';
            } 
           return redirect('/page');
        }
        else{
          return redirect('/login')->with('message', 'Identifiants invalides');
        }
 
    }
    

    public function logout(array $data)
    {
        Auth::logout();
        return response()->json(['message' => 'Déconnexion réussie']);
    }

}
