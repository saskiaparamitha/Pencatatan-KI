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
        Schema::create('trx_usulan_ki', function (Blueprint $table) {
            $table->bigIncrements('trx_usulan_ki_id');
            $table->unsignedBigInteger('mst_ki_id');
            $table->unsignedBigInteger('user_id');
            $table->string('judul');
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
                        
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Foreign key
            $table->foreign('mst_ki_id')
                ->references('mst_ki_id')
                ->on('mst_ki')
                ->restrictOnDelete();

            // Foreign key
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_usulan_ki');
    }
};
