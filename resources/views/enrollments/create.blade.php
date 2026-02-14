@extends('layouts.app')

@section('title', 'Enroll Student')

@section('content')
<h1>Enroll Student in Course</h1>

@if (session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ url('/enrollments') }}" style="max-width:500px;">
    @csrf

    <label>Student:</label><br>
    <select name="student_id" required style="width:100%; padding:8px; margin-bottom:10px;">
        <option value="">-- Select Student --</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}">
                {{ $student->student_number }} - {{ $student->first_name }} {{ $student->last_name }}
            </option>
        @endforeach
    </select>

    <label>Course:</label><br>
    <select name="course_id" required style="width:100%; padding:8px; margin-bottom:10px;">
        <option value="">-- Select Course --</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->course_code }} - {{ $course->course_name }}
            </option>
        @endforeach
    </select>

    <button type="submit" style="background-color:#800000; color:#fff; padding:10px 15px; border:none; border-radius:8px; cursor:pointer;">
        Enroll
    </button>
</form>
@endsection
