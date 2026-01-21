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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id('id_verifikasi');

            //Data verifikasi
            $table->date('tanggal_verifikasi');
            $table->string('status_verifikasi');
            $table->text('komentar')->nullable();

            //FK
            $table->string('nip_admin', 20);
            $table->unsignedBigInteger('usulan_ki_id');


            //audit
            $table->timestamps();
            $table->softDeletes();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();

            //constraint
            $table->foreign('nip_admin')
                ->references('nip_admin')
                ->on('admin')
                ->onDelete('cascade');

            $table->foreign('usulan_ki_id')
                ->references('usulan_ki_id')
                ->on('usulan_ki')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi');
    }
};
