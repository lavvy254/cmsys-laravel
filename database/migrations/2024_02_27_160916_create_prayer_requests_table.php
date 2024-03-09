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
<<<<<<<< HEAD:database/migrations/2024_02_27_160916_create_prayer_request_table.php
        Schema::create('prayer_request', function (Blueprint $table) {
========
        Schema::create('prayer_requests', function (Blueprint $table) {
>>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b:database/migrations/2024_02_27_160916_create_prayer_requests_table.php
            $table->id();
            $table->enum('status',['Pending','Answered']);
            $table->timestamps();
            $table->foreignId('requested_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
<<<<<<<< HEAD:database/migrations/2024_02_27_160916_create_prayer_request_table.php
            $table->foreignId('prayer_id')->references('id')->on('prayer')->onDelete('restrict')->onUpdate('cascade');
========
            $table->foreignId('prayer_id')->constrained('prayers')->onDelete('restrict')->onUpdate('cascade');
>>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b:database/migrations/2024_02_27_160916_create_prayer_requests_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2024_02_27_160916_create_prayer_request_table.php
        Schema::dropIfExists('prayer_request');
========
        Schema::dropIfExists('prayer_requests');
>>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b:database/migrations/2024_02_27_160916_create_prayer_requests_table.php
    }
};
