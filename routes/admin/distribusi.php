<?php

use App\Http\Controllers\Admin\DistribusiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'distribusi'], function () {
    Route::get('/', [DistribusiController::class, 'index'])->name('distribusi-admin.index');
    Route::get('create', [DistribusiController::class, 'create'])->name('distribusi-admin.create');
    Route::post('store', [DistribusiController::class, 'store'])->name('distribusi-admin.store');
    Route::get('edit/{id}', [DistribusiController::class, 'edit'])->name('distribusi-admin.edit');
    Route::put('update/{id}', [DistribusiController::class, 'update'])->name('distribusi-admin.update');
    Route::get('destroy/{id}', [DistribusiController::class, 'destroy'])->name('distribusi-admin.destroy');
});
