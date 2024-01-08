<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminCabang;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Cabang';
        $data['cabang'] = AdminCabang::all();
        return view('admin.cabang.index', $data);
    }

    public function create()
    {
        $data['header_title'] = 'Tambah Cabang';
        return view('admin.cabang.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_cabang' => 'required',
            'alamat_cabang' => 'required',
            'no_telepon_cabang' => 'required'
        ]);

        $cabang = AdminCabang::create([
            'nama_cabang' => $request->input('nama_cabang'),
            'alamat_cabang' => $request->input('alamat_cabang'),
            'no_telepon_cabang' => $request->input('no_telepon_cabang')
        ]);

        if ($cabang) {
            return redirect()->route('cabang.index')->with('message', 'Cabang Berhasil Ditambahkan!');
        } else {
            return redirect()->route('cabang.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Cabang!');
        }
    }

    public function edit(AdminCabang $cabang)
    {
        $data['header_title'] = 'Edit Cabang';
        return view('admin.cabang.edit', compact('cabang'), $data);
    }

    public function update(Request $request, AdminCabang $cabang)
    {
        $cabang = AdminCabang::findOrFail($cabang->id);
        $cabang->update([
            'nama_cabang' => $request->input('nama_cabang'),
            'alamat_cabang' => $request->input('alamat_cabang'),
            'no_telepon_cabang' => $request->input('no_telepon_cabang')
        ]);

        if ($cabang) {
            return redirect()->route('cabang.index')->with('message', 'Cabang Berhasil Diupdate!');
        } else {
            return redirect()->route('cabang.create')->with('error', 'Terjadi Kesalahan Saat Mengupdate Cabang!');
        }
    }

    public function destroy(AdminCabang $cabang)
    {
        $cabang->delete();
        if ($cabang) {
            return redirect()->route('cabang.index')->with('message', 'Cabang Berhasil Dihapus!');
        } else {
            return redirect()->route('cabang.index')->with('error', 'Terjadi Kesalahan Saat Menghapus Cabang!');
        }
    }
}
