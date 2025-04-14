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
}
