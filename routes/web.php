<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', [AdminDashboardController::class, 'index'])
                ->name('dashboard');

            Route::resource('staff', StaffController::class);

            Route::resource('tasks', TaskController::class);
        });

    /*
    |--------------------------------------------------------------------------
    | Staff Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:staff')
        ->prefix('staff')
        ->name('staff.')
        ->group(function () {

            Route::get('/dashboard', [StaffDashboardController::class, 'index'])
                ->name('dashboard');

            Route::get('/tasks/{task}', [StaffDashboardController::class, 'show'])
                ->name('tasks.show');

            Route::put('/tasks/{task}/status', [StaffDashboardController::class, 'updateStatus'])
                ->name('tasks.update-status');
        });
});