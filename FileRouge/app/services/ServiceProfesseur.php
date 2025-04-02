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
        return $this->RespositoryProf->registre($data);
    }

    public function getAllprofService(){
        return $this->RespositoryProf->getAllprof();
    }

    public function accepterprofService($id){
        return $this->RespositoryProf->accepterprof($id);
    }
}
