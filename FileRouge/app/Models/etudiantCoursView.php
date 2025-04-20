<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etudiantCoursView extends Model
{
    protected $table = 'coursetudiantview';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'note',
        'progress',
        'titre'
    ];

}
