<?php

namespace App\repositories\Interfaces;

interface InterfaceChapitre
{
    public function create( array $data);
    public function update(array $data ,$id);
    public function delete($id);
    public function findById($id);
    public function GetAll();
   
}
