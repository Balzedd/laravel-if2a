<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});
Route::resource('/fakultas', FakultasController::class);

Route::resource('/periodes', PeriodeController::class);

Route::get('/prodi', [ProdiController::class, 'index']);
