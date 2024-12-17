<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return Inertia::render('Landing/LandingView', [
            'feedback' => Feedback::with('user')  // Mengambil data feedback bersama dengan relasi user
                ->get()
                ->map(function ($feedback) {
                    return [
                        'feedback_id' => $feedback->feedback_id,
                        'feedback' => $feedback->feedback,
                        'name' => $feedback->user->name,  // Mengambil nama dari relasi user
                    ];
                })
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'feedback' => 'required|string|max:500',
        ]);
        
        
        Feedback::create([
            'feedback' => $validated['feedback'],
            'user_id' => Auth::id(),
        ]);

        return Redirect::route('feedback.index')->with('success', 'Feedback berhasil ditambahkan');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return Redirect::to('/')->with('success', 'feedback berhasil dihapus');
    }
}
