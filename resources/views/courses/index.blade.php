<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>

<h1>Course List</h1>

<ul>
    @foreach ($courses as $course)
        <li>
            <a href="/courses/{{ $course->id }}">
                {{ $course->course_code }} - {{ $course->course_name }}
            </a>
        </li>
    @endforeach
</ul>

</body>
</html>
