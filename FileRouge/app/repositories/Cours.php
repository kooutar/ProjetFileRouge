<?php

namespace App\repositories;

use App\Models\vueCours;
use App\repositories\Interfaces\InterfaceCours;
use App\Models\Cours as CoursModel;

class Cours implements InterfaceCours
{
    public function all()
    {
        return vueCours::all();
    }

    public function find($id)
    {
        return vueCours::findOrFail($id);
    }

    public function create( $data)
    {
      
        try {
            return CoursModel::create($data);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            die('Erreur : ' . $e->getMessage());
        }
       
    }

    public function update($id, array $data)
    {
        $Cours = CoursModel::findOrFail($id);
        $Cours->update($data);
        return $Cours;
    }

    public function delete($id)
    {
        return CoursModel::destroy($id);
    }
}
