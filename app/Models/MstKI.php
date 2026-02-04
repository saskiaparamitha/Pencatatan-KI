<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstKI extends Model
{
    protected $table = 'mst_ki';
    protected $primaryKey = 'mst_ki_id';
    public $incrementing = false;

    protected $fillable = ['mst_ki_id', 'nama_ki'];
}
