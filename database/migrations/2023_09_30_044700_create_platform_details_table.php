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
        Schema::create('platform_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('platform_id');
            $table->foreign('player_id')->references('id')->on('user_registrations')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('plat_forms')->onDelete('cascade');
            $table->string('platform_username')->nullable();
            $table->string('platform_password')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platform_details');
    }
};