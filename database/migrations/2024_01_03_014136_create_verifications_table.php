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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('biodata_id');
            $table->unsignedBigInteger('upload_id');
            $table->enum('status',['komplit','belum komplit']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('biodata_id')->references('id')->on('biodatas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('upload_id')->references('id')->on('uploads')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};