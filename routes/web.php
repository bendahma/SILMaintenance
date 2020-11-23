<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeTravailController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ServiceController;

use App\Models\User;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/machine/remove/{id}',[MachineController::class,'remove'])->name('machine.remove');
    Route::get('/demandeTravail/remove/{id}',[DemandeTravailController::class,'remove']);
    Route::get('/personnel/remove/{id}',[PersonnelController::class,'remove']);
    Route::get('/service/remove/{id}',[ServiceController::class,'remove']);

    Route::resource('/machine',MachineController::class);
    Route::resource('/demandeTravail',DemandeTravailController::class);
    Route::resource('/personnel',PersonnelController::class);
    Route::resource('/service',ServiceController::class);
});