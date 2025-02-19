<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\mataKuliahController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\ruangController;
use App\Http\Controllers\semesterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});