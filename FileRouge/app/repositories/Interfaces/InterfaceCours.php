<?php

namespace App\repositories\Interfaces;

Interface InterfaceCours
{
    public function all();
    public function find($id);
    public function create( $data);
    public function update($id, array $data);
    public function delete($id);
    public function getAllpourEtudiant();
}
