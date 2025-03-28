<?php

namespace App\services;

use App\repositories\Etudiant as reposteryEtudiant;
use Illuminate\Support\Facades\Hash;


class ServiceEtudiant
{
    private $EtudiantRepositery;
    public function __construct(Etudiant $EtudiantRepositery)
    {
        $this->EtudiantRepositery=$EtudiantRepositery;
    }

    public function RegistreService(array $data){
        $data['password']=Hash::make($data['password']);
        return $this->EtudiantRepositery->create($data);
    }
}
