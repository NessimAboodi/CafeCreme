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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('category');       // Ex: 'Côté Salé', 'Coffee Shop'
            $table->string('name');           // Nom en Français
            $table->string('name_en')->nullable(); // Nom en Anglais
            $table->text('description')->nullable();    // Description en Français
            $table->text('description_en')->nullable(); // Description en Anglais
            $table->string('price');          // Prix (ex: "7.50€" ou "4.50€ / 8.00€")
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
