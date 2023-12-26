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
        Schema::create('withdraw_utrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdraw_id');
            $table->string('utr')->unique();
            $table->foreign('withdraw_id')->references('id')->on('withdraws')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('withdraw_utrs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
