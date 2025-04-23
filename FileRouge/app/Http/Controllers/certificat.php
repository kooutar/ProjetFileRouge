<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\etudiantCoursView;

class certificat extends Controller
{
    

    public function generateCertificat($iduser , $titrecours)
    {
        // Récupérer les informations de l'étudiant et du cours
        $certificat = etudiantCoursView::where('id_user', $iduser)->where('titre', $titrecours)->first();
       
        // Générer le certificat
        $pdf = Pdf::loadView('certificat', compact('certificat'));

        // Retourner le PDF en téléchargement
        return $pdf->download('certificat.pdf');
    }
}
