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
        Schema::create('mst_syarat_ki', function (Blueprint $table) {
            $table->bigIncrements('mst_syarat_ki_id');
            $table->unsignedBigInteger('mst_ki_id'); // Relasi ke mst_ki
            $table->string('nama_syarat');
            $table->string('tipe');
            $table->json('value')->nullable();
            
            $table->timestamps();
            $table->softDeletes(); // deleted_at

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Foreign key
            $table->foreign('mst_ki_id')
                ->references('mst_ki_id')
                ->on('mst_ki')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_syarat_ki');
    }
};
