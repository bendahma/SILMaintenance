<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeTravailController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PersonnelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/machine/remove/{id}',[MachineController::class,'remove'])->name('machine.remove');
    Route::resource('/machine',MachineController::class);
    Route::resource('/demandeTravail',DemandeTravailController::class);
    Route::resource('/personnel',PersonnelController::class);
});