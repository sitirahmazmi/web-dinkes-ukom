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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('nama');
            $table->string('unit_kerja');
            $table->string('kab_kota');
            $table->string('jenis_jabatan_fungsional');
            $table->enum('kategori',['keterampilan','keahlian']);
            $table->string('jenjang_saat_ini');
            $table->string('jenjang_akan_diduduki');
            $table->string('nomor_wa');
            $table->string('email');
            $table->string('no_sk_pangkat_terakhir');
            $table->date('tgl_sk_pangkat_terakhir');
            $table->string('no_sk_fungsional_terakhir');
            $table->date('tgl_sk_fungsional_terakhir');
            $table->string('no_sk_pencatuman_gelar');
            $table->date('tgl_sk_pencatuman_gelar');
            $table->string('no_ijazah_terakhir');
            $table->date('tgl_ijazah_terakhir');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
