<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::middleware('guest')->group(function(){
    // Route::get('/', fn() => view('auth.login'))->name('home');
    Route::get('/', function () { return redirect('/login'); });
    Route::get('/login', fn() => view('auth.login'))->name('home');
    Route::get('/signup', [AuthController::class, 'signupView'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [TodoController::class, 'index'])->name('dashboard');
    Route::post('/todo/add', [TodoController::class, 'store']);
    Route::post('/todo/{id}/done', [TodoController::class, 'markDone']);
    Route::post('/todo/{id}/delete', [TodoController::class, 'destroy']);

    Route::get('/bin', [TodoController::class, 'bin'])->name('bin');
    Route::post('/bin/{id}/restore', [TodoController::class, 'restore']);
    Route::post('/bin/{id}/permanent-delete', [TodoController::class, 'permanentDelete']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/delete-account', [AuthController::class, 'deleteAccount']);
});