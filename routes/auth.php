<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
Web Routes

Register web routes for your app's RouteServiceProvider
in a group containing the "web" middleware
*/

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
