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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('Description');
            $table->string('image');
            $table->enum('status',['pending','rejected','accepted'])->default('pending');
            $table->double('prix');
            $table->unsignedBigInteger('id_professeur');
            $table->unsignedBigInteger('id_categrie');
            $table->foreign('id_professeur')->references('id')->on('professeurs');
            $table->foreign('id_categrie')->references('id')->on('categorie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
