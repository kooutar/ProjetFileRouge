<?php

namespace App\repositories\Interfaces;



Interface InterfaceCategorie
{

    public function create( array $data);
    public function update(array $data ,$id);
    public function delete($id);
    public function findById($id);
    public function GetAll();
   
}
