<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group and strictly protected.
|
*/

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Route
    // Menambahkan middleware 'role_or_permission' dari Spatie untuk keamanan ganda
    // Pastikan user punya role 'super-admin' ATAU permission 'view dashboard'
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['role_or_permission:super-admin|view dashboard'])
        ->name('dashboard');

    // Route lain untuk admin bisa ditambahkan di sini...
    // Route::resource('users', UserController::class);
    // Route::resource('menus', MenuPermissionController::class);

});
