<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB; // Menambahkan import untuk DB

class FeedbackController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        return view('home'); // pastikan view 'home' sudah ada
    }

    // Menampilkan halaman feedback dalam bahasa Indonesia
    public function showFeedbackID()
    {
        return view('feedback.id'); // pastikan view 'feedback/id.blade.php' sudah ada
    }

    // Menampilkan halaman feedback dalam bahasa Inggris
    public function showFeedbackEN()
    {
        return view('feedback.en'); // pastikan view 'feedback/en.blade.php' sudah ada
    }

    // Meng-handle form feedback
    public function submitFeedback(Request $request)
    {
        // Validasi input
        $request->validate([
            'facility_rating' => 'nullable|integer|min:1|max:5',
            'staff_rating' => 'nullable|integer|min:1|max:5',
            'process_rating' => 'nullable|integer|min:1|max:5',
            'suggestion' => 'nullable|string',
            'contact_info' => 'nullable|string',
        ]);

        // Simpan feedback ke database
        DB::table('feedbacks')->insert([ // Menggunakan DB yang sudah di-import
            'facility_rating' => $request->input('facility_rating'),
            'staff_rating' => $request->input('staff_rating'),
            'process_rating' => $request->input('process_rating'),
            'suggestion' => $request->input('suggestion'),
            'contact_info' => $request->input('contact_info'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
