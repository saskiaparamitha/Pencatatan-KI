<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxKolaborator extends Model
{
    protected $table = 'trx_usulan_ki_kolaborator';

    protected $fillable = [
        'trx_usulan_ki_id',
        'nama',
        'email',
        'peran',
        'kontribusi',
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
