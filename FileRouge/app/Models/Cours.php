<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'titre', 'Description', 'image', 'status', 'prix', 'id_professeur', 'id_categrie'
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'id_professeur');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
