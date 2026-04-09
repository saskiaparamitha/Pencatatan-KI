<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengusul extends Model
{
    protected $table = 'trx_usulan_ki';
    protected $primaryKey = 'trx_usulan_ki_id';

    protected $fillable = [
        'mst_ki_id',
        'user_id',
        'judul',
        'tanggal',
        'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
