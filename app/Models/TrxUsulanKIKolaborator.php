<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxUsulanKIKolaborator extends Model
{
    protected $table = 'trx_usulan_ki_kolaborator';
    protected $primaryKey = 'trx_usulan_ki_kolaborator_id';

    protected $fillable = [
        'trx_usulan_ki_id',
        'mst_pegawai_id',
        'urutan',
        'peran',
    ];

    public function usulanKi()
    {
        return $this->belongsTo(TrxUsulanKI::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(MstPegawai::class, 'pegawai_id', 'id');
    }
}