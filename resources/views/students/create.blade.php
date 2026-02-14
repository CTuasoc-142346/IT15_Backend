@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
<h1>Add New Student</h1>

<form method="POST" action="{{ url('/students') }}" style="max-width:500px;">
    @csrf

    <label>Student Number:</label><br>
    <input type="text" name="student_number" required style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>First Name:</label><br>
    <input type="text" name="first_name" required style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" required style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <label>Email:</label><br>
    <input type="email" name="email" required style="width:100%; padding:8px; margin-bottom:10px;"><br>

    <button type="submit" style="background-color:#800000; color:#fff; padding:10px 15px; border:none; border-radius:8px; cursor:pointer;">
        Add Student
    </button>
</form>
@endsection
