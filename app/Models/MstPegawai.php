<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstPegawai extends Model
{
    protected $table = 'mst_pegawai';  
    protected $fillable = [
        'nip_Pegawai',
        'nama',
        'satuan_kerja',  
    ];                 // kalau tabel tidak ada updated_at/created_at, set false
}