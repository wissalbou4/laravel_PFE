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
        Schema::create('ordonnances', function (Blueprint $table) { // Correction orthographique "ordonnances"
            $table->id();
            $table->date("date");
            $table->json("traitement"); // Correction orthographique "traitement"
            $table->text("note")->nullable(); // Changé en text pour plus de contenu
            $table->string("dosage"); // Correction orthographique "dosage"
            $table->string("duree");
            $table->foreignId("patient_id")->constrained()->onDelete('cascade'); // Ajout de onDelete cascade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnances');
    }
};