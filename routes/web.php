<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // MatFlix（一般ユーザー）
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/view', [UserController::class, 'view'])->name('user.view');
    Route::get('/user/show/{movie_id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/evaluation/{movie_id}', [UserController::class, 'evaluation'])->name('user.evaluation');
    Route::post('/user/evaluation/{movie_id}', [UserController::class, 'evaluationPost'])->name('user.evaluation.post');
});

//管理者matflix
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/show/{id}', [AdminController::class, 'show']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/update/{id}', [AdminController::class, 'update']);
});


require __DIR__ . '/auth.php';
