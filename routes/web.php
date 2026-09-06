<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('role:Admin,User');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/residents', [ResidentController::class, 'index'])->middleware('role:Admin');
Route::get('/residents/create', [ResidentController::class, 'create'])->middleware('role:Admin');
Route::get('/residents/{id}', [ResidentController::class, 'edit'])->middleware('role:Admin');
Route::post('/residents', [ResidentController::class, 'store'])->middleware('role:Admin');
Route::put('/residents/{id}', [ResidentController::class, 'update'])->middleware('role:Admin');
Route::delete('/residents/{id}', [ResidentController::class, 'destroy'])->name('resident.destroy')->middleware('role:Admin');