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
            $table->string('username', 100)->unique();
            $table->string("password", 100);
            $table->string("full_name", 100);
            $table->string("email", 100)->unique();
            $table->boolean("active")->default(0);
            $table->boolean("acc_locked")->default(0);
            $table->string("profile_image")->nullable()->default(null);
            $table->foreignId("role_id")->constrained("roles");
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
