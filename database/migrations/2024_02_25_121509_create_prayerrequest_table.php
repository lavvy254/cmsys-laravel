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
            $table->bigInteger('prayer_id');
            $table->bigInteger('user_id');
            $table->enum('status',['Pending','Answered']);
            $table->timestamps();
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
