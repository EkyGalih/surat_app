<?php

use App\Http\Controllers\Admin\BidangController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Bidang'], function () {
    Route::get('/', [BidangController::class, 'index'])->name('bidang-admin.index');
    Route::get('create', [BidangController::class, 'create'])->name('bidang-admin.create');
    Route::post('store', [BidangController::class, 'store'])->name('bidang-admin.store');
    Route::get('edit/{id}', [BidangController::class, 'edit'])->name('bidang-admin.edit');
    Route::put('update/{id}', [BidangController::class, 'update'])->name('bidang-admin.update');
    Route::get('destroy/{id}', [BidangController::class, 'destroy'])->name('bidang-admin.destroy');
});
