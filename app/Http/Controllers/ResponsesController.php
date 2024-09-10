<?php

namespace App\Http\Controllers;

use App\Models\Feedback; // Pastikan untuk menggunakan model Feedback
use Illuminate\Http\Request;

class ResponsesController extends Controller
{
    public function index() {
        $allFeedbacks = Feedback::all(); // Mengambil semua data feedback
        return view('responses', compact('allFeedbacks'));
    }
}
