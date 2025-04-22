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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->enum('role', ['medcin',  'secretaire', 'administratif']);
            $table->string('image')->default('no_image.jpg');
            $table->tinyInteger('status')->default(1); // Changed from enum to tinyInteger
            $table->time('heure_debut')->nullable(); // Added missing column
            $table->time('heure_fin')->nullable(); // Added missing column
            $table->dateTime('last_login')->nullable(); // Made nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

