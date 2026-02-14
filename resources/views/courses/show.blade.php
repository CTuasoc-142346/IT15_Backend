@extends('layouts.app')

@section('title', 'Course Detail')

@section('content')
<h1>{{ $course->course_code }} - {{ $course->course_name }}</h1>

<div style="margin-bottom:20px; padding:15px; background:#fff; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
    <p><strong>Capacity:</strong> {{ $course->capacity }}</p>
</div>

<h2>Enrolled Students</h2>

@if ($course->students->isEmpty())
    <p style="color:#800000;">No students enrolled yet.</p>
@else
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px,1fr)); gap:20px; margin-top:10px;">
        @foreach ($course->students as $student)
            <div style="background:#fff; border-radius:8px; padding:15px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                <h3 style="margin-top:0; color:#800000;">
                    {{ $student->first_name }} {{ $student->last_name }}
                </h3>
                <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <a href="/students/{{ $student->id }}" style="color:#ffd700; text-decoration:none;">View Profile</a>
            </div>
        @endforeach
    </div>
@endif
@endsection
