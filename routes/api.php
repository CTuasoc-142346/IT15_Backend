<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SchoolDayController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\SubjectController;

// ── Dev helper (remove in production) ─────────────────────────
Route::get('/token-test', function () {
    $user = User::find(1);
    return $user->createToken('test')->plainTextToken;
});

// ── Public routes ──────────────────────────────────────────────
Route::post('/login', [AuthController::class, 'login']);

// ── Protected routes (require Sanctum token) ──────────────────
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', fn (Request $request) => $request->user());

    // ── Students ─────────────────────────────────────────────
    Route::prefix('students')->group(function () {
        Route::get('/stats', [StudentController::class, 'stats']);   // GET /api/students/stats
        Route::get('/',      [StudentController::class, 'index']);   // GET /api/students
        Route::get('/{id}',  [StudentController::class, 'show']);    // GET /api/students/{id}
    });

    // ── Courses ──────────────────────────────────────────────
    Route::prefix('courses')->group(function () {
        Route::get('/stats',         [CourseController::class, 'stats']);    // GET /api/courses/stats
        Route::get('/',              [CourseController::class, 'index']);    // GET /api/courses
        Route::get('/{id}',          [CourseController::class, 'show']);     // GET /api/courses/{id}
        Route::get('/{id}/students', [CourseController::class, 'students']); // GET /api/courses/{id}/students
    });

    // ── School Days / Academic Calendar ──────────────────────
    Route::prefix('school-days')->group(function () {
        Route::get('/stats',    [SchoolDayController::class, 'stats']);    // GET /api/school-days/stats
        Route::get('/upcoming', [SchoolDayController::class, 'upcoming']); // GET /api/school-days/upcoming
        Route::get('/',         [SchoolDayController::class, 'index']);    // GET /api/school-days
        Route::get('/{date}',   [SchoolDayController::class, 'show']);     // GET /api/school-days/2025-08-04
    });

    // ── Posts & Categories ────────────────────────────────────
    Route::get('/categories', [PostController::class, 'categories']); // GET /api/categories
    Route::prefix('posts')->group(function () {
        Route::get('/',      [PostController::class, 'index']);        // GET /api/posts
        Route::get('/{id}',  [PostController::class, 'show']);         // GET /api/posts/{id}
    });

    // ── Departments ───────────────────────────────────────────
    Route::get('/departments', [ProgramController::class, 'departments']); // GET /api/departments

    // ── Programs ──────────────────────────────────────────────
    Route::prefix('programs')->group(function () {
        Route::get('/',      [ProgramController::class, 'index']);     // GET /api/programs?department_id=1
        Route::get('/{id}',  [ProgramController::class, 'show']);      // GET /api/programs/{id} (with curriculum)
    });

    // ── Subjects ──────────────────────────────────────────────
    Route::prefix('subjects')->group(function () {
        Route::get('/',      [SubjectController::class, 'index']);     // GET /api/subjects?program_id=1
        Route::get('/{id}',  [SubjectController::class, 'show']);      // GET /api/subjects/{id}
    });
});