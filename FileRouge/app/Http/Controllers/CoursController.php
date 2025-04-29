<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Chapitre;
use App\Models\Categorie;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\services\ServiceCours;
use App\services\ServiceCategorie;
use Illuminate\Support\Facades\Storage;


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
        
            ]);


            $data['id_professeur'] = auth()->user()->id;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('ficheCours', 'public'); 
                $data['image'] = $imagePath; 
            }
            $cours= $this->courService->create($data);
            $tagController = new TagController();
           $tagController->storeTags($request, $cours->id);
          

            // $this->chapitreController->store($data['chapters'], $cours->id);
            return redirect('/mesCours')->with('success', 'Cours créé avec succès !');
    }

    public function index()
    {
        $cours = $this->courService->getAll();
        $categories = Categorie::all();
        return view('pages.profPage.mesCours', compact('cours','categories'));
    }


    public function indexadmin()
    {
        $courses = Cours::with(['Professeur', 'Categorie', 'chapitres'])
                  ->get();
      $pendingCount = Cours::where('status', 'pending')->count();
        return view('pages.AdminPage.cours', compact('courses','pendingCount'));
    }

    public function delete($id)
    {
        $this->courService->delete($id);
        return redirect('/mesCours')->with('success', 'Cours supprimé avec succès !');
    }



    public function afficheCouresdansDachboordEtudiant()
    {
        $courses =Cours::where('status','accepted')->get();
        $categories = Categorie::where('parent_id', '=', null)->get();
 
        return view('pages.EtudiantPage.courses', compact('courses','categories'));
    }


    public function detailleCoures($id)
    {
        $cours = Cours::with('chapitres')->findOrFail($id);
       $estInscrite = $this->InscriptionController->EstInscrite($id);
      $inscription = Inscription::where('id_cours', $id)
      ->where('id_etudiant', auth()->id())
      ->first();
       return view('pages.EtudiantPage.detailleCours' ,compact('cours','estInscrite','inscription'));
    }

    public function acceptercours($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->status = 'accepted';
        $cours->save();
        return redirect('/coursAdmin')->with('success', 'Cours accepté avec succès !');
    }

    public function refusercours($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->status = 'rejected';
        $cours->save();
        return redirect('/coursAdmin')->with('success', 'Cours refusé avec succès !');
    }


    public function updateChapitre(Request $request, $id)
    {
        $chapitre = Chapitre::findOrFail($id);
        $chapitre->update($request->all());
        return redirect('/mesCours')->with('success', 'Chapitre mis à jour avec succès !');
    }

    public function update(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);

        $cours->titre = $request->titre;
        $cours->Description = $request->Description;
        $cours->prix = $request->prix;
        $cours->id_categrie = $request->id_categrie;
    
        // Si une nouvelle image est envoyée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($cours->image) {
                Storage::delete('public/' . $cours->image);
            }
    
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('ficheCours', 'public');
    
            // Enregistrer le chemin dans la base
            $cours->image = $imagePath;
        }
    
        $cours->save();
    
        return redirect('/mesCours')->with('success', 'Cours mis à jour avec succès !');
    }
    

    
}
