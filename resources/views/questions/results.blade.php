@extends('app')

@section('title', 'Quiz Results | QuizMaster Pro')

@section('content')

<div class="container mx-auto px-4 py-12">
    <!-- Navigation Header -->
    <div class="flex justify-between items-center mb-12">
        <a href="{{ route('profile') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
            <i data-feather="user" class="mr-2 w-5 h-5"></i> {{ auth()->user()->username }}
        </a>
        <a href="{{ route('home') }}" class="px-6 py-3 rounded-full btn-hover-effect glass-card flex items-center">
            <i data-feather="home" class="mr-2 w-5 h-5"></i> Home
        </a>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Overall Score -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-6">
                @if($results['overall'] >= 16)
                    <div class="text-8xl">🏆</div>
                @elseif($results['overall'] >= 12)
                    <div class="text-8xl">🎉</div>
                @elseif($results['overall'] >= 8)
                    <div class="text-8xl">👍</div>
                @else
                    <div class="text-8xl">📚</div>
                @endif
            </div>
            
            <h1 class="text-3xl md:text-4xl font-bold mb-4">
                @if($results['overall'] >= 16)
                    Excellent Work!
                @elseif($results['overall'] >= 12)
                    Great Job!
                @elseif($results['overall'] >= 8)
                    Good Effort!
                @else
                    Keep Practicing!
                @endif
            </h1>
            
            <p class="text-xl opacity-80 mb-8">Your final score</p>
            
            <div class="glass-card inline-block px-12 py-8 rounded-3xl">
                <div class="text-7xl md:text-8xl font-bold mb-2">
                    {{ $results['overall'] }}<span class="text-5xl opacity-60"> / 20</span>
                </div>
                <div class="text-2xl opacity-70">
                    {{ round(($results['overall'] / 20) * 100) }}% Correct
                </div>
            </div>
        </div>

        <!-- Category Breakdown -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8">Category Breakdown</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Art -->
                <div class="glass-card p-6 text-center hover:scale-105 transition-transform">
                    <i data-feather="palette" class="w-12 h-12 mx-auto mb-4 text-yellow-400"></i>
                    <h3 class="text-xl font-semibold mb-3">Art</h3>
                    <div class="text-4xl font-bold mb-2">{{ $results['art'] }}</div>
                    <div class="text-sm opacity-70">out of 4</div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ ($results['art'] / 4) * 100 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Geography -->
                <div class="glass-card p-6 text-center hover:scale-105 transition-transform">
                    <i data-feather="globe" class="w-12 h-12 mx-auto mb-4 text-green-400"></i>
                    <h3 class="text-xl font-semibold mb-3">Geography</h3>
                    <div class="text-4xl font-bold mb-2">{{ $results['geography'] }}</div>
                    <div class="text-sm opacity-70">out of 4</div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-green-400 h-2 rounded-full" style="width: {{ ($results['geography'] / 4) * 100 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- History -->
                <div class="glass-card p-6 text-center hover:scale-105 transition-transform">
                    <i data-feather="book" class="w-12 h-12 mx-auto mb-4 text-red-400"></i>
                    <h3 class="text-xl font-semibold mb-3">History</h3>
                    <div class="text-4xl font-bold mb-2">{{ $results['history'] }}</div>
                    <div class="text-sm opacity-70">out of 4</div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-red-400 h-2 rounded-full" style="width: {{ ($results['history'] / 4) * 100 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Science -->
                <div class="glass-card p-6 text-center hover:scale-105 transition-transform">
                    <i data-feather="cpu" class="w-12 h-12 mx-auto mb-4 text-blue-400"></i>
                    <h3 class="text-xl font-semibold mb-3">Science</h3>
                    <div class="text-4xl font-bold mb-2">{{ $results['science'] }}</div>
                    <div class="text-sm opacity-70">out of 4</div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-400 h-2 rounded-full" style="width: {{ ($results['science'] / 4) * 100 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Sports -->
                <div class="glass-card p-6 text-center hover:scale-105 transition-transform">
                    <i data-feather="activity" class="w-12 h-12 mx-auto mb-4 text-orange-400"></i>
                    <h3 class="text-xl font-semibold mb-3">Sports</h3>
                    <div class="text-4xl font-bold mb-2">{{ $results['sports'] }}</div>
                    <div class="text-sm opacity-70">out of 4</div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: {{ ($results['sports'] / 4) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-6 mt-12">
            <a href="{{ route('quiz') }}" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 rounded-full text-xl font-semibold btn-hover-effect flex items-center justify-center">
                <i data-feather="refresh-cw" class="mr-2 w-6 h-6"></i> Take Another Quiz
            </a>
            <a href="{{ route('leaderboard') }}" class="px-8 py-4 bg-purple-600 hover:bg-purple-700 rounded-full text-xl font-semibold btn-hover-effect flex items-center justify-center">
                <i data-feather="bar-chart-2" class="mr-2 w-6 h-6"></i> View Leaderboard
            </a>
        </div>
    </div>
</div>

@endsection