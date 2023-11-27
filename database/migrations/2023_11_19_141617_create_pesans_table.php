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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->integer('id_pengirim');
            $table->integer('id_penerima');
            $table->unsignedBigInteger('id_file');
            $table->text('pesan')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('id_file')->references('id_file')->on('files')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
