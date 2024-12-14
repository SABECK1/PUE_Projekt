<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\Auth\LogoutController;


//Webroutes

//#################Dashboard#################
Route::get('/', [PagesController::class, 'dashboard'])->middleware('auth')->name('dashboard');


//#################Surveys#################
//Erstellen
Route::get('/createSurvey', [SurveyController::class, 'createSurveys'])->middleware('auth')->name('createSurveys');
//Auwerten
Route::get('/evaluateSurveys', [SurveyController::class, 'evaluateSurveys'])->middleware('auth')->name('evaluateSurveys');
Route::get('/evaluateSurveys/{survey}', [SurveyController::class, 'evaluateSurvey'])->middleware('auth')->name('evaluateSurvey');
//Anzeigen
Route::get('/showSurveys', [SurveyController::class, 'showSurveys'])->name('showSurveys');
Route::get('/showSurveys/{survey}', [SurveyController::class, 'showSurvey'])->middleware('auth')->name('showSurvey');


//#################Questionnaire#################
Route::get('/questionnaire', [QuestionController::class, 'questionnaire'])->name('questionnaire');


//#################Verwaltung#################
//User
Route::get('/user', [UserController::class, 'showUser'])->middleware('auth')->name('userPage');
Route::get('/userverwaltung', [UserController::class, 'showUsers'])->middleware('auth')->name('userPage');


//#################Authentication#################
Route::get('/Login', Login::class)->name('login');
//Route::get('/register', [RegisterController::class, 'create'])->name('register');
//Route::post('/register', [RegisterController::class, 'store'])->name('register_store');
Route::get('/Logout', [LogoutController::class, 'logout'])->name('logout');


