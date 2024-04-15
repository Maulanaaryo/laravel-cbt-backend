<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UjianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Register Route API
Route::post('/register', [AuthController::class, 'register']);

// Login Route API
Route::post('/login', [AuthController::class, 'login']);

// Logout Route API
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Create Ujian Route API
Route::post('/create-ujian', [UjianController::class, 'createUjian'])->middleware('auth:sanctum');

// Get Soal Ujian Route API
Route::get('/get-soal-ujian', [UjianController::class, 'getListSoalByKategori'])->middleware('auth:sanctum');

// Post Jawaban Route API
Route::post('/answers', [UjianController::class, 'jawabSoal'])->middleware('auth:sanctum');

// Get Hasil Ujian Route API
Route::get('/get-nilai', [UjianController::class, 'hitungNilaiUjianByKategori'])->middleware('auth:sanctum');

// Get Content Route API
Route::apiResource('contents', \App\Http\Controllers\Api\ContentController::class)->middleware('auth:sanctum');

// Get Materi Route API
Route::apiResource('materis', \App\Http\Controllers\Api\MateriController::class)->middleware('auth:sanctum');
