<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomTeacherController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('classrooms', ClassroomController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('classroom-teachers', ClassroomTeacherController::class)->except(['show']);
Route::resource('subject-teachers', SubjectTeacherController::class)->except(['show']);
Route::resource('scores', ScoreController::class);