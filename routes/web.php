<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\mataKuliahController;
use App\Http\Controllers\pengampuhController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\ruangController;
use App\Http\Controllers\semesterController;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [AuthController::class, 'login']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });
    
    Route::get('/dosen', function () {
        return view('pages.dosen');
    });
    
    Route::get('/kelas', function () {
        return view('pages.kelas');
    });
    
    Route::get('/ruang', function () {
        return view('pages.ruang');
    });
    
    Route::get('/prodi', function () {
        return view('pages.prodi');
    });
    
    Route::get('/semester', function () {
        return view('pages.semester');
    });
    
    Route::get('/matakuliah', function () {
        return view('pages.mataKuliah');
    });
    
    Route::get('/jadwal', function () {
        return view('pages.jadwal');
    });

    Route::get('/pengampuh', function () {
        return view('pages.pengampu');
    });

    Route::prefix('v1')->group(function () {
        Route::prefix('dashboard')->controller(DashboardController::class)->group(function () {
            Route::get('/count-jadwal', 'countJadwal');
        });
        Route::prefix('dosen')->controller(DosenController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        Route::prefix('kelas')->controller(kelasController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        Route::prefix('ruang')->controller(ruangController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        Route::prefix('prodi')->controller(prodiController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
    
        Route::prefix('semester')->controller(semesterController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
    
        Route::prefix('mata-kuliah')->controller(mataKuliahController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
    
        Route::prefix('jadwal')->controller(jadwalController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        
        Route::prefix('pengampuh')->controller(pengampuhController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::post('logout', [AuthController::class, 'logout']);
    });
});


