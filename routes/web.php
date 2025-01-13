<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GuardianAccessController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\GuardianScanController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::resource('classrooms', ClassroomController::class)->middleware(['auth']);
Route::resource('grade-levels', GradeLevelController::class)->middleware(['auth']);

Route::resource('child', ChildController::class)->middleware(['auth']);
Route::get('/child/{child}/add-guardian', [GuardianController::class, 'create'])->middleware(['auth'])->name('child.add-guardian');
Route::post('/child/{child}/add-guardian', [GuardianController::class, 'store'])->middleware(['auth'])->name('child.store-guardian');

Route::resource('guardians', GuardianController::class)->middleware(['auth']);
Route::get('/guardian-access', [GuardianAccessController::class, 'showForm'])->name('guardian.access');
Route::post('/guardian-access', [GuardianAccessController::class, 'verify'])->name('guardian.verify');
Route::get('/guardian-profile/{guardian}', [GuardianAccessController::class, 'profile'])->name('guardian.profile');

Route::get('/logs', [GuardianScanController::class, 'index'])->name('logs.index');

Route::get('/kiosk-idle', [GuardianAccessController::class, 'kioskIdle'])->name('kiosk.idle');
Route::get('/kiosk-check', [GuardianAccessController::class, 'kioskCheckLogs'])->name('kiosk.check');
Route::get('/kiosk-profile/{guardian}', [GuardianAccessController::class, 'kioskProfile'])->name('kiosk.profile');


Route::get('/dashboard', fn() => redirect()->route('child.index'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
