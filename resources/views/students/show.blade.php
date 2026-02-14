@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<h1>{{ $student->first_name }} {{ $student->last_name }}</h1>

<div style="margin-bottom:20px; padding:15px; background:#fff; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
    <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
</div>

<h2>Enrolled Courses</h2>

@if ($student->courses->isEmpty())
    <p style="color:#800000;">No enrolled courses.</p>
@else
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px,1fr)); gap:20px; margin-top:10px;">
        @foreach ($student->courses as $course)
            <div style="background:#fff; border-radius:8px; padding:15px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                <h3 style="margin-top:0; color:#800000;">{{ $course->course_code }}</h3>
                <p>{{ $course->course_name }}</p>
                <p><strong>Capacity:</strong> {{ $course->capacity }}</p>
                <a href="/courses/{{ $course->id }}" style="color:#ffd700; text-decoration:none;">View Course</a>
            </div>
        @endforeach
    </div>
@endif
@endsection
