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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Nom et Prénom
            $table->string('phone');     // Numéro de téléphone
            $table->date('date');        // Date de la réservation
            $table->string('time');      // Heure de la réservation
            $table->integer('guests');   // Nombre de personnes
            $table->text('notifications')->nullable(); // Précisions ou allergies
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
