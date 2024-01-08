<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminCabang;
use App\Models\Admin\AdminKendaraan;
use Illuminate\Http\Request;

class AdminKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = 'Kendaraan';
        $data['kendaraan'] = AdminKendaraan::join('cabang', 'cabang.id', '=', 'kendaraan.cabang_id')->select(
            'kendaraan.*',
            'cabang.nama_cabang'
        )->get();
        return view('admin.kendaraan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = 'Kendaraan';
        $data['cabang'] = AdminCabang::all();
        return view('admin.kendaraan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'tahun_produksi' => 'required',
            'nomor_plat' => 'required',
            'cabang' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image') != "") {
            $image = $request->file('image');
            $image->move('assets/images/kendaraan', $image->getClientOriginalName());

            $kendaraan = AdminKendaraan::create([
                'merek' => $request->input('merek'),
                'model' => $request->input('model'),
                'tahun_produksi' => $request->input('tahun_produksi'),
                'nomor_plat' => $request->input('nomor_plat'),
                'image' => $request->file('image')->getClientOriginalName(),
                'status' => 1,
                'cabang_id' => $request->input('cabang')
            ]);

            if ($kendaraan) {
                return redirect()->route('kendaraan.index')->with('message', 'Kendaraan Berhasil Ditambahkan!');
            } else {
                return redirect()->route('kendaraan.create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Kendaraan!');
            }
            dd($kendaraan);
        } else {
            return redirect()->route('kendaraan.create')->with('error', 'Masukan Foto Kendaraan!');
        }
    }

    public function edit(AdminKendaraan $kendaraan)
    {
        $data['header_title'] = 'Edit Kendaraan';
        $data['cabang'] = AdminCabang::all();
        return view('admin.kendaraan.edit', compact('kendaraan'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminKendaraan $kendaraan)
    {
        $kendaraan = AdminKendaraan::findOrFail($kendaraan->id);
        if ($request->file('image') != "") {
            $imagePath = 'assets/images/kendaraan/' . $kendaraan->image;
            unlink($imagePath);
            $image = $request->file('image');
            $image->move('assets/images/kendaraan', $image->getClientOriginalName());

            $kendaraan->update([
                'merek' => $request->input('merek'),
                'model' => $request->input('model'),
                'tahun_produksi' => $request->input('tahun_produksi'),
                'nomor_plat' => $request->input('nomor_plat'),
                'image' => $request->file('image')->getClientOriginalName(),
                'cabang_id' => $request->input('cabang')
            ]);

            if ($kendaraan) {
                return redirect()->route('kendaraan.index')->with('message', 'Kendaraan Berhasil Diupdate!');
            } else {
                return redirect()->route('kendaraan.create')->with('error', 'Terjadi Kesalahan Saat Mengupdate Kendaraan!');
            }
            dd($kendaraan);
        } else {
            $kendaraan->update([
                'merek' => $request->input('merek'),
                'model' => $request->input('model'),
                'tahun_produksi' => $request->input('tahun_produksi'),
                'nomor_plat' => $request->input('nomor_plat'),
                'cabang_id' => $request->input('cabang')
            ]);

            if ($kendaraan) {
                return redirect()->route('kendaraan.index')->with('message', 'Kendaraan Berhasil Diupdate!');
            } else {
                return redirect()->route('kendaraan.create')->with('error', 'Terjadi Kesalahan Saat Mengupdate Kendaraan!');
            }
        }
    }

    public function destroy(AdminKendaraan $kendaraan)
    {
        $imagePath = 'assets/images/kendaraan/' . $kendaraan->image;
        unlink($imagePath);
        $kendaraan->delete();
        if ($kendaraan) {
            return redirect()->route('kendaraan.index')->with('message', 'Kendaraan Berhasil Dihapus!');
        } else {
            return redirect()->route('kendaraan.create')->with('error', 'Terjadi Kesalahan Saat Menghapus Kendaraan!');
        }
    }
}
