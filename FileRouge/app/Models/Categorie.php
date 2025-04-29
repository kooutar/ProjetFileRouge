<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable=['categorie','parent_id'];
    protected $table="categorie";
    

    public function cours()
    {
        return $this->hasMany(Cours::class,'id_categrie');
    }

    public function subcategories()
    {
    return $this->hasMany(Categorie::class, 'parent_id');
    }

    
    
}
