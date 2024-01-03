<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGaji extends Model
{
    use HasFactory;
    protected $table = 'data_gaji';

    protected $guarded = ['id'];

    public function karyawans()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }
}
