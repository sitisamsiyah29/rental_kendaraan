<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPenyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';

    protected $fillable = [
        'pengguna_id', 'kendaraan_id', 'status'
    ];

    public function pengguna()
    {
        return $this->belongsTo(AdminPengguna::class, 'pengguna_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(AdminKendaraan::class, 'kendaraan_id');
    }
}
