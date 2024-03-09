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
        Schema::create('sermon_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sermon_id');
            $table->text('notes');
            $table->timestamps();
            $table->foreign('sermon_id')->references('id')->on('sermon')->onDelete('restrict')->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sermon_note');
    }
};
