<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'mst_pegawai';              // nama tabel
    protected $primaryKey = 'mst_pegawai_id';      // primary key dari tabel
    public $timestamps = false;                     // kalau tabel tidak ada updated_at/created_at, set false
}