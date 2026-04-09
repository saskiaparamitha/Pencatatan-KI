<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstPegawai extends Model
{
    protected $table = 'mst_pegawai';

    protected $fillable = [
        'nip_pegawai',
        'nama',
        'satuan_kerja',
    ];
}
