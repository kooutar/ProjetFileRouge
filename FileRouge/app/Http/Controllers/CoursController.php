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

    public function __construct(ServiceCours $courService ,ServiceCategorie $categorieService)
    {
        $this->categorieService = $categorieService;
    
        $this->courService = $courService;
    }



    public function store(Request $request)
    {
        $data = $request->validate([
        'titre' => 'required',
        'Description' => 'required',
        'image' => 'required',
        'id_categrie' => 'required',
    ]);
    
    // Ajoute dynamiquement l'ID du professeur après la validation
    $data['id_professeur'] = auth()->user()->id;
    // dd($data['id_professeur']);
    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('ficheCours', 'public'); // Enregistre dans /storage/app/public/ficheCours
        $data['image'] = $imagePath; // Ajoute le chemin de l'image au tableau des données
    }
    
    
        // dd($request->all());
        $this->courService->create($data);
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
        return view('pages.EtudiantPage.detailleCours' ,compact('cours'));
    }
}
