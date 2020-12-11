<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemandeTravailController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PanneController;
use App\Http\Controllers\HeureSupplementaireController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth'])->group(function(){

    // Dashboard Route
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');

    //Type et categories
    Route::get('/Type',function(){
        return view('machineTypes');
    })->name('type.index');

    // Machine Routes
    Route::prefix('machines/')->group(function(){
        Route::name('machines.')->group(function(){
            Route::get('{TypeId}/{CategoryId}',[MachineController::class,'MachineList'])->name('machineList');
            Route::get('remove/{id}',[MachineController::class,'remove'])->name('remove');
            Route::get('panne/detailsPanne/{id}',[PanneController::class,'detailsPanne'])->name('detailsPanne');
            Route::get('panne/editPanne/{id}',[PanneController::class,'editPanne'])->name('editPanne');
        });
    });

    Route::get('panne/{machine}/panneList',[MachineController::class,'panneList'])->name('machines.panneList');


    // Panne Routes
    Route::prefix('panne/')->group(function(){
        Route::name('panne.')->group(function(){
            Route::get('machineEnPanne/{machine}',[PanneController::class,'machineEnPanne'])->name('MachineEnPanne');
            Route::get('machineEnPanne/panneRegle/{machine}',[PanneController::class,'ReglePanne'])->name('panneRegle');        
        });
    });

    // Personnel Routes
    Route::prefix('personnel/')->group(function(){
        Route::name('personnel.')->group(function(){
            Route::get('remove/{id}',[PersonnelController::class,'remove']);
        });
    });

    // Demande de Travail Routes
    Route::prefix('demandeTravail')->group(function(){
        Route::name('demandeTravail.')->group(function(){
            Route::get('remove/{id}',[DemandeTravailController::class,'remove']);
            Route::get('machineEnPanne/{machine}',[DemandeTravailController::class,'NewDemandeTravail'])->name('MachineEnPanne');
        });
    });

    // Service Routes
    Route::prefix('service/')->group(function(){
        Route::name('service.')->group(function(){
            Route::get('remove/{id}',[ServiceController::class,'remove']);
        });
    });

    Route::get('category/{id}',[CategoryController::class,'listCatgories'])->name('category.listCatgories');
    Route::get('category/{id}/create',[CategoryController::class,'create'])->name('category.create');


    // Resources Routes
    Route::resource('/service',ServiceController::class);
    Route::resource('/personnel',PersonnelController::class);
    Route::resource('/panne',PanneController::class);
    Route::resource('/category',CategoryController::class);

    Route::resource('/machine',MachineController::class);
    Route::resource('/demandeTravail',DemandeTravailController::class);
    Route::resource('/marque',MarkController::class);
    Route::resource('/heurs',HeureSupplementaireController::class);



});