<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function dashboard()
    {
        $feedbacks = Feedback::all();
        return view('admin.dashboard', compact('feedbacks'));
    }

    public function questions()
    {
        // logic untuk questions
        return view('admin.questions');
    }

    public function responses()
    {
        $feedbacks = Feedback::all();
        return view('admin.responses', compact('feedbacks'));
    }

    public function detailResponse($id)
    {
        $feedback = Feedback::find($id);
        return view('admin.detail_response', compact('feedback'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}

