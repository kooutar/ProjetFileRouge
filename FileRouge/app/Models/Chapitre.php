<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    //
    protected $fillable = [
        'titreChapitre',
        'pathVedio',
        'id_cours',
    ];
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }


    
}
