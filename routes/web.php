<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () { return view('home'); });

Route::get('/posts', [Post_Controller::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}', [StudentController::class, 'show']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/enrollments/create', [EnrollmentController::class, 'create']);
Route::post('/enrollments', [EnrollmentController::class, 'store']);
