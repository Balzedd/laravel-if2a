<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});
Route::resource('/Fakultas', FakultasController::class);

Route::resource('/periodes', PeriodeController::class);
