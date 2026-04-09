<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\MstKi;
use App\Models\TrxDokumenKi;
use App\Models\TrxKolaborator;
use App\Models\TrxVerifikasi;

class TrxUsulanKi extends Model
{
    protected $table = 'trx_usulan_ki';
    protected $primaryKey = 'trx_usulan_ki_id';

    protected $fillable = [
        'user_id',
        'mst_ki_id',
        'judul',
        'tanggal',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function dokumen()
    {
        return $this->hasMany(
            TrxDokumenKi::class,
            'trx_usulan_ki_id',
            'trx_usulan_ki_id'
        );
    }

    public function kolaborator()
    {
        return $this->hasMany(
            TrxKolaborator::class,
            'trx_usulan_ki_id',
            'trx_usulan_ki_id'
        );
    }

    public function mstKi()
    {
        return $this->belongsTo(MstKi::class, 'mst_ki_id');
    }

    public function verifikasi()
    {
        return $this->hasOne(
            TrxVerifikasi::class,
            'trx_usulan_ki_id',
            'trx_usulan_ki_id'
        );
    }
}
