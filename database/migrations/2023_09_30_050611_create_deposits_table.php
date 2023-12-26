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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platform_detail_id');


            $table->string('utr', 50)->unique();
            $table->string('deposit_amount');
            $table->string('bonus');
            $table->string('total_deposit_amount');
            $table->string('image')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('banker_status')->nullable();
            $table->string('status')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('isInformed')->default(0);
            $table->foreign('platform_detail_id')->references('id')->on('platform_details')->onDelete('cascade');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('our_bank_detail_id');
            $table->foreign('our_bank_detail_id')->references('id')->on('our_bank_details')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('deposits');
        Schema::table('deposits', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};