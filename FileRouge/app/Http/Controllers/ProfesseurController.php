<?php

namespace App\Http\Controllers;

use App\services\ServiceCategorie;
use Illuminate\Http\Request;
use App\services\ServiceProfesseur;

class ProfesseurController extends Controller
{
    private $ProfService;
    private $categorieService;
    public function __construct(ServiceProfesseur $ProfService, ServiceCategorie $categorieService)
    {
        $this->categorieService = $categorieService;
    
        $this->ProfService=$ProfService;
    }

    public function store(Request $request){
  
      
        $datavalidate=$request->validate([
       'name' => 'required|string|max:255',
       'email' => 'required|email|unique:users|max:255',
       'password' => 'required|min:6|confirmed',
        'path_cv' => 'required|file|mimes:pdf,doc,docx',// CV obligatoire, max 2MB
       'telephone' => 'required', // Numéro valide (format international)
       'deplome'   => 'required|string|max:255', // Diplôme obligatoire
       'domaine'   => 'required|string|max:255'  // Domaine obligatoire
        ]);
         // Récupérer le fichier CV
    if ($request->hasFile('path_cv')) {
      $datavalidate['path_cv'] = $request->file('path_cv'); // Ajouter le fichier au tableau de données
  }
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

    public function getCv($id) {
      $prof=$this->ProfService->getCvService($id);
      if (!$prof || !$prof->cv_path) {
        return redirect()->back()->with('error', 'CV introuvable');
    }
    return response()->download(public_path('uploads/' . $prof->cv_path));
      
  }

  public  function toFormAddCours(){
   $categories=$this->categorieService->GetAllCategoiesService();
    return view('pages.profPage.addCours', compact('categories'));
}
}



