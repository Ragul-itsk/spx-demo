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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platform_detail_id');
            $table->unsignedBigInteger('bank_name_id');
            $table->string('amount');
            $table->string('image')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('banker_status')->nullable();
            $table->string('status')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('isInformed')->default(0);
            $table->enum('rolling_type', ['Yes', 'No']);
            $table->foreign('platform_detail_id')->references('id')->on('platform_details')->onDelete('cascade');
            $table->foreign('bank_name_id')->references('id')->on('bank_details')->onDelete('cascade');
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
        // Schema::dropIfExists('withdraws');

        Schema::table('withdraws', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
