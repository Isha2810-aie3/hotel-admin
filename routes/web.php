<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;



Route::get('/', fn() => redirect('/login'));


// show login page
Route::get('/login', fn() => view('login'))->name('login');

// handle fake login (frontend-only). credentials: admin@example.com / password
Route::post('/login', function(Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'admin@example.com' && $password === 'password') {
        $request->session()->put('admin', true);
        return redirect('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials (use admin@example.com / password)']);
});

// logout
Route::get('/logout', function (Request $request) {
    $request->session()->forget('admin');
    return redirect('/login');
})->name('logout');

// protected pages (simple session check)
Route::get('/dashboard', function () {
    if (!session('admin')) return redirect('/login');
    return view('dashboard');
});

Route::get('/rooms', function () {
    if (!session('admin')) return redirect('/login');
    return view('rooms');
});

Route::view('/rooms', 'rooms');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::patch('/rooms/{room}/status', [RoomController::class, 'updateStatus'])->name('rooms.updateStatus');

Route::get('/bookings', function () {
    if (!session('admin')) return redirect('/login');
    return view('bookings');
});
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/users', function () {
    if (!session('admin')) return redirect('/login');
    return view('users');
});
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/services', function () {
    if (!session('admin')) return redirect('/login');
    return view('services');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');


Route::get('/payments', function () {
    if (!session('admin')) return redirect('/login');
    return view('payments');
});

Route::get('/reports', function () {
    if (!session('admin')) return redirect('/login');
    return view('reports');
});
