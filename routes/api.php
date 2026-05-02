<?php

use App\Http\Controllers\Api\ApiHeritageController;
use Illuminate\Support\Facades\Route;

Route::get('/heritage', [ApiHeritageController::class, 'index']);
Route::get('/heritage/{id}', [ApiHeritageController::class, 'show']);
