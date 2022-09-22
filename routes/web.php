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
    return redirect('/login');
});

// Register
Route::get('register', function (){
    return view('accounts.register');
});
Route::post('/simpanData', [accountController::class, 'simpanData']);

Route::middleware(['auth', 'roleaccess'])->group(function(){
    Route::get('/', function (){
        return view('pages.dashboard');
    });
    // Route::get('/superior', function (){
    //     return view('pages.superior');
    // });
    Route::get('/superior', [tamuController::class, 'index']);
    Route::get('/deluxe', [tamuController::class, 'index2']);
    Route::get('/profile', function (){
        return view('pages.profile');
    });
    Route::put('/ubahData', [accountController::class, 'ubahData']);
    Route::get('/reservation', [resepsionisController::class, 'reservation']);
    Route::get('/formPesan/{id}', [tamuController::class, 'formPesan']);
    Route::post('/pesan', [tamuController::class, 'pesan']);
    Route::get('/tampilan', function (){
        return view('pages.tambahKamar');
    });
    
});
Route::post('/ubahKamar/{id}', [adminController::class, 'ubahKamar']);
Route::post('/tambahKamar', [adminController::class, 'tambahKamar']);
Route::get('/search', [resepsionisController::class, 'search']);
