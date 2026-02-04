<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxUsulanKiKolaborator extends Model
{
    use HasFactory;

    protected $table = 'trx_usulan_ki_kolaborator';
    protected $primaryKey = 'trx_usulan_ki_kolaborator_id';

    protected $fillable = [
        'trx_usulan_ki_id',
        'pegawai_id',
        'urutan',
        'peran',
    ];

    public function usulanKi()
    {
        return $this->belongsTo(TrxUsulanKi::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}