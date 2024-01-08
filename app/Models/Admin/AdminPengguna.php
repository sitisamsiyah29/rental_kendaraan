<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';

    protected $fillable = [
        'nama', 'alamat', 'no_telepon', 'email', 'password', 'role'
    ];

    public function penyewaan()
    {
        return $this->belongsTo(AdminPenyewaan::class, 'pengguna_id');
    }
}
