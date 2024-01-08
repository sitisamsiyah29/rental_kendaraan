<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|unique:pengguna',
            'email' => 'required|email:dns|unique:pengguna',
            'password' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);

        Pengguna::create($validate);

        return redirect('/login');
    }
}
