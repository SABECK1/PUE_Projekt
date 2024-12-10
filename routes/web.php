<?php

use App\Livewire\Welcome;
use App\Models\Survey;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Webroutes
//Route::get('/', [PagesController::class, 'showSurveys'])->middleware('auth')->name('showSurveys');
//Route::get('/show/data', [PagesController::class, 'showSurveyData'])->middleware('auth')->name('showSurveyData');
//Route::get('/show/survey', [PagesController::class, 'showSurvey'])->middleware('auth')->name('showSurvey');
//Route::get('/evaluateSurveys', [PagesController::class, 'evaluateSurveys'])->middleware('auth')->name('evaluateSurveys');
//Route::get('/evaluateSurvey', [PagesController::class, 'evaluateSurvey'])->middleware('auth')->name('evaluateSurvey');
//Route::get('/evaluate/data{survey}', [PagesController::class, 'evaluateSurveyData'])->middleware('auth')->name('evaluateSurveyData');
//Route::get('/createSurvey', [PagesController::class, 'createSurveys'])->middleware('auth')->name('createSurveys');
//Route::get('/user', [PagesController::class, 'showUser'])->middleware('auth')->name('userPage');
//Route::get('/userverwaltung', [PagesController::class, 'showUsers'])->middleware('auth')->name('userPage');

//Zum Testen ohne Auth
Route::get('/user', [PagesController::class, 'showUser'])->name('userPage');
Route::get('/userverwaltung', [PagesController::class, 'showUsers'])->name('userPage');
Route::get('/', [PagesController::class, 'showSurveys'])->name('showSurveys');
Route::get('/show/data', [PagesController::class, 'showSurveyData'])->name('showSurveyData');
Route::get('/show/survey', [PagesController::class, 'showSurvey'])->name('showSurvey');
Route::get('/evaluateSurveys', [PagesController::class, 'evaluateSurveys'])->name('evaluateSurveys');
Route::get('/evaluateSurvey', [PagesController::class, 'evaluateSurvey'])->name('evaluateSurvey');
Route::get('/evaluate/data{survey}', [PagesController::class, 'evaluateSurveyData'])->name('evaluateSurveyData');
Route::get('/createSurvey', [PagesController::class, 'createSurveys'])->name('createSurveys');



//Authentication
Route::get('/login', \App\Livewire\Login::class)->name('login');
//Route::get('/register', [RegisterController::class, 'create'])->name('register');
//Route::post('/register', [RegisterController::class, 'store'])->name('register_store');


