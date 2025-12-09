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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., "VinFast Evo200"
            $table->string('slug')->unique();
            $table->date('date_of_release')->nullable(); // Your new field
            $table->text('description')->nullable(); // A general description
            $table->string('hero_image')->nullable();// Path to image
            $table->string('tagline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
