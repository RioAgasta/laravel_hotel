<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
use App\Http\Controllers\tamuController;
use App\Http\Controllers\resepsionisController;
use App\Http\Controllers\adminController;

// General
Route::get('/', function (){
    return view('pages.dashboard');
});
Route::get('/kamar', [tamuController::class, 'index']);

// Login
Route::get('/login', [accountController::class,'halamanLogin'])->name('login');
Route::post('/log', [accountController::class,'login']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('login');
});

// Register
Route::get('/register', function (){
    return view('accounts.register');
});
Route::post('/simpanData', [accountController::class, 'simpanData']);

Route::middleware(['auth', 'roleaccess'])->group(function(){
    // General
    Route::get('/profile', function (){
        return view('pages.profile');
    });
    Route::put('/ubahData', [accountController::class, 'ubahData']);
    Route::get('/setting', function (){
        return view('pages.setting');
    });

    // Tamu
    Route::get('/formPesan/{id}', [tamuController::class, 'formPesan']);
    Route::get('/invoice', [tamuController::class, 'invoice']);
    Route::post('/pesan/{id}', [tamuController::class, 'pesan']);

    // Admin
    Route::get('/tambahKamarForm', [adminController::class, 'tambahKamarForm']);
    Route::get('/ubahKamarForm/{id}', [adminController::class, 'ubahKamarForm']);
    Route::post('/tambahKamar', [adminController::class, 'tambahKamar']);
    Route::put('/ubahKamar/{id}', [adminController::class, 'ubahKamar']);
    Route::delete('/hapusKamar/{id}', [adminController::class, 'hapusKamar'])->name('hapus');

    // Resepsionis
    Route::get('/reservation', [resepsionisController::class, 'reservation']);
    Route::get('/search', [resepsionisController::class, 'search']);
    Route::get('/searchDate', [resepsionisController::class, 'searchDate']);
});

