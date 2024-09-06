<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', [ClassController::class, 'index'])->name('home');
Route::post('/create-class', [ClassController::class, 'createClass'])->name('create.class');
Route::post('/join-class', [ClassController::class, 'joinClass'])->name('join.class');