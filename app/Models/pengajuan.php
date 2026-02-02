<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    
    protected $fillable = [
        'jenis_ki',
        'nomor_pengajuan',
        'data',
        'dokumen',
        'status',
    ];

    protected $casts = [
        'data' => 'array',
        'dokumen' => 'array',
    ];
}