<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

// Home page
Route::get('/', function () {
    return inertia('Home/index', ['auth_user' => Auth::user()]);
});

// Login/Register Blade
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Login POST
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate(['email' => 'required|email','password'=>'required']);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/home');
    }
    return back()->withErrors(['email'=>'Credentials do not match']);
})->name('login.submit');

// Logout
Route::post('/logout', function (\Illuminate\Http\Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Dashboard/Home for authenticated users
Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('home');

// Booking and Contact APIs
//Route::post('/book-room', [BookingController::class, 'store']);
//Route::post('/contact', [ContactController::class, 'store']);