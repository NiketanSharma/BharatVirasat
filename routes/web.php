<?php

use App\Http\Controllers\HeritageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Support\Facades\Route;

// Language Switch
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'hi'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

// Home
Route::get('/', [HeritageController::class, 'home'])->name('home');

// Heritage Routes
Route::get('/heritage', [HeritageController::class, 'index'])->name('heritage.index');
Route::get('/heritage/create', [HeritageController::class, 'create'])->name('heritage.create');
Route::post('/heritage', [HeritageController::class, 'store'])->name('heritage.store');
Route::get('/heritage/{id}', [HeritageController::class, 'show'])->name('heritage.show');

// Trivia Route
Route::get('/trivia', [\App\Http\Controllers\TriviaController::class, 'index'])->name('trivia.index');

// Favourites
Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index');
Route::post('/favourites/{id}', [FavouriteController::class, 'add'])->name('favourites.add');
Route::delete('/favourites/{id}', [FavouriteController::class, 'remove'])->name('favourites.remove');

// Auth Routes
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::patch('/{id}/approve', [AdminController::class, 'approve'])->name('approve');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('update');
    
    // Admin Trivia Routes
    Route::post('/trivia', [AdminController::class, 'storeTrivia'])->name('trivia.store');
    Route::put('/trivia/{id}', [AdminController::class, 'updateTrivia'])->name('trivia.update');
    Route::delete('/trivia/{id}', [AdminController::class, 'destroyTrivia'])->name('trivia.destroy');
});
