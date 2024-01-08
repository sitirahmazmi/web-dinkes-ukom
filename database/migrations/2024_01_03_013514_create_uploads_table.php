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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('sk_pangkat_terakhir');
            $table->string('sk_fungsional_terakhir');
            $table->string('sk_pencantuman_gelar');
            $table->string('ijazah_terakhir');
            $table->string('str');
            $table->string('sip');
            $table->string('surat_rekomendasi');
            $table->string('portofolio');
            $table->string('file_path');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
