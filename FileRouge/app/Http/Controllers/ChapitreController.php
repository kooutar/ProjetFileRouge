<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Completion;
use App\Models\Inscription;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
   
 protected $chapitreService;
    public function __construct(\App\services\ServiceChapitre $chapitreService)
    {
        $this->chapitreService = $chapitreService;
    }

    public function store($data,$coursid)
    {
       
            foreach ($data as $chapter) {
                        $chapitreData= [
                            'titrechapitre' => $chapter['titrechapitre'],
                            'pathVedio' => $chapter['pathVedio']->store('chapitres', 'public'),
                            'id_cours' => $coursid,
                        ];

                    // dd($data);
                   
                    $this->chapitreService->create($chapitreData);

                }
               
                return redirect('/mesCours')->with('success', 'Chapitre créé avec succès !');
    }
    public function getchapitresCours($idcours)
    {
        return  $this->chapitreService->getchapitresCours($idcours);  
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
            Inscription::where('id_etudiant', $etudiantId)
                ->where('id_cours', $coursId)
                ->update(['progress' => $progress]);
    }


    public function terminer(Request $request, $id)
        {
            $etudiantId = auth()->id();

            $dejaFait = Completion::where('etudiant_id', $etudiantId)
                ->where('chapitre_id', $id)
                ->exists();
                dd($dejaFait);

            if (!$dejaFait) {
                Completion::create([
                    'etudiant_id' => $etudiantId,
                    'chapitre_id' => $id,
                    'completed_at' => now(),
                ]);

                // Optionnel : mise à jour de la progression
                $coursId = Chapitre::find($id)->cours_id;
            dd($coursId);
                $this->updateProgress($etudiantId, $coursId);
            }

            return response()->json(['message' => 'Chapitre terminé']);
        }

}
