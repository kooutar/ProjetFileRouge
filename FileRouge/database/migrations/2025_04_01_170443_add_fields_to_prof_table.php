<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('professeurs', function (Blueprint $table) {
           $table->string('path_cv');
           $table->string('telephone');
           $table->enum('deplome',['Licence','Master', 'Doctorat','Autre']);
           $table->string('domaine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professeurs', function (Blueprint $table) {
            //
        });
    }
};
