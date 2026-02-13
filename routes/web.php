<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Post_Controller;

Route::get('/posts', [Post_Controller::class, 'index']);

use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);   

use App\Http\Controllers\CourseController;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

use App\Http\Controllers\EnrollmentController;

Route::post('/enroll', [EnrollmentController::class, 'enroll']);

