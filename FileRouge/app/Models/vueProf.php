<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vueProf extends Model
{
    protected $table = 'professursview'; // Nom de la vue SQL
    public $timestamps = false; // Désactiver timestamps car c'est une vue
}
