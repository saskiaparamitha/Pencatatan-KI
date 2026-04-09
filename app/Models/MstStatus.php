<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstStatus extends Model
{
    protected $table = 'mst_status';
    protected $primaryKey = 'mst_status_id';

    protected $fillable = [
        'nama_status',
    ];
}
