<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCabang extends Model
{
    use HasFactory;
    protected $table = 'cabang';

    protected $fillable = [
        'nama_cabang', 'alamat_cabang', 'no_telepon_cabang'
    ];

    public function kendaraan()
    {
        return $this->hasMany(AdminKendaraan::class, 'cabang_id');
    }
}
