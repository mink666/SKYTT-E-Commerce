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
        Schema::create('bike_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')->constrained()->cascadeOnDelete();
            $table->string('label'); // e.g., "Weight", "Battery"
            $table->string('value'); // e.g., "15kg", "500Wh"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_specs');
    }
};
