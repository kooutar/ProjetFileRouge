<?php

namespace App\repositories;

use App\Models\Categorie as ModelsCategorie;
use App\repositories\Interfaces\InterfaceCategorie;

class Categorie implements InterfaceCategorie
{

    public function create( array $data){

        return ModelsCategorie::create($data);
    }
    public function update(array $data ,$id){
        $categorie = $this->findById($id);
        if ($categorie) {
             $categorie->update($data);
             return $categorie;
        }
        return null; 
    }
    public function delete($id)
    {
        $categorie = $this->findById($id);
        if ($categorie) {
            return $categorie->delete();
        }
        return false; 
    }
    public function findById($id)
    {
        return ModelsCategorie::find($id);
    }
    public function GetAll(){
        return ModelsCategorie::all();
    }


    
}
