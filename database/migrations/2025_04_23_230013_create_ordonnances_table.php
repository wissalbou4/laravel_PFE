<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->json("traitement");
            $table->text("note")->nullable();
            $table->string("dosage"); // Champ correctement orthographié
            $table->string("duree");
            $table->foreignId("patient_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordonnances');
    }
};