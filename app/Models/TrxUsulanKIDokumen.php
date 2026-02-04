<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TrxUsulanKiDokumen extends Model
{
    protected $table = 'trx_usulan_ki_dokumen';
    protected $primaryKey = 'trx_usulan_ki_dokumen_id';

    protected $fillable = [
        'trx_usulan_ki_id',
        'nama_dokumen',
        'tipe_dokumen',
        'file_path',
    ];

    public function usulanKi()
    {
        return $this->belongsTo(TrxUsulanKi::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function getUkuranFormatted()
    {
        if (!file_exists(storage_path('app/public/' . $this->file_path))) {
            return '0 B';
        }
        $bytes = filesize(storage_path('app/public/' . $this->file_path));
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($dokumen) {
            if (Storage::disk('public')->exists($dokumen->file_path)) {
                Storage::disk('public')->delete($dokumen->file_path);
            }
        });
    }
}