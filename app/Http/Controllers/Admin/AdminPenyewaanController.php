<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminKendaraan;
use App\Models\Admin\AdminPenyewaan;
use Illuminate\Http\Request;

class AdminPenyewaanController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Penyewaan Kendaraan';
        $data['penyewaan'] = AdminPenyewaan::where('status', 0)->get();
        return view('admin.penyewaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AdminPenyewaan $penyewaan)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminPenyewaan $penyewaan)
    {
        $penyewaan = AdminPenyewaan::findOrFail($penyewaan->id);
        if ($request->input('status') == '1') {
            $kendaraan = AdminKendaraan::where('id', $penyewaan->kendaraan_id)->get()->first();
            $kendaraan->update([
                'status' => 0
            ]);
            $penyewaan->update([
                'status' => 1
            ]);

            if ($penyewaan && $kendaraan) {
                return redirect()->route('penyewaan.index')->with('message', 'Berhasil Menerima Pesanan!');
            }
        } else {
            $penyewaan->update([
                'status' => 2
            ]);

            if ($penyewaan) {
                return redirect()->route('penyewaan.index')->with('message', 'Berhasil Menolak Pesanan!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function berjalan()
    {
        $data['header_title'] = 'Penyewaan Sedang Berjalan';
        $data['penyewaan'] = AdminPenyewaan::where('status', 1)->get();
        return view('admin.penyewaan.berjalan', $data);
    }

    public function riwayat()
    {
        $data['header_title'] = 'Penyewaan Sedang Berjalan';
        $data['penyewaan'] = AdminPenyewaan::all();
        return view('admin.penyewaan.riwayat', $data);
    }

    public function selesaikan($id)
    {
        $penyewaan = AdminPenyewaan::findOrFail($id);
        $kendaraan = AdminKendaraan::where('id', $penyewaan->kendaraan_id)->get()->first();
        $kendaraan->update([
            'status' => 1
        ]);
        $penyewaan->update([
            'status' => 3
        ]);

        if ($penyewaan && $kendaraan) {
            return redirect()->route('penyewaan.index')->with('message', 'Berhasil Menyelewakan Kendaraan Sewaan!');
        }
    }
}
