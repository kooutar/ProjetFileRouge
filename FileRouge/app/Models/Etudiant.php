<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
    protected $fillable=['id_user','social_id','social_type'];
               
    public function cours()
    {
         return $this->belongsToMany(cours::class, 'inscriptions', 'id_etudiant', 'id_cours');
    }



}