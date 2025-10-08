@extends('app')

@section('title', 'Leaderboard | QuizMaster Pro')

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

    <!-- Leaderboard Content -->
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <i data-feather="trophy" class="w-16 h-16 text-yellow-400"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Leaderboard</h1>
            <p class="text-xl opacity-80">Top performers across all categories</p>
        </div>

        <div class="glass-card p-6 md:p-8">
            @if(isset($users) && count($users) > 0)
                <div class="overflow-x-auto">
                    <table class="leaderboard-table">
                        <thead>
                            <tr>
                                <th class="rounded-tl-lg">
                                    <div class="flex items-center">
                                        <i data-feather="hash" class="w-4 h-4 mr-2"></i> Rank
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Username
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <i data-feather="zap" class="w-4 h-4 mr-2"></i> XP
                                    </div>
                                </th>
                                <th class="rounded-tr-lg">
                                    <div class="flex items-center">
                                        <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> Total Correct
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr class="hover:bg-opacity-20">
                                <td>
                                    <div class="flex items-center">
                                        @if($index === 0)
                                            <span class="text-2xl">🥇</span>
                                        @elseif($index === 1)
                                            <span class="text-2xl">🥈</span>
                                        @elseif($index === 2)
                                            <span class="text-2xl">🥉</span>
                                        @else
                                            <span class="font-bold text-lg">{{ $index + 1 }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="font-semibold">
                                    {{ $user->username }}
                                    @if(auth()->check() && auth()->id() === $user->id)
                                        <span class="ml-2 text-xs bg-blue-500 bg-opacity-30 px-2 py-1 rounded">You</span>
                                    @endif
                                </td>
                                <td class="text-blue-300 font-bold">{{ $user->xp }}</td>
                                <td class="text-green-300 font-bold">{{ $user->total_correct }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <i data-feather="users" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                    <p class="text-xl opacity-70">No users found. Be the first to join!</p>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection