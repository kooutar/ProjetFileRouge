<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable=['categorie','parent_id'];
    protected $table="categorie";
}
