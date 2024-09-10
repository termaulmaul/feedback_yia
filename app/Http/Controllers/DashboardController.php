<?php

namespace App\Http\Controllers;

use App\Models\Feedback; // Pastikan untuk menggunakan model Feedback
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $recentFeedbacks = Feedback::orderBy('id', 'asc')->limit(5)->get(); // Mengambil 5 data terbaru dari ID tertua
        return view('admin.dashboard', compact('recentFeedbacks'));
    }
}
