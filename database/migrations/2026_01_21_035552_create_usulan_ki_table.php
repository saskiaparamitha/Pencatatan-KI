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
        Schema::create('usulan_ki', function (Blueprint $table) {
            $table->id('usulan_ki_id');
            $table->string('judul_ki');
            $table->date('tanggal_pengajuan');
            $table->string('jenis_ki');
            $table->string('deskripsi_ki');

            $table->string('nip_pengusul', 20);

            $table->timestamps();

            $table->foreign('nip_pengusul')
                ->references('nip_pengusul')
                ->on('pengusul')
                ->cascadeOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_ki');
    }
};
