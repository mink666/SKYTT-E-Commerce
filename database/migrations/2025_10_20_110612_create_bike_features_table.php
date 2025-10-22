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
        Schema::create('bike_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')->constrained()->onDelete('cascade');
            $table->string('header_title')->nullable();
            $table->string('header_icon_url')->nullable();
            $table->text('body_content')->nullable();
            $table->integer('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_features');
    }
};
