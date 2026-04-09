<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxDokumenKi extends Model
{
    protected $table = 'trx_usulan_ki_dokumen'; // ⬅️ INI YANG PENTING
    protected $primaryKey = 'trx_usulan_ki_dokumen_id';

    protected $fillable = [
        'trx_usulan_ki_id',
        'nama_dokumen',
        'tipe_dokumen',
        'file_path',
    ];

    public function usulan()
    {
        return $this->belongsTo(
            TrxUsulanKi::class,
            'trx_usulan_ki_id',
            'trx_usulan_ki_id'
        );
    }
}
