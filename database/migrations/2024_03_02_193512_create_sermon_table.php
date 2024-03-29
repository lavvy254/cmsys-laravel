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
        Schema::create('sermon', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('speaker');
            $table->unsignedBigInteger('event_id');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('restrict')->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sermon');
    }
};
