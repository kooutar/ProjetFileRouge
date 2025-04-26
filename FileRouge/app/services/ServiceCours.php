<?php

namespace App\services;

use App\repositories\Interfaces\InterfaceCours;

class ServiceCours
{
    protected $courRepo;

    public function __construct(InterfaceCours $courRepo)
    {
        $this->courRepo = $courRepo;
    }

    public function getAll()
    {
        return $this->courRepo->all();
    }
    
    public function getAllpourEtudiant()
    {
        return $this->courRepo->getAllpourEtudiant();
    }
    public function getById($id)
    {
        return $this->courRepo->find($id);
    }

    public function create( $data)
    {
        //  dd($data);
        return $this->courRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->courRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->courRepo->delete($id);
    }
}
