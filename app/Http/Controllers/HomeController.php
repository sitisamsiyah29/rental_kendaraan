<?php

namespace App\Http\Controllers;

use App\Models\Admin\AdminKendaraan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['kendaraan'] = AdminKendaraan::where('status', 1)->latest('created_at')
            ->take(4)->get();
        return view('page.home', $data);
    }
}
