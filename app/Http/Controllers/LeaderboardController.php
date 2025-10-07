<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('xp', 'desc')
            ->take(10)
            ->get()
            ->map(function ($user) {
                $totalCorrect = 0;
                $categories = ['art', 'geography', 'history', 'science', 'sports'];

                foreach ($categories as $category) {
                    [$correct] = explode('/', $user->$category);
                    $totalCorrect += (int) $correct;
                }

                $user->total_correct = $totalCorrect;
                return $user;
            });

        return view('leaderboard', compact('users'));
    }
}
