<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstStatus extends Model
{
    protected $table = 'mst_status';
    protected $primaryKey = 'mst_status_id';
    public $timestamps = false;

    public function usulan()
    {
        return $this->hasMany(TrxUsulanKI::class, 'mst_status_id');
    }
}
