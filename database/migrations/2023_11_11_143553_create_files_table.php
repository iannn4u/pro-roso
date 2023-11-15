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
        Schema::create('files', function (Blueprint $table) {
            $table->id('id_file');
            $table->integer('id_user');
            $table->string('judul_file');
            $table->string('original_filename');
            $table->string('generate_filename');
            $table->string('status', 50);
            $table->string('ekstensi_file', 20);
            $table->string('mime_type', 100);
            $table->string('file_size');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
