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
        Schema::create('surat', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->enum('surat', ['masuk', 'keluar']);
            $table->string('dinas', 100);
            $table->string('tgl_masuk', 20);
            $table->string('no_surat', 50);
            $table->string('sifat', 15)->default('biasa');
            $table->string('lampiran', 30)->nullable();
            $table->text('hal');
            $table->string('tgl_surat', 20);
            $table->text('disposisi')->nullable();
            $table->text('isi_surat');
            $table->text('uraian');
            $table->enum('jenis_surat', ['biasa', 'undangan', 'disposisi']);
            $table->string('penerima', 100);
            $table->string('tgl_terima', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
