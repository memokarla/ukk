<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Group rute yang memerlukan autentikasi dan role 'siswa'
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:siswa', // Ini akan mengirimkan 'siswa' sebagai parameter ke middleware
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dataPkl', App\Livewire\Pkl\Index::class)->name('pkl');
    Route::get('/tambahDataPkl', App\Livewire\Pkl\Create::class)->name('pklCreate');
});
