<?php

namespace App\repositories;

use App\Models\vueCours;
use App\repositories\Interfaces\InterfaceCours;

class Cours implements InterfaceCours
{
    public function all()
    {
        return vueCours::all();
    }

    public function find($id)
    {
        return Cours::findOrFail($id);
    }

    public function create(array $data)
    {
        return Cours::create($data);
    }

    public function update($id, array $data)
    {
        $Cours = Cours::findOrFail($id);
        $Cours->update($data);
        return $Cours;
    }

    public function delete($id)
    {
        return Cours::destroy($id);
    }
}
