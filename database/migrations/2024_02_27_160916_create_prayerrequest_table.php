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
        Schema::create('prayerrequest', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prayer_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status',['Pending','Answered']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('prayer_id')->references('id')->on('prayer')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayerrequest');
    }
};
