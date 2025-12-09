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
        Schema::create('bike_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')->constrained()->onDelete('cascade');
            $table->string('color_name'); // e.g., "Red", "Ocean Blue"
            $table->string('image_url'); // The specific image for this color
            $table->decimal('price', 10, 2); // The specific price for this color
            $table->string('color_hex')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_variants');
    }
};
