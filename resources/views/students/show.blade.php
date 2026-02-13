<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
</head>
<body>

<h1>{{ $student->first_name }} {{ $student->last_name }}</h1>

<p>Student Number: {{ $student->student_number }}</p>
<p>Email: {{ $student->email }}</p>

<h2>Enrolled Courses</h2>

@if ($student->courses->isEmpty())
    <p>No enrolled courses.</p>
@else
    <ul>
        @foreach ($student->courses as $course)
            <li>{{ $course->course_code }} - {{ $course->course_name }}</li>
        @endforeach
    </ul>
@endif

</body>
</html>
