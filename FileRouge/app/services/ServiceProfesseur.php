<?php

namespace App\services;

use Illuminate\Support\Facades\Hash;
use App\repositories\Professeur as RespositoryProf;

class ServiceProfesseur
{
    private $RespositoryProf;
    public function __construct(RespositoryProf $RespositoryProf)
    {
        $this->RespositoryProf=$RespositoryProf;
    }

    public function RegistreService(array $data){
    
        $data['password']=Hash::make($data['password']);

             // Si le CV est inclus dans la requête, nous devons le gérer avant de passer au repository
    if ($data['path_cv']) {
        // Assurez-vous de traiter le fichier avant de l'envoyer au repository
        $data['path_cv'] = $data['path_cv']; // Ici, il faut vérifier si c'est bien un fichier
    }
        return $this->RespositoryProf->registre($data);
    }

    public function getAllprofService(){
        return $this->RespositoryProf->getAllprof();
    }

    public function accepterprofService($id){
        return $this->RespositoryProf->accepterprof($id);
    }
    public function refuserprofService($id){
        return $this->RespositoryProf->refuserprof($id);
    }
    public function getCvService($id)  {
        return $this->RespositoryProf->getCv($id); 
    }
}
