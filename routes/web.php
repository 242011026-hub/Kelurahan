<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SuratController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/penduduk',[PendudukController::class, 'dataPenduduk']);
// Route::get('/surat', [PendudukController::class, 'daftarSurat']);

Route::resource('surat', SuratController::class);