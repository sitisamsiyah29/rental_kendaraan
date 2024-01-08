<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPengguna;
use Illuminate\Http\Request;

class AdminPenggunaController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Pengguna';
        $data['pengguna'] = AdminPengguna::all();
        return view('admin.pengguna.index', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Tambah Pengguna';
        return view('admin.pengguna.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $pengguna = AdminPengguna::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        if ($pengguna) {
            return redirect()->route('pengguna.index')->with('message', 'Pengguna Berhasil Ditambahkan!');
        } else {
            return redirect()->route('pengguna.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Pengguna!');
        }
    }

    public function edit(AdminPengguna $pengguna)
    {
        $data['header_title'] = 'Edit Pengguna';
        return view('admin.pengguna.edit', compact('pengguna'), $data);
    }

    public function update(Request $request, AdminPengguna $pengguna)
    {
        $pengguna = AdminPengguna::findOrFail($pengguna->id);
        if ($request->input('password') != "") {
            $pengguna->update([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_telepon' => $request->input('no_telepon'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
            ]);
            if ($pengguna) {
                return redirect()->route('pengguna.index')->with('message', 'Pengguna Berhasil Diupdate!');
            } else {
                return redirect()->route('pengguna.create')->with('error', 'Terjadi Kesalahan Saat Mengupdate Pengguna!');
            }
        } else {
            $pengguna->update([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_telepon' => $request->input('no_telepon'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ]);
            if ($pengguna) {
                return redirect()->route('pengguna.index')->with('message', 'Pengguna Berhasil Diupdate!');
            } else {
                return redirect()->route('pengguna.create')->with('error', 'Terjadi Kesalahan Saat Mengupdate Pengguna!');
            }
        }
    }

    public function destroy(AdminPengguna $pengguna)
    {
        $pengguna->delete();
        if ($pengguna) {
            return redirect()->route('pengguna.index')->with('message', 'Pengguna Berhasil Dihapus!');
        } else {
            return redirect()->route('pengguna.index')->with('error', 'Terjadi Kesalahan Saat Menghapus Pengguna!');
        }
    }
}
