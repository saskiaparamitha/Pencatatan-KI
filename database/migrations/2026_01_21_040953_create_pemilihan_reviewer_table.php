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
        Schema::create('pemilihan_reviewer', function (Blueprint $table) {
            $table->id('id_penugasan');

            $table->date('tanggal_penugasan');
            $table->string('status_penugasan');

            //FK
            $table->unsignedBigInteger('riwayat_id');
            $table->string('nip_admin', 20);

            //audit
            $table->timestamps();
            $table->softDeletes();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();

            //constraint
            $table->foreign('riwayat_id')
                ->references('riwayat_id')
                ->on('riwayat_usulan')
                ->onDelete('cascade');

            $table->foreign('nip_admin')
                ->references('nip_admin')
                ->on('admin')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihan_reviewer');
    }
};
