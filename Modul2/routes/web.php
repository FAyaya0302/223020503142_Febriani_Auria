<?php

use App\Http\Controllers\Modul2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('modul2');
});

Route::get('/tugas-mod2', [Modul2Controller::class, 'index'])->name('modul2');
Route::post('/login', [Modul2Controller::class, 'login'])->name('login');