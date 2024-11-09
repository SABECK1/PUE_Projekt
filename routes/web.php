<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $surveys = [
        ['id'=> 1,'class' => 'Customer Satisfaction', 'date' => '2024-01-15', 'status' => 'Completed'],
        ['id'=> 1,'class' => 'Employee Feedback', 'date' => '2024-02-10', 'status' => 'In Progress'],
        ['id'=> 1,'class' => 'Market Research', 'date' => '2024-03-05', 'status' => 'Pending'],
    ];
    return view('showSurveys', ['surveys' => $surveys]);
})->name('showSurveys');

Route::get('/show/data', function () {
    return view('showSurveyData');
})->name('showSurveyData');


Route::get('/evaluateSurveys', function () {
    $surveys = [
        ['id'=> 1,'class' => 'Customer Satisfaction', 'date' => '2024-01-15', 'status' => 'Completed'],
        ['id'=> 1,'class' => 'Employee Feedback', 'date' => '2024-02-10', 'status' => 'In Progress'],
        ['id'=> 1,'class' => 'Market Research', 'date' => '2024-03-05', 'status' => 'Pending'],
    ];
    return view('evaluateSurveys', ['surveys' => $surveys]);
})->name('evaluateSurveys');

Route::get('/evaluate/data', function () {
    return view('evaluateSurveyData');
})->name('evaluateSurveyData');


Route::get('/createSurveys', function () {
    return view('createSurveys');
})->name('createSurveys');

Route::get('/user', function () {
    return view('userPage');
})->name('userPage');
