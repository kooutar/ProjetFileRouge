<?php

namespace App\repositories\Interfaces;

Interface InterfaceCours
{
    public function create( array $data);
    public function update(array $data ,$id);
    public function delete($id);
    public function findById($id);
    public function GetAll();
}
