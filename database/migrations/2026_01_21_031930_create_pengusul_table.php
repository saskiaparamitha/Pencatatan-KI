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
        Schema::create('pengusul', function (Blueprint $table) {
            $table->string('nip_pengusul', 20)->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('divisi');
           
            $table->unsignedBigInteger('riwayat_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();

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
        Schema::dropIfExists('pengusul');
    }
};