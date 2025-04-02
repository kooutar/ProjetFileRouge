<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\ServiceProfesseur;

class ProfesseurController extends Controller
{
    private $ProfService;
    public function __construct(ServiceProfesseur $ProfService)
    {
      $this->ProfService=$ProfService;
    }

    public function store(Request $request){
  
      
        $datavalidate=$request->validate([
       'name' => 'required|string|max:255',
       'email' => 'required|email|unique:users|max:255',
       'password' => 'required|min:6|confirmed',
       'path_cv'   => 'required', // CV obligatoire, max 2MB
       'telephone' => 'required', // Numéro valide (format international)
       'deplome'   => 'required|string|max:255', // Diplôme obligatoire
       'domaine'   => 'required|string|max:255'  // Domaine obligatoire
        ]);
    
        $this->ProfService->RegistreService($datavalidate);
        return  redirect('/inscriptionProf')->with('success', 'Utilisateur ajouté avec succès ,attend le traitement de votre dossier !');;
      }


      public function getAllProf(){
     $profs=$this->ProfService->getAllprofService();
      return view('pages.AdminPage.professeurs', compact('profs'));
    }

    public function accepterprof($id){
      $this->ProfService->accepterprofService($id);
      return  redirect('/ProfesseursAdmin');
    }

    public function refuserprof($id){
      $this->ProfService->refuserprofService($id);
      return  redirect('/ProfesseursAdmin');
    }
}



