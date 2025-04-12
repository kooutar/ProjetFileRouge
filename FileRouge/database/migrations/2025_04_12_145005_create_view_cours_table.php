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
       create or replace view view_cours as
       SELECT c.*, p.name as nom_professeur,cat.categorie as nom_categorie
       FROM cours c
       INNER JOIN users p ON c.id_professeur = p.id
       INNER JOIN categorie cat ON c.id_categrie = cat.id
       inner join chapitres ch on c.id = ch.id_cours;
       ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_cours");
    }
};
