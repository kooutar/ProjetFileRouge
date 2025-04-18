<?php

namespace App\repositories;

use App\repositories\Interfaces\InterfaceChapitre;
use App\Models\Chapitre as ChapitreModel;

class Chapitre implements InterfaceChapitre
{
    /**
     * Create a new class instance.
     */
   

    public function create( array $data){
        return ChapitreModel::insert($data);
    }
    public function update(array $data ,$id){

    }
    public function delete($id){

    }
    public function findById($id){

    }
    public function GetAll(){

    }
    public function getchapitresCours($idcours)
    {
        return ChapitreModel::where('id_cours', $idcours)->get();
    }
}
