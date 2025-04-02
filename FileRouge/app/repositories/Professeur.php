<?php

namespace App\repositories;

use App\Models\Professeur as ModelsProfesseur;
use App\repositories\Interfaces\InterfaceUser;
use App\repositories\Interfaces\InterfaceProfesseur;
use App\Models\user as ModelsUser;
use App\Models\vueProf;

class Professeur  implements InterfaceUser ,InterfaceProfesseur
{
    public function registre(array $data){
     $user= ModelsUser::create($data);
     return ModelsProfesseur::create([
        'id_user'=>$user->id,
        'path_cv' => $data['path_cv'],
        'telephone' => $data['telephone'],
        'deplome' => $data['deplome'],
        'domaine' => $data['domaine'],
    ]);
    }
    public function login(array $data){

    }
    public function logout(array $data){

    }
    public function update(array $data ,$id){

    }
    public function delete($id){

    }
    public function changeStatus($id){
        
    }

    public function findByEmail($email)
    {
        
    }

    public function getAllprof(){
         return vueProf::all();
    }
   
}
