<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TrxUsulanKiDokumen extends Model
{
    use HasFactory;

    protected $table = 'trx_usulan_ki_dokumen';
    protected $primaryKey = 'trx_usulan_ki_dokumen_id';

    protected $fillable = [
        'trx_usulan_ki_id',
        'jenis_dokumen',
        'file_name',
        'file_path',
        'file_size',
        'mime_type',
    ];

    public function usulanKi()
    {
        return $this->belongsTo(TrxUsulanKi::class, 'trx_usulan_ki_id', 'trx_usulan_ki_id');
    }

    public function getUkuranFormatted()
    {
        $bytes = $this->file_size;
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