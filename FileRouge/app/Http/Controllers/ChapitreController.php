<?php

namespace App\Http\Controllers;

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
}
