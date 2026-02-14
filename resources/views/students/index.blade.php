@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<h1>Students</h1>

<!-- Add Student Button -->
<div style="margin-bottom: 20px;">
    <a href="{{ url('/students/create') }}" 
       style="background-color:#800000; color:#fff; padding:10px 15px; border-radius:8px; text-decoration:none; transition:0.2s;">
        + Add Student
    </a>
</div>

<!-- Students Grid -->
<div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px,1fr)); gap:20px;">
    @foreach ($students as $student)
        <div style="background:#fff; border-radius:8px; padding:15px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <h3 style="margin-top:0; color:#800000;">
                {{ $student->first_name }} {{ $student->last_name }}
            </h3>
            <p><strong>Student #:</strong> {{ $student->student_number }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <a href="/students/{{ $student->id }}" 
               style="color:#ffd700; text-decoration:none;">View Profile</a>
        </div>
    @endforeach
</div>
@endsection
