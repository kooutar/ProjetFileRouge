<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\ServiceCours;
use App\services\ServiceEtudiant;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class EtudiantController extends Controller
{
   private $EtudiantService;
   private $coursService;
   public function __construct(ServiceEtudiant $EtudiantService, ServiceCours $coursService)
   {
     $this->coursService=$coursService;
   
     $this->EtudiantService=$EtudiantService;
   }
    // for socailite
   public function store(Request $request){
  
     $datavalidate=$request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users|max:255',
    'password' => 'required|min:6|confirmed',
     ]);
    
     $this->EtudiantService->RegistreService($datavalidate);
     return  redirect('/login');
   }


   
   public function getProfile()
   {
       $idetudiant=Auth::user()->id;
       $etudiant = $this->EtudiantService->getCoursEtudiant($idetudiant);
       return view('pages.EtudiantPage.profile',compact('etudiant'));
   }
   

}



