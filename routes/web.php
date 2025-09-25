<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

// Redirect "/" to "/vanvaso"
Route::get('/', function () {
    return redirect('/vanvaso');
});

// Home page at /vanvaso
Route::get('/vanvaso', function () {
    return view('home'); // make sure resources/views/home.blade.php exists
})->name('home');

// Login routes
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login.post');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

// Admin Dashboard
Route::get('/admin/dashboard', fn() => view('admin.dashboard'))
    ->name('admin.dashboard')->middleware('auth');

// User Home
Route::get('/user/home', fn() => view('user.home'))
    ->name('user.home')->middleware('auth');

// Fake login demo (testing only)
Route::get('/login', fn() => view('login'))->name('login.form');
Route::post('/login', function(Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'admin@example.com' && $password === 'password') {
        $request->session()->put('admin', true);
        return redirect('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials (use admin@example.com / password)']);
});



// Show the booking form
Route::get('/bookings/create', [BookingController::class, 'create'])
    ->name('bookings.create');

Route::get('/bookings/service', [BookingController::class, 'service'])
    ->name('bookings.service');

// Store the booking
Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');


Route::get('/payment', [BookingController::class, 'payment'])->name('payment.page');
Route::post('/payment', [BookingController::class, 'showPaymentPage'])->name('payment.page');



// Logout
Route::get('/logout', function (Request $request) {
    $request->session()->forget('admin');
    return redirect('/login');
})->name('logout');

// Protected pages
Route::get('/dashboard', fn() => session('admin') ? view('dashboard') : redirect('/login'));

// Rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::patch('/rooms/{room}/status', [RoomController::class, 'updateStatus'])->name('rooms.updateStatus');

// Bookings
Route::get('/bookings', fn() => session('admin') ? view('bookings') : redirect('/login'));
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');




// Users
Route::get('/users', fn() => session('admin') ? view('users') : redirect('/login'));
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

// Payments
Route::get('/payments', fn() => session('admin') ? view('payments') : redirect('/login'));
Route::get('/payment', function () {
    return view('payment'); // create resources/views/payment.blade.php
})->name('payment.page');

Route::get('/payment', function (Request $request) {
    // Get 'total' from query string, default to 0 if not provided
    $total = $request->query('total', 0);

    // Pass it to the Blade view
    return view('payment', compact('total'));
})->name('payment.page');


// Reports
Route::get('/reports', fn() => session('admin') ? view('reports') : redirect('/login'));

Route::get('/bookings', [BookingController::class, 'showAll'])->name('bookings.index');