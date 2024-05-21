<?php

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Search News
Route::get('/show/{search}', [NewsController::class, 'show']);

// Display All News
Route::get('/index', [NewsController::class, 'index']);

// Insert News
Route::post('/store', [NewsController::class, 'store']);

// Edit News
Route::post('/edit', [NewsController::class, 'edit']);

// Update News
Route::post('/update', [NewsController::class, 'update']);

// Delete News
Route::post('/destroy', [NewsController::class, 'destroy']);

// Upload Image
Route::post('/upload', [NewsController::class, 'upload']);
