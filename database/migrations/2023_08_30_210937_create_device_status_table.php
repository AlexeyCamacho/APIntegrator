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
        Schema::create('device_status', function (Blueprint $table) {
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('status_id');
            $table->primary(['status_id','device_id']);

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_status');
    }
};
