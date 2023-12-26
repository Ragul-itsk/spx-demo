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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->string('account_name')->nullable();
            $table->string('account_number', 20)->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('upi')->nullable();
            $table->string('bank_name')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->foreign('player_id')->references('id')->on('user_registrations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('bank_details');
        Schema::table('user_registrations', function(Blueprint $table)
        {
            $table->dropSoftDeletes();
        });
    }
};
