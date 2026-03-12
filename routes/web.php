<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\User;

// Home page
Route::get('/', function () {
    return inertia('Home/index', ['auth_user' => Auth::user()]);
});


// ================= LOGIN =================

// Login page
Route::get('/login', function () {
    return inertia('Auth/Login');
})->name('login');


// Login POST
Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'email' => 'Credentials do not match'
    ]);

})->name('login.submit');


// ================= REGISTER =================

// Register page
Route::get('/register', function () {
    return inertia('Auth/Register');
})->name('register');

Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'terms' => 'accepted'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'usertype' => 'user',   // default value
        'phone' => null          // if column not nullable, give default
    ]);

    Auth::login($user);

    return redirect('/home');

})->name('register.submit');
// ================= LOGOUT =================

Route::post('/logout', function (Request $request){

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');

})->name('logout');


// ================= DASHBOARD =================

Route::get('/home', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('home');