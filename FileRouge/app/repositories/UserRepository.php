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
            } elseif ($user->professeur) {     
                // $redirect_url = '/dashboardProf';
                return redirect('/dashboardProf');
            } elseif ($user->etudiant) {
                return redirect('/courses');
                // $redirect_url = '/courses';
            } 
           return redirect('/page');
        }
        else{
           redirect('/login')->with('error', 'Identifiants invalides');
        }
 
    }
    

    public function logout(array $data)
    {
        Auth::logout();
        return response()->json(['message' => 'Déconnexion réussie']);
    }

}
