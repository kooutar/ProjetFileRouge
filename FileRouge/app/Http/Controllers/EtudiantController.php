<?php

namespace App\Http\Controllers;

use App\services\ServiceEtudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
   private $EtudiantService;
   public function __construct(ServiceEtudiant $EtudiantService)
   {
     $this->EtudiantService=$EtudiantService;
   }
    
   public function store(Request $request){
     $datavalidate=$request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users|max:255',
    'password' => 'required|min:6|confirmed',
     ]);
     $etudiant =$this->EtudiantService->RegistreService($datavalidate);
     return response()->json(['Sussus'=>$etudiant]);
   }

   public function login(Request $request){
    $datavalidate=$request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
         ]);
         $etudiant =$this->EtudiantService->loginService($datavalidate);
        //  return response()->json(['Sussus'=>$etudiant]);
   }

}
