<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AgentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    Alert::info('welcome');
    return redirect('/agent');
});

Route::prefix('/agent')->group(function() {
    Route::controller(AgentController::class)->group(function() {
        Route::get('/', 'index');
        Route::get('/search', 'search');
        Route::get('/show/{id}', 'show');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
        Route::get('/destroy/{id}', 'destroy');
    });
});