<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Calculate rank
        $rank = match (true) {
            $user->xp < 1500 => 'Quiz Apprentice',
            $user->xp < 5000 => 'Average Quizer',
            $user->xp < 10000 => 'Epic Quizer',
            default => 'Quiz Master'
        };

        // Parse category scores
        $categories = ['art', 'geography', 'history', 'science', 'sports'];
        $stats = [];

        foreach ($categories as $category) {
            [$correct, $total] = explode('/', $user->$category);
            $percentage = $total > 0 ? round(($correct / $total) * 100, 1) : 0;
            $stats[$category] = [
                'correct' => $correct,
                'total' => $total,
                'percentage' => $percentage
            ];
        }

        return view('profile', compact('user', 'rank', 'stats'));
    }
}
