<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Completion;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapitreController extends Controller
{
   
 protected $chapitreService;
    public function __construct(\App\services\ServiceChapitre $chapitreService)
    {
        $this->chapitreService = $chapitreService;
    }

 

    public function store(Request $request)
{
    

    $filename = null;
    if ($request->hasFile('pathVedio')) {
        $filename = time() . '.' . $request->file('pathVedio')->store('chapitres', 'public');
        // $request->file('pathVedio')->move(public_path('chapitres'), $filename);
    }

    Chapitre::create([
        'id_cours' => $request->id_cours,
        'titrechapitre' => $request->titrechapitre,
        'pathVedio' => $filename,
    ]);

    return redirect('/mesCours')->with('success', 'Chapitre créé avec succès !');
}

    public function getchapitresCours($idcours)
    {
        $chapitres=  $this->chapitreService->getchapitresCours($idcours);  
        return view('pages.profPage.chapitres', compact('chapitres'));
    }


    public function updateProgress($etudiantId, $coursId)
     {
            // Étape 1 : Récupérer tous les chapitres du cours
            $totalChapitres = Chapitre::where('id_cours', $coursId)->count();

            // Étape 2 : Récupérer tous les chapitres que l'étudiant a terminés pour ce cours
            $chapitresTermines = Completion::where('etudiant_id', $etudiantId)
                ->whereIn('chapitre_id', function ($query) use ($coursId) {
                    $query->select('id')
                        ->from('chapitres')
                        ->where('id_cours', $coursId);
                })->count();
               

            // Étape 3 : Calculer le pourcentage de progression
            $progress = 0;
            if ($totalChapitres > 0) {
                $progress = ($chapitresTermines / $totalChapitres) * 100;
            }
        
        
            // Étape 4 : Mettre à jour la table inscriptions
            $updated = Inscription::where('id_etudiant', $etudiantId)
                ->where('id_cours', $coursId)
                ->update(['progress' => $progress]);
        
    }


    public function terminer(Request $request, $id)
        {
            $etudiantId = auth()->id();
          
            $dejaFait = Completion::where('etudiant_id', $etudiantId)
                ->where('chapitre_id', $id)
                ->exists();
                // dd($dejaFait);

            if (!$dejaFait) {
                Completion::create([
                    'etudiant_id' => $etudiantId,
                    'chapitre_id' => $id,
                    'completed_at' => now(),
                ]);

                // Optionnel : mise à jour de la progression
                $coursId = Chapitre::find($id)->id_cours;
           
                $this->updateProgress($etudiantId, $coursId);
            }

            return response()->json(['message' => 'Chapitre terminé']);
        }

        public function update(Request $request, $id)
{
    $chapitre = Chapitre::findOrFail($id);

    // Validation du formulaire
    $request->validate([
        'titrechapitre' => 'string|max:255',
        'pathVedio' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // max 50MB
    ]);

    // Mise à jour du titre (et autres données simples)
    $chapitre->titrechapitre = $request->titrechapitre;

    // Si une nouvelle vidéo est envoyée
    if ($request->hasFile('pathVedio')) {
        // Supprimer l'ancienne vidéo si elle existe
        if ($chapitre->pathVedio) {
            Storage::delete('public/' . $chapitre->pathVedio);
        }

        // Stocker la nouvelle vidéo
        $videoPath = $request->file('pathVedio')->store('videos', 'public');

        // Enregistrer le nouveau chemin
        $chapitre->pathVedio = $videoPath;
    }

    $chapitre->save();

    return back()->with('success', 'Chapitre mis à jour avec succès !');
}

    public function delete($id)
    {
        $chapitre = Chapitre::findOrFail($id);
        $chapitre->delete();
        return back()->with('success', 'Chapitre supprimé avec succès !');
    }
}
