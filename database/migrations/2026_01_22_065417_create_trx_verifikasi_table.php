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
        Schema::create('trx_verifikasi', function (Blueprint $table) {
            $table->bigIncrements('trx_verifikasi_id');
            $table->text('catatan')->nullable();
            $table->string('titik_proses');

            $table->unsignedBigInteger('trx_usulan_ki_id');
            $table->unsignedBigInteger('mst_status_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
            $table->softDeletes(); // deleted_at

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Foreign keys
            $table->foreign('trx_usulan_ki_id')
                ->references('trx_usulan_ki_id')
                ->on('trx_usulan_ki');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->restrictOnDelete();

            $table->foreign('mst_status_id')
                ->references('mst_status_id')
                ->on('mst_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_verifikasi');
    }
};
