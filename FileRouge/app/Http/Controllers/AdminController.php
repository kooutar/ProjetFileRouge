<?php

namespace App\Http\Controllers;
use App\Models\Cours;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //


    public function index(){
        $parCategorie = Cours::select('id_categrie', DB::raw('count(*) as nbr'))
            ->groupBy('id_categrie')
            ->with('categorie:id,categorie')
            ->get();
      
    
        $total = $parCategorie->sum('nbr');
        
        // Ajoute un champ "pourcentage" à chaque élément
        foreach ($parCategorie as $item) {
            $item->pourcentage = round(($item->nbr / $total) * 100, 1); // 1 décimale
        }

        $inscriptions = DB::table('users')
      
        ->selectRaw("TO_CHAR(created_at, 'Month') as mois, COUNT(*) as total")
        ->groupByRaw("TO_CHAR(created_at, 'Month')")
        
        ->get();
      
    // Convertir les numéros de mois en noms (1 => Janvier, etc.)
        $labels = [];
        $data = [];

        foreach ($inscriptions as $inscription) {
            $labels[] = trim($inscription->mois); // supprimer les espaces
            $data[] = $inscription->total;
        }

        $top3Cours = DB::table('cours')
        ->join('inscriptions', 'cours.id', '=', 'inscriptions.id_cours')
        ->select('cours.titre', DB::raw('COUNT(inscriptions.id_etudiant) as total_inscriptions'))
        ->groupBy('cours.id')
        ->orderByDesc('total_inscriptions')
        ->limit(3)
        ->get();
    
        return view('pages.AdminPage.pageStatistique', compact('parCategorie','labels', 'data', 'top3Cours'));
    }


   
}
