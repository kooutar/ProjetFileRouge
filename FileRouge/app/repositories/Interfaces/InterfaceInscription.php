<?php

namespace App\repositories\Interfaces;

Interface InterfaceInscription
{
    public function create( array $data);
    public function update(array $data ,$id);
    public function delete($id);
    public function findById($idciurs,$idetudiant);
    public function GetAll();
}
