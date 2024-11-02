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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->foreignId('parent_id')->nullable()->default(null)->constrained("reviews");
            $table->foreignId('room_id')->constrained("rooms");
            $table->foreignId('user_id')->constrained("users");
            $table->timestamps(); //!!!!!!!!!!!!
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
