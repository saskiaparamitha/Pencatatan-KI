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
        Schema::create('trx_usulan_ki_syarat', function (Blueprint $table) {
            $table->bigIncrements('trx_usulan_ki_syarat_id');
            $table->unsignedBigInteger('trx_usulan_ki_id');
            $table->unsignedBigInteger('mst_syarat_ki_id');
            $table->string('value');

            $table->timestamps();
            $table->softDeletes(); // deleted_at

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('trx_usulan_ki_id')
                ->references('trx_usulan_ki_id')
                ->on('trx_usulan_ki');
            
            $table->foreign('mst_syarat_ki_id')
                ->references('mst_syarat_ki_id')
                ->on('mst_syarat_ki');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_usulan_ki_syarat');
    }
};
