@extends('app')

@section('title', 'Home | QuizMaster Pro')

@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Navigation -->
    <div class="flex justify-between items-center mb-16">
        <div class="text-2xl font-bold flex items-center">
            <i data-feather="award" class="mr-2 w-8 h-8"></i>
            QuizMaster Pro
        </div>
        <div class="flex space-x-4">
            @auth
                <a href="{{ route('profile') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
                    <i data-feather="user" class="mr-2 w-5 h-5"></i> {{ auth()->user()->username }}
                </a>
                <a href="{{ route('leaderboard') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
                    <i data-feather="bar-chart-2" class="mr-2 w-5 h-5"></i> Leaderboard
                </a>
                <a href="{{ route('logout') }}" 
                   class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center bg-red-500 bg-opacity-20"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i data-feather="log-out" class="mr-2 w-5 h-5"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
                    <i data-feather="log-in" class="mr-2 w-5 h-5"></i> Login
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
                    <i data-feather="user-plus" class="mr-2 w-5 h-5"></i> Register
                </a>
            @endauth
        </div>
    </div>

    <!-- Hero Section -->
    <div class="text-center mt-20">
        <div class="mb-8">
            @if(file_exists(public_path('images/mister_quiz.png')))
                <img src="{{ asset('images/mister_quiz.png') }}" alt="QuizMaster Pro" class="mx-auto mb-6" style="max-width: 200px;">
            @else
                <div class="flex items-center justify-center mb-6">
                    <i data-feather="award" class="w-24 h-24 text-blue-300"></i>
                </div>
            @endif
        </div>

        <h1 class="text-5xl md:text-7xl font-bold mb-6">Test Your Knowledge</h1>
        <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto opacity-90">
            Challenge yourself with our curated quizzes across various categories. 
            Climb the leaderboard and become the ultimate QuizMaster!
        </p>
        
        <div class="flex flex-col md:flex-row justify-center gap-6 mt-8">
            <a href="{{ route('quiz') }}" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 rounded-full text-xl font-semibold btn-hover-effect flex items-center justify-center">
                <i data-feather="play" class="mr-2 w-6 h-6"></i> Start Quiz
            </a>
            <a href="{{ route('leaderboard') }}" class="px-8 py-4 bg-purple-600 hover:bg-purple-700 rounded-full text-xl font-semibold btn-hover-effect flex items-center justify-center">
                <i data-feather="bar-chart-2" class="mr-2 w-6 h-6"></i> Leaderboard
            </a>
        </div>
    </div>

    <!-- Categories -->
    <div class="mt-32">
        <h2 class="text-3xl font-bold mb-8 text-center">Explore Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <div class="glass-card p-6 rounded-xl text-center hover:scale-105 transition-transform cursor-pointer">
                <i data-feather="palette" class="w-12 h-12 mx-auto mb-4 text-yellow-400"></i>
                <h3 class="text-xl font-semibold">Art</h3>
            </div>
            <div class="glass-card p-6 rounded-xl text-center hover:scale-105 transition-transform cursor-pointer">
                <i data-feather="book" class="w-12 h-12 mx-auto mb-4 text-red-400"></i>
                <h3 class="text-xl font-semibold">History</h3>
            </div>
            <div class="glass-card p-6 rounded-xl text-center hover:scale-105 transition-transform cursor-pointer">
                <i data-feather="globe" class="w-12 h-12 mx-auto mb-4 text-green-400"></i>
                <h3 class="text-xl font-semibold">Geography</h3>
            </div>
            <div class="glass-card p-6 rounded-xl text-center hover:scale-105 transition-transform cursor-pointer">
                <i data-feather="cpu" class="w-12 h-12 mx-auto mb-4 text-blue-400"></i>
                <h3 class="text-xl font-semibold">Science</h3>
            </div>
            <div class="glass-card p-6 rounded-xl text-center hover:scale-105 transition-transform cursor-pointer">
                <i data-feather="activity" class="w-12 h-12 mx-auto mb-4 text-orange-400"></i>
                <h3 class="text-xl font-semibold">Sports</h3>
            </div>
        </div>
    </div>
</div>

@endsection