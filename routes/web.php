<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group(['middleware'=>'auth'], function(){


Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::middleware('auth')->group( function ()
 {   
Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    
});
require __DIR__.'/auth.php';
