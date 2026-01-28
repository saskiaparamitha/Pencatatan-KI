<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard'); // Pastikan file resources/views/dashboard.blade.php ada
    }

    public function adminIndex() {
        return view('admin.dashboard'); // Pastikan file resources/views/admin/dashboard.blade.php ada
    }
}
