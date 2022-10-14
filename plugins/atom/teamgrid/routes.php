<?php 

use Atom\Teamgrid\Http\Controllers\ProjectController;
use Atom\Teamgrid\Http\Controllers\TaskController;
use Atom\Teamgrid\Http\Controllers\TimeEntryController;

Route::group(['prefix' => 'api'], function() {


    Route::group(['prefix' => 'projects'], function() {

        Route::get('/', [ProjectController::class, 'getAll']);
        Route::get('/{id}', [ProjectController::class, 'get']);

        Route::middleware(['auth'])->group(function() {

            Route::post('/create', [ProjectController::class, 'create']);
            Route::post('/edit/{id}', [ProjectController::class, 'edit']);
            Route::post('/complete/{id}', [ProjectController::class, 'complete']);
            Route::delete('/delete/{id}', [ProjectController::class, 'delete']);

        });
    }); 

    Route::group(['prefix' => 'tasks'], function() {

        Route::get('/', [TaskController::class, 'getAll']);
        Route::get('/{id}', [TaskController::class, 'get']);

        Route::middleware(['auth'])->group(function () {

            Route::post('/create', [TaskController::class, 'create']);
            Route::post('/edit/{id}', [TaskController::class, 'edit']);
            Route::post('/complete/{id}', [TaskController::class, 'complete']);
            Route::delete('/delete/{id}', [TaskController::class, 'delete']);

        });

    });

    Route::middleware(['auth'])->group ( function() {

        Route::group(['prefix' => 'time-entries'], function() {

            Route::post('/start', [TimeEntryController::class, 'start']);
            Route::post('/end/{id}', [TimeEntryController::class, 'end']);

        });

    }); 

});