<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Professeur extends Authenticatable
{
    protected $fillable=['status','id_user','path_cv','telephone','deplome','domaine'];

    public function cours()
    {
        return $this->hasMany(Cours::class,'id_professeur');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    
}
