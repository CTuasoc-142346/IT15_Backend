@extends('layouts.app')

@section('title', 'Home - University of Mindanao')

@section('content')
<h1>Welcome to University of Mindanao Portal</h1>

<div class="cards-container">
    <div class="card" onclick="window.location='/posts'">Posts</div>
    <div class="card" onclick="window.location='/students'">Student List</div>
    <div class="card" onclick="window.location='/courses'">Course List</div>
    <div class="card" onclick="window.location='/enrollments/create'">Enroll Course</div>
</div>
@endsection
