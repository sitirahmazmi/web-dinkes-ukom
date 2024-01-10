<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('file_name', ['SK Pangkat Terakhir', 'SK Fungsional Terakhir',
            'SK atau Surat Pencantuman Gelar', 'Ijazah Terakhir', 'Surat Tanda Registrasi (STR)',
            'Surat Izin Praktik (SIP)', 'Surat Rekomendasi', 'Portofolio', 'Sasaran Kerja Pegawai (SKP)']);
            $table->string('file_path');
            $table->integer('file_version')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('uploads');
    }
};

