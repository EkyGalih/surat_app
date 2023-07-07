<?php

use App\Http\Controllers\Admin\SuratController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'surat'], function () {
    Route::get('/', [SuratController::class, 'index'])->name('surat-admin.index');
    Route::get('create', [SuratController::class, 'create'])->name('surat-admin.create');
    Route::post('store', [SuratController::class, 'store'])->name('surat-admin.store');
    Route::get('edit/{id}', [SuratController::class, 'edit'])->name('surat-admin.edit');
    Route::put('update/{id}', [SuratController::class, 'update'])->name('surat-admin.update');
    Route::get('destroy/{id}', [SuratController::class, 'destroy'])->name('surat-admin.destroy');
});
