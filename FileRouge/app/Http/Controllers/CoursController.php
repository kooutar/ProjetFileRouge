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
            'titre' => 'required|string',
            'Description' => 'required|string',
            'image' => 'required|string',
            'status' => 'in:pending,rejected,accepted',
            'prix' => 'required|numeric',
            'id_professeur' => 'required|exists:professeurs,id',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        $this->courService->create($data);
        return redirect('/mesCours')->with('success', 'Cours créé avec succès !');
    }

    public function index()
    {
        $cours = $this->courService->getAll();
        // $categories = $this->categorieService->GetAllCategoiesService();
        return view('pages.profPage.mesCours', compact('cours'));
    }
}
