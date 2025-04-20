<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW coursEtudiantView AS
       SELECT e.id_user ,i.note,i.progress, c.titre  from etudiants as e join  inscriptions as i on e.id_user = i.id_etudiant join cours
       c on c.id=i.id_cours;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS coursEtudiantView");
    }
};
