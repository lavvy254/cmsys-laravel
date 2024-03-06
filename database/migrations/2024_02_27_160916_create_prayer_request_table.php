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
        Schema::create('prayer_request', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Pending','Answered']);
            $table->timestamps();
            $table->foreignId('requested_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('prayer_id')->references('id')->on('prayer')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_request');
    }
};
