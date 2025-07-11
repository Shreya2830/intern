<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/w', function () {
    return view('welcome');
});

Route::get('/@{user:username}', [\App\Http\Controllers\PublicProfileController::class, 'show'])
    ->name('public.profile.show');

Route::middleware(['auth', 'verified'])->group(function (){


Route::get('/', [PostController::class,'index'])->name('dashboard');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::post('/post/create', [PostController::class, 'store'])->name('post.store');

Route::get('/@{username}/{post}', [PostController::class, 'show'])->name('post.show');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
