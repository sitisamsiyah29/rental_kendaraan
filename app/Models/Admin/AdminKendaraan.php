<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';

    protected $fillable = [
        'merek', 'model', 'tahun_produksi', 'nomor_plat', 'image', 'status', 'cabang_id'
    ];

    public function cabang()
    {
        return $this->belongsTo(AdminCabang::class, 'cabang_id');
    }

    public function penyewaan()
    {
        return $this->belongsTo(AdminPenyewaan::class, 'kendaraan_id');
    }
}
