<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pengguna extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = 'pengguna';

    // protected $fillable = [
    //     'nama', 'alamat', 'no_telepon', 'email', 'password', 'role'
    // ];

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_roken'
    ];
}
