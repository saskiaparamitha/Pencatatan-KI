<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxUsulanKI extends Model
{
    protected $table = 'trx_usulan_ki';
    protected $primaryKey = 'trx_usulan_ki_id';

    protected $fillable = [
        'mst_ki_id', 
        'user_id', 
        'judul',  
        'tanggal',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mstKI()
    {
        return $this->belongsTo(MstKI::class, 'mst_ki_id');
    }

    public function dokumen()
    {
        return $this->hasMany(TrxUsulanKiDokumen::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function kolaborator()
    {
        return $this->hasMany(TrxUsulanKiKolaborator::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function getDokumenByJenis($jenis)
    {
        return $this->dokumen()->where('tipe_dokumen', $jenis)->get();
    }

    public function status()
    {
        return $this->belongsTo(MstStatus::class, 'mst_status_id');
    }
}