<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GalaxyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/google', [AuthenticationController::class, 'google'])->name('auth.google');
Route::get('auth/google/callback', [AuthenticationController::class, 'googleCallback'])->name('auth.google.callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('galaxy')->group(function () {
        Route::get('/', [GalaxyController::class, 'main'])->name('galaxy.main');
        Route::get('{galaxyModel}', [GalaxyController::class, 'index'])->name('galaxy.index');
        Route::get('{galaxyModel}/create', [GalaxyController::class, 'create'])->name('galaxy.create');
        Route::get('{galaxyModel}/{id}/show', [GalaxyController::class, 'show'])->name('galaxy.show');
        Route::get('{galaxyModel}/{id}/edit', [GalaxyController::class, 'edit'])->name('galaxy.edit');
        Route::post('{galaxyModel}/store', [GalaxyController::class, 'store'])->name('galaxy.store');
        Route::put('{galaxyModel}/{id}/update', [GalaxyController::class, 'update'])->name('galaxy.update');
        Route::delete('{galaxyModel}/{id}/destroy', [GalaxyController::class, 'destroy'])->name('galaxy.destroy');
    });
});


require __DIR__.'/auth.php';
