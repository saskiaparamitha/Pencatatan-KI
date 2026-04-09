<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MstStatus;
use App\Models\User;
use App\Models\TrxUsulanKi;

class TrxVerifikasi extends Model
{
    protected $table = 'trx_verifikasi';

    protected $primaryKey = 'trx_verifikasi_id'; // ⬅️ INI PENTING
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'trx_usulan_ki_id',
        'titik_proses',
        'mst_status_id',
        'user_id',
        'catatan',
    ];

    // 🔹 RELASI KE USULAN
    public function usulan()
    {
        return $this->belongsTo(
            TrxUsulanKi::class,
            'trx_usulan_ki_id',
            'trx_usulan_ki_id',
            );
    }

    // 🔹 RELASI KE USER (REVIEWER / VERIFIKATOR)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(
            MstStatus::class,
            'mst_status_id',
            'mst_status_id'
        );
    }
}
