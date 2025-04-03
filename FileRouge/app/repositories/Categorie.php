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
        
    }
    public function delete($id){
        
    }
    public function findById($id){
        
    }
    public function GetAll(){
        
    }
    
}
