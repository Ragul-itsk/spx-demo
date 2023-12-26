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
        Schema::create('user_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('name')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternative_mobile')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('lead_source_id')->default(1);
            $table->string('location')->nullable();
            $table->boolean('isActive')->default(1);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('user_registrations');
        Schema::table('user_registrations', function(Blueprint $table)
        {
            $table->dropSoftDeletes();
        });
    }
};