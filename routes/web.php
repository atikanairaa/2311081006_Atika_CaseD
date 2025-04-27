<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pendaftaran', [KelasController::class,'index'])-> name('pendaftaran.index'); 
Route::get('pendaftaran/create', [KelasController::class,'create'])-> name('pendaftaran.create'); 
Route::post('pendaftaran', [KelasController::class,'store'])-> name('pendaftaran.store'); 
Route::get('pendaftaran/{id}/edit', [KelasController::class,'edit'])-> name('pendaftaran.edit'); 
Route::put('pendaftaran/{id}', [KelasController::class,'update'])-> name('pendaftaran.update'); 
Route::delete('pendaftaran/{id}', [KelasController::class,'destroy'])-> name('pendaftaran.destroy'); 

Route::prefix('pendaftaran')->group(function () {
    Route::get('trash', [KelasController::class, 'trash'])->name('pendaftaran.trash');
    Route::post('{id}/restore', [KelasController::class, 'restore'])->name('pendaftaran.restore');
    Route::post('{id}/forceDelete', [KelasController::class, 'forceDelete'])->name('pendaftaran.forceDelete');
});