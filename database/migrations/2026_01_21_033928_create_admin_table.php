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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('nip_admin', 20)->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
           
            //FK
            $table->unsignedBigInteger('riwayat_id')->nullable();

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
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
