@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div>
    <div>
        <p class="title form-header">Login form</p>
    </div>

    @if (session('status'))
        <div class="center error-msg mt2">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb4">
            <input class="auth-input center @error('email') error @enderror" 
                   type="email" 
                   name="email" 
                   id="email" 
                   placeholder="Enter email" 
                   value="{{ old('email') }}"
                   required>

            @error('email')
            <div class="center error-msg mt2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <input class="auth-input center @error('password') error @enderror" 
                   type="password" 
                   name="password" 
                   id="password" 
                   placeholder="Enter password"
                   required>

            @error('password')
            <div class="center error-msg mt2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <label class="center checkbox-label">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>Remember me</span>
            </label>
        </div>

        <button class="center green-btn mb4" style="cursor: pointer;" type="submit">Login</button>
        
        <a class="center simple-link mt2" href="{{ route('register') }}">Don't have an account? Register</a>
    </form>
</div>

@endsection