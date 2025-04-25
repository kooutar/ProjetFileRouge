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
    
        return view('pages.AdminPage.pageStatistique', compact('parCategorie'));
    }
   
}
