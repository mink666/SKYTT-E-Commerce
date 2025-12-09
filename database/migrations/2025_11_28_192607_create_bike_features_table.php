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
        $table->integer('order')->default(0); // 1=TopLeft, 2=BotLeft, 3=TopRight, 4=BotRight
        $table->string('header_title');       // e.g. "THIẾT KẾ"
        $table->text('body_content');         // e.g. "Trẻ trung..."
        $table->string('header_icon_url')->nullable();
        // No timestamps needed usually, but okay if included
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
