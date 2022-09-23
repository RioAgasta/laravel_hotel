<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
use App\Http\Controllers\tamuController;
use App\Http\Controllers\resepsionisController;
use App\Http\Controllers\adminController;

// Login
Route::get('/login', [accountController::class,'halamanLogin'])->name('login');
Route::post('/log', [accountController::class,'login']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('login');
});

// Register
Route::get('register', function (){
    return view('accounts.register');
});
Route::post('/simpanData', [accountController::class, 'simpanData']);

Route::middleware(['auth', 'roleaccess'])->group(function(){
    // General
    Route::get('/', function (){
        return view('pages.dashboard');
    });
    Route::get('/profile', function (){
        return view('pages.profile');
    });
    Route::get('/kamar', [tamuController::class, 'index']);
    Route::put('/ubahData', [accountController::class, 'ubahData']);

    // Tamu
    Route::get('/formPesan/{id}', [tamuController::class, 'formPesan']);
    Route::get('/invoice', [tamuController::class, 'invoice']);
    Route::post('/pesan', [tamuController::class, 'pesan']);

    // Admin
    Route::get('/tambahKamarForm', [adminController::class, 'tambahKamarForm']);
    Route::get('/ubahKamarForm/{id}', [adminController::class, 'ubahKamarForm']);
    Route::post('/tambahKamar', [adminController::class, 'tambahKamar']);
    Route::put('/ubahKamar/{id}', [adminController::class, 'ubahKamar']);
    Route::delete('/hapusKamar/{id}', [adminController::class, 'hapusKamar'])->name('hapus');

    // Resepsionis
    Route::get('/reservation', [resepsionisController::class, 'reservation']);
    Route::get('/search', [resepsionisController::class, 'search']);
});

