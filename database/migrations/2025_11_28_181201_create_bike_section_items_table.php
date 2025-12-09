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
        Schema::create('bike_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('bike_sections')->cascadeOnDelete();
            $table->string('header');
            $table->text('text')->nullable();
            $table->json('bullets')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_section_items');
    }
};
