<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h1>Student List</h1>

<ul>
    @foreach ($students as $student)
        <li>
            <a href="/students/{{ $student->id }}">
                {{ $student->first_name }} {{ $student->last_name }}
            </a>
        </li>
    @endforeach
</ul>

</body>
</html>
