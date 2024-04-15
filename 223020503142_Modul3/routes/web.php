<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pegawais', \App\Http\Controllers\PegawaiController::class);


// Route::get('/karyawan', [KaryawanController::class, 'index']);
// Route::get('/karyawan/create', [KaryawanController::class, 'create']);
// Route::post('/karyawan', [KaryawanController::class, 'store']);
// Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
// Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
// Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
