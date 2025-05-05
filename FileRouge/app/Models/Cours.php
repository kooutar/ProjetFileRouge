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
        return $this->belongsTo(user::class, 'id_professeur');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categrie');
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'inscriptions', 'id_cours', 'id_etudiant') ->withPivot('note', 'progress');
    }

    public function chapitres() {
        return $this->hasMany(Chapitre::class,'id_cours');
    }

// Cours.php
public function inscriptions()
{
    return $this->hasMany(Inscription::class, 'id_cours');
}


    
}
