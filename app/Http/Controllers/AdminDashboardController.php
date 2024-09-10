<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Model Feedback

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $facilityRatings = Feedback::selectRaw('facility_rating, COUNT(*) as count')
                                    ->groupBy('facility_rating')
                                    ->pluck('count', 'facility_rating')
                                    ->toArray();
        $staffRatings = Feedback::selectRaw('staff_rating, COUNT(*) as count')
                                ->groupBy('staff_rating')
                                ->pluck('count', 'staff_rating')
                                ->toArray();
        $processRatings = Feedback::selectRaw('process_rating, COUNT(*) as count')
                                  ->groupBy('process_rating')
                                  ->pluck('count', 'process_rating')
                                  ->toArray();

        // Hitung total untuk persentase
        $totalFacilityRatings = array_sum($facilityRatings);
        $totalStaffRatings = array_sum($staffRatings);
        $totalProcessRatings = array_sum($processRatings);

        // Hitung persentase
        $facilityPercentages = array_map(fn($count) => ($count / $totalFacilityRatings) * 100, $facilityRatings);
        $staffPercentages = array_map(fn($count) => ($count / $totalStaffRatings) * 100, $staffRatings);
        $processPercentages = array_map(fn($count) => ($count / $totalProcessRatings) * 100, $processRatings);

        // Mengirim data ke view
        return view('admin.dashboard', [
            'facilityRatings' => $facilityRatings,
            'staffRatings' => $staffRatings,
            'processRatings' => $processRatings,
            'facilityPercentages' => $facilityPercentages,
            'staffPercentages' => $staffPercentages,
            'processPercentages' => $processPercentages,
            'feedbacks' => Feedback::all()
        ]);
    }
}
