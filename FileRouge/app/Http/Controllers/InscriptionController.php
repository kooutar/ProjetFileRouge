<?php

namespace App\Http\Controllers;

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
        // Validation des données
       $data= ['id_cours' => $idcours];
        $data['id_etudiant'] = auth()->user()->id;

        $this->inscriptionService->inscrire($data);
        // dd($data);

        return redirect()->back()->with('success', 'Inscription réussie !');
    }
}
