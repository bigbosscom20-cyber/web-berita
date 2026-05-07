<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman welcome
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
})->name('welcome');

// Route dashboard yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
    
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

// ==================== ROUTE AUTHENTICATION MANUAL ====================

// Route Login - Menggunakan Blade Template
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
})->name('login');

// Route POST Login
Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended(route('home'));
    }
    
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
});

// Route register (opsional)
Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.register');
})->name('register');

// Route proses register
Route::post('/register', function () {
    $validator = validator(request()->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);
    
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    
    $user = \App\Models\User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
    ]);
    
    Auth::login($user);
    
    return redirect()->route('home');
})->name('register');