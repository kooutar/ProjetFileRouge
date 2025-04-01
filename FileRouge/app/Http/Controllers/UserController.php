<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\ServiceEtudiant;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    private $userService;
    public function __construct(ServiceEtudiant $userService)
    {
      $this->userService=$userService;
    }
    public function login(Request $request){

        $datavalidate=$request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
             ]);
             $etudiant =$this->userService->loginService($datavalidate);
           return redirect('/courses');
       }

 public function logout(Request $request){
   Auth::logout();
   return redirect('/login');
 }
    
}
