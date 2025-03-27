<?php

namespace App\repositories;

use App\Models\Etudiant as ModelsEtudiant;
use App\repositories\Interfaces\InterfaceEtudiant;
use App\repositories\Interfaces\InterfaceUser;

class Etudiant implements InterfaceUser ,InterfaceEtudiant
{ 

        public function registre(array $data){
           return ModelsEtudiant::create($data);

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
  
}
