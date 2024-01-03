<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'Karyawan';

    protected $guarded = ['id'];

    public function jabatans()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
