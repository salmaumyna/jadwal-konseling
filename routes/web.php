<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Management\DashboardController as MgtDashboardController;
use App\Http\Controllers\ClassTeacher\DashboardController as CtDashboardController;
use App\Http\Controllers\TeacherOnDuty\DashboardController as ToDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman login dan logout
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    // Redirect berdasarkan level pengguna
    Route::get('/dashboard-redirect', function () {
        $levels = explode(',', auth()->user()->levels);
        switch ($levels[0]) {
            case 'admin':
                return redirect()->route('mgt.dashboard.index');
            case 'class-teachers':
                return redirect()->route('ct.dashboard.index');
            case 'teach-onduty':
                return redirect()->route('to.dashboard.index');
            default:
                return redirect()->route('login')->with('error', 'Level pengguna tidak dikenali.');
        }
    })->name('dashboard.index');

    Route::middleware('auth')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    });
    
    // Dashboard admin
    Route::name('mgt.')->prefix('managements')->group(function () {
        Route::get('dashboard', [MgtDashboardController::class, 'index'])->name('dashboard.index');
    });

    // Dashboard wali kelas
    Route::name('ct.')->prefix('class-teachers')->group(function () {
        Route::get('dashboard', [CtDashboardController::class, 'index'])->name('dashboard.index');
    });

    // Dashboard guru piket
    Route::name('to.')->prefix('teacher-onduty')->group(function () {
        Route::get('dashboard', [ToDashboardController::class, 'index'])->name('dashboard.index');
    });
});
