<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Post_Controller;

Route::get('/posts', [Post_Controller::class, 'index']);
