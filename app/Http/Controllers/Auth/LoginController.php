<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        // Redirect already authenticated users
        if (Auth::check()) {
            return redirect()->route('home');
        }
        
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication successful
            $request->session()->regenerate();
            
            // Redirect to intended page or home
            return redirect()->intended(route('home'));
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}