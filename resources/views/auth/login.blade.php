@extends('app')

@section('title', 'Login | QuizMaster Pro')

@section('content')

<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="auth-card p-8 sm:p-12 w-full max-w-md">
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="inline-flex items-center text-sm mb-6 opacity-80 hover:opacity-100 transition">
            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i> Back to Home
        </a>

        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <i data-feather="award" class="w-12 h-12 text-blue-300"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2">Welcome Back</h1>
            <p class="opacity-80">Login to continue your quiz journey</p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 bg-red-500 bg-opacity-20 border border-red-400 rounded-lg text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-2">Email</label>
                <div class="relative">
                    <input type="email" 
                           id="email" 
                           name="email"
                           value="{{ old('email') }}"
                           class="input-field @error('email') error-field @enderror w-full px-4 py-3 pr-12 rounded-lg text-white placeholder-gray-300" 
                           placeholder="your@email.com"
                           required>
                    <i data-feather="mail" class="absolute right-3 top-3 text-gray-300 w-5 h-5"></i>
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" 
                           id="password" 
                           name="password"
                           class="input-field @error('password') error-field @enderror w-full px-4 py-3 pr-12 rounded-lg text-white placeholder-gray-300" 
                           placeholder="••••••••"
                           required>
                    <i data-feather="lock" class="absolute right-3 top-3 text-gray-300 w-5 h-5"></i>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" 
                           name="remember" 
                           type="checkbox" 
                           {{ old('remember') ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="remember" class="ml-2 block text-sm">Remember me</label>
                </div>
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium flex items-center justify-center btn-hover-effect">
                <i data-feather="log-in" class="mr-2 w-5 h-5"></i> Login
            </button>

            <div class="text-center text-sm mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-300 hover:text-blue-200 font-medium">Register here</a>
            </div>
        </form>
    </div>
</div>

@endsection