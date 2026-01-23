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
        Schema::create('trx_usulan_ki_dokumen', function (Blueprint $table) {
            $table->bigIncrements('trx_usulan_ki_dokumen_id');
            $table->unsignedBigInteger('trx_usulan_ki_id');
            $table->string('nama_dokumen');
            $table->string('tipe_dokumen');
            $table->string('file_path');
            
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('trx_usulan_ki_id')
                ->references('trx_usulan_ki_id')
                ->on('trx_usulan_ki')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_usulan_ki_dokumen');
    }
};
