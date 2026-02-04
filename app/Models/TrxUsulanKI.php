<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MstStatus;

class TrxUsulanKI extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trx_usulan_ki';
    protected $primaryKey = 'trx_usulan_ki_id';

    protected $fillable = [
        'mst_ki_id', 'user_id', 'judul', 'tanggal', 'deskripsi', 'status',
        'jenis_paten', 'bidang_teknologi',
        'jenis_ciptaan', 'kategori',
        'jenis_merek', 'kelas_merek',
        'jenis_desain', 'produk',
        'jenis_pvt', 'varietas',
        'jenis_desain_tlst',
        'wilayah', 'produk_ig',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
        return $this->dokumen()->where('jenis_dokumen', $jenis)->get();
    }

    public function status()
    {
        return $this->belongsTo(MstStatus::class, 'mst_status_id');
    }
}