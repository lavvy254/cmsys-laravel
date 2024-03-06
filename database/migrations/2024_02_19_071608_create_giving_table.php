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
        Schema::create('giving', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['tithe','offering'])->default('offering');
            $table->string('transaction');
            $table->integer('amount');
            $table->text('description');
            // user id is the contributor
            $table->foreignId('user_id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giving');
    }
};
