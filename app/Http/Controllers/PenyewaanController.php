<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyewaanController extends Controller
{
    public function index()
    {
        $data['penyewaan'] = Penyewaan::where('pengguna_id', auth()->id())->get();
        return view('page.sewaan-saya', $data);
    }
    public function pesan($id)
    {
        $kendaraan = DB::table('kendaraan')->where('id', $id)->get()->first();
        $penyewaan = Penyewaan::create([
            'pengguna_id' => auth()->id(),
            'kendaraan_id' => $id,
            'status' => 0
        ]);

        if ($penyewaan) {
            return redirect('/')->with('message', 'Berhasil Memesan Kendaraan, Silahkan Tunggu Verifikasi Dari Admin!');
        } else {
            return redirect('/')->with('error', 'Terjadi Kesalahan Saat Memesan Kendaraan!');
        }
    }
}