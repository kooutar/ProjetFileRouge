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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->double('progress')->default(0.0);
            $table->integer('note')->default(0);
            $table->unsignedBigInteger('id_cours');
            $table->unsignedBigInteger('id_etudiant');
            $table->foreign('id_cours')->references('id')->on('cours')->onDelete('cascade');
            $table->foreign('id_etudiant')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
