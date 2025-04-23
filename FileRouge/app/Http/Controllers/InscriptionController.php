<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\services\ServiceInscription;

class InscriptionController extends Controller
{
    //
    private $inscriptionService;
    public function __construct(ServiceInscription $inscriptionService)
    {
        $this->inscriptionService = $inscriptionService;
    }


    public function inscrire(Request $request, $idcours)
    {
        
        $data= ['id_cours' => $idcours];
        $data['id_etudiant'] = auth()->user()->id;

        $this->inscriptionService->inscrire($data);
       $estIncrite= $this->EstInscrite($data['id_cours']);

       return redirect()->back()->with([
        'success' => 'Inscription réussie !',
        'estInscrit' => $estIncrite
    ]);
    }

    public function EstInscrite($idcours)
    {
        $idEtudiant = auth()->user()->id;
        $inscription = $this->inscriptionService->findById($idcours, $idEtudiant);
        return $inscription;
    }


    public function noter(Request $request, $idCours)
{
    $request->validate([
        'note' => 'required',
        'note.*' => 'integer|min:1|max:5',
    ]);
  
    $note = max($request->note);   // prend la plus haute étoile cochée

    $inscription = Inscription::where('id_cours', $idCours)
                  ->where('id_etudiant', auth()->id())
                  ->firstOrFail();

    $inscription->update(['note' => $note]);

    return back()->with('success', 'Merci pour votre note !');
}

public function show($idCours)
{
    $cours = Cours::findOrFail($idCours);

    // inscription de l’étudiant connecté (s’il existe)
    $inscription = Inscription::where('id_cours', $idCours)
                              ->where('id_etudiant', auth()->id())
                              ->first();

    return view('cours.show', compact('cours', 'inscription'));
}


}
