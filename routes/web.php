<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Position\PositionController;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::prefix('manager')->middleware(['auth'])->group(function() {
    Route::resource('employees', EmployeeController::class);
    Route::resource('positions', PositionController::class);
});