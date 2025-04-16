<?php

namespace App\services;

use App\repositories\Interfaces\InterfaceInscription;

class ServiceInscription
{
    /**
     * Create a new class instance.
     */
    private $inscriptionRepository;
    public function __construct(InterfaceInscription $inscriptionRepository)
    {
        $this->inscriptionRepository = $inscriptionRepository;
    }
   

    public function inscrire($data){
        return $this->inscriptionRepository->create($data);
    }

    public function findById($idcours, $idEtudiant){
        return $this->inscriptionRepository->findById($idcours, $idEtudiant);
    }
}
