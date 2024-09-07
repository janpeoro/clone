<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', [ClassController::class, 'index'])->name('home');
Route::post('/create-class', [ClassController::class, 'createClass'])->name('create.class');
Route::post('/join-class', [ClassController::class, 'joinClass'])->name('join.class');

Route::put('/classes/{id}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy'); // Add this line for delete
