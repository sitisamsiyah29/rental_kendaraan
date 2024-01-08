<?php

namespace App\Http\Controllers;

use App\Models\Admin\AdminKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $data['kendaraan'] = AdminKendaraan::where('status', 1)->get();
        return view('page.kendaraan', $data);
    }
}
