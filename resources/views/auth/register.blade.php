@extends('app')

@section('title', 'Register | QuizMaster Pro')

@section('content')

<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="auth-card p-8 sm:p-12 w-full max-w-md">
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="inline-flex items-center text-sm mb-6 opacity-80 hover:opacity-100 transition">
            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i> Back to Home
        </a>

        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <i data-feather="user-plus" class="w-12 h-12 text-purple-300"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2">Create Account</h1>
            <p class="opacity-80">Join QuizMaster Pro and start learning</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium mb-2">Username</label>
                <div class="relative">
                    <input type="text" 
                           id="username" 
                           name="username"
                           value="{{ old('username') }}"
                           class="input-field @error('username') error-field @enderror w-full px-4 py-3 pr-12 rounded-lg text-white placeholder-gray-300" 
                           placeholder="Choose a username"
                           required>
                    <i data-feather="user" class="absolute right-3 top-3 text-gray-300 w-5 h-5"></i>
                </div>
                @error('username')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

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

            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirm Password</label>
                <div class="relative">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation"
                           class="input-field @error('password_confirmation') error-field @enderror w-full px-4 py-3 pr-12 rounded-lg text-white placeholder-gray-300" 
                           placeholder="••••••••"
                           required>
                    <i data-feather="check-circle" class="absolute right-3 top-3 text-gray-300 w-5 h-5"></i>
                </div>
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-purple-600 hover:bg-purple-700 rounded-lg font-medium flex items-center justify-center btn-hover-effect">
                <i data-feather="user-plus" class="mr-2 w-5 h-5"></i> Create Account
            </button>

            <div class="text-center text-sm mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-300 hover:text-blue-200 font-medium">Login here</a>
            </div>
        </form>
    </div>
</div>

@endsection