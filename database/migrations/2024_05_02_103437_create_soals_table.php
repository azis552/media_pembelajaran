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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kuis');
            $table->text('soal');
            $table->string('gambar')->nullable();
            $table->text('jawaban1');
            $table->text('jawaban2');
            $table->text('jawaban3');
            $table->text('jawaban4');
            $table->text('jawaban5');
            $table->text('jawaban_benar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
