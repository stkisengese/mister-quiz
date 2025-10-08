@extends('app')

@section('title', 'Profile | QuizMaster Pro')

@section('content')

<div class="container mx-auto px-4 py-12">
    <!-- Navigation Header -->
    <div class="flex justify-between items-center mb-12">
        <div class="text-2xl font-bold flex items-center">
            <i data-feather="award" class="mr-2 w-8 h-8"></i>
            QuizMaster Pro
        </div>
        <a href="{{ route('home') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
            <i data-feather="arrow-left" class="mr-2 w-5 h-5"></i> Back to Home
        </a>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Profile Header -->
        <div class="glass-card p-8 mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <div class="flex-shrink-0">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <i data-feather="user" class="w-12 h-12"></i>
                    </div>
                </div>
                <div class="flex-grow text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $user->username }}</h1>
                    <p class="text-xl text-blue-300 mb-4">{{ $user->email }}</p>
                    <div class="flex flex-col sm:flex-row gap-6 items-center md:items-start justify-center md:justify-start">
                        <div class="glass-card px-6 py-3 rounded-full">
                            <div class="flex items-center">
                                <i data-feather="zap" class="w-5 h-5 mr-2 text-yellow-400"></i>
                                <span class="text-2xl font-bold">{{ $user->xp }}</span>
                                <span class="ml-2 opacity-70">XP</span>
                            </div>
                        </div>
                        <div class="glass-card px-6 py-3 rounded-full">
                            <div class="flex items-center">
                                <i data-feather="award" class="w-5 h-5 mr-2 text-purple-400"></i>
                                <span class="text-2xl font-bold">{{ $rank }}</span>
                                <span class="ml-2 opacity-70">Rank</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Stats -->
        <div class="glass-card p-8">
            <div class="flex items-center mb-6">
                <i data-feather="bar-chart" class="w-8 h-8 mr-3 text-green-400"></i>
                <h2 class="text-3xl font-bold">Category Statistics</h2>
            </div>

            @if(isset($stats) && count($stats) > 0)
                <div class="overflow-x-auto">
                    <table class="leaderboard-table">
                        <thead>
                            <tr>
                                <th class="rounded-tl-lg">
                                    <div class="flex items-center">
                                        <i data-feather="folder" class="w-4 h-4 mr-2"></i> Category
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> Correct/Total
                                    </div>
                                </th>
                                <th class="rounded-tr-lg">
                                    <div class="flex items-center">
                                        <i data-feather="percent" class="w-4 h-4 mr-2"></i> Success Rate
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats as $category => $stat)
                            <tr>
                                <td class="font-semibold">
                                    <div class="flex items-center">
                                        @switch($category)
                                            @case('art')
                                                <i data-feather="palette" class="w-5 h-5 mr-2 text-yellow-400"></i>
                                                @break
                                            @case('history')
                                                <i data-feather="book" class="w-5 h-5 mr-2 text-red-400"></i>
                                                @break
                                            @case('geography')
                                                <i data-feather="globe" class="w-5 h-5 mr-2 text-green-400"></i>
                                                @break
                                            @case('science')
                                                <i data-feather="cpu" class="w-5 h-5 mr-2 text-blue-400"></i>
                                                @break
                                            @case('sports')
                                                <i data-feather="activity" class="w-5 h-5 mr-2 text-orange-400"></i>
                                                @break
                                        @endswitch
                                        {{ ucfirst($category) }}
                                    </div>
                                </td>
                                <td class="text-blue-300 font-bold">
                                    {{ $stat['correct'] }} / {{ $stat['total'] }}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <div class="flex-grow mr-3">
                                            <div class="w-full bg-gray-700 rounded-full h-2">
                                                <div class="bg-gradient-to-r from-green-400 to-blue-500 h-2 rounded-full" style="width: {{ $stat['percentage'] }}%"></div>
                                            </div>
                                        </div>
                                        <span class="font-bold text-green-300">{{ $stat['percentage'] }}%</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <i data-feather="inbox" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                    <p class="text-xl opacity-70">No quiz data yet. Start a quiz to see your stats!</p>
                    <a href="{{ route('quiz') }}" class="mt-6 inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium btn-hover-effect">
                        <i data-feather="play" class="mr-2 w-5 h-5"></i> Start Your First Quiz
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection