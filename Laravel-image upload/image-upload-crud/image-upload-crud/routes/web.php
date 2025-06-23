<?php

use App\Http\Controllers\ImageController;

Route::get('/', [ImageController::class, 'gallery']); // Public display

Route::get('/admin/upload', [ImageController::class, 'create'])->name('admin.upload'); // Admin upload page
Route::post('/admin/upload', [ImageController::class, 'store'])->name('admin.store');  // Handle image upload

Route::get('/admin/view', [ImageController::class, 'adminView'])->name('admin.view'); // Admin view page

Route::get('/admin/edit/{image}', [ImageController::class, 'edit'])->name('admin.edit'); // Show edit form
Route::post('/admin/update/{image}', [ImageController::class, 'update'])->name('admin.update'); // Handle update request

Route::delete('/admin/delete/{image}', [ImageController::class, 'destroy'])->name('admin.delete'); // Delete image
