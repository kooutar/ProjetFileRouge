<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    //
    protected $fillable = [
        'etudiant_id',
        'chapitre_id',
        'completed_at',
    ];
}
