@extends('layouts.app')

@section('title', 'Courses List')

@section('content')
<h1>Courses</h1>

<div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px,1fr)); gap:20px;">
    @foreach ($courses as $course)
        <div style="background:#fff; border-radius:8px; padding:15px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3 style="margin-top:0; color:#800000;">
                {{ $course->course_code }} - {{ $course->course_name }}
            </h3>
            <p><strong>Capacity:</strong> {{ $course->capacity }}</p>
            <a href="/courses/{{ $course->id }}" style="color:#ffd700; text-decoration:none;">View Students</a>
        </div>
    @endforeach
</div>
@endsection
