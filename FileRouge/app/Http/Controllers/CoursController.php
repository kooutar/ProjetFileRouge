<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\ServiceCours;
use App\services\ServiceCategorie;


class CoursController extends Controller
{
    //

    protected $courService;
    protected $categorieService;
    protected $InscriptionController;
    protected $chapitreController;

    public function __construct(ServiceCours $courService ,ServiceCategorie $categorieService, InscriptionController $InscriptionController,chapitreController $chapitreController)
    {
       
        $this->InscriptionController = $InscriptionController;
        $this->categorieService = $categorieService; 
        $this->courService = $courService;
        $this->chapitreController = $chapitreController;
    }



    public function store(Request $request)
    {
                $data = $request->validate([
                'titre' => 'required',
                'Description' => 'required',
                'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
                'prix' => 'required|numeric',
                'id_categrie' => 'required',
                'chapters.*.titrechapitre' => 'required|string|max:255',
                'chapters.*.pathVedio' => 'required|file|mimes:mp4,mov,avi,wmv|max:2048',
            ]);
            $data['id_professeur'] = auth()->user()->id;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('ficheCours', 'public'); 
                $data['image'] = $imagePath; 
            }
            $cours= $this->courService->create($data);
            $cours->id;
            $this->chapitreController->store($data['chapters'], $cours->id);
            return redirect('/mesCours')->with('success', 'Cours créé avec succès !');
    }

    public function index()
    {
        $cours = $this->courService->getAll();

        return view('pages.profPage.mesCours', compact('cours'));
    }


    public function delete($id)
    {
        $this->courService->delete($id);
        return redirect('/mesCours')->with('success', 'Cours supprimé avec succès !');
    }



    public function afficheCouresdansDachboordEtudiant()
    {
        $courses = $this->courService->getAll();

        return view('pages.EtudiantPage.courses', compact('courses'));
    }


    public function detailleCoures($id)
    {
       $cours = $this->courService->getById($id);
       $estInscrite = $this->InscriptionController->EstInscrite($id);
        $chapitres = $this->chapitreController->getchapitresCours($id);
       return view('pages.EtudiantPage.detailleCours' ,compact('cours','estInscrite','chapitres'));
    }
}
