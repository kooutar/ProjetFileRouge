<?php

namespace App\repositories;

use App\Models\Inscription as InscriptionModel;
use App\repositories\Interfaces\InterfaceInscription;

class Inscription implements InterfaceInscription
{
    
    public function create( array $data){
        InscriptionModel::create($data);
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
