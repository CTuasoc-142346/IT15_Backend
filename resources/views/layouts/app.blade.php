<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'University of Mindanao Portal')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        /* Header */
        header {
            background-color: #800000; /* maroon */
            color: #ffffff;
            padding: 15px 20px; /* smaller padding for compact header */
            display: flex;
            align-items: center;
            height: auto; /* auto height */
        }

        header h1 {
            margin: 0;
            font-size: 20px; /* smaller font */
            cursor: pointer;
        }

        /* Main layout */
        .main {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #800000;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin-top: 0;
            color: #ffd700;
            text-align: center;
        }

        .category-link {
            display: block;
            padding: 10px;
            margin-bottom: 8px;
            color: #ffffff;
            text-decoration: none;
            border-left: 4px solid transparent;
        }

        .category-link:hover {
            background: #600000;
            border-left: 4px solid #ffd700;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 25px;
            background: #f9f9f9;
            overflow-y: auto;
        }

        /* Cards (home page) */
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #800000;
            color: #ffffff;
            width: 220px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .card:hover {
            background-color: #ffd700;
            color: #000000;
            transform: translateY(-5px);
        }

        /* Posts cards */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .post-card {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .post-card h3 {
            margin-top: 0;
            color: #800000;
        }

        .post-card p {
            color: #000000;
        }

        .post-category {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        /* Scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 8px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: #ffd700;
            border-radius: 4px;
        }
    </style>
    @stack('styles')
</head>
<body>

<header>
    <h1 onclick="window.location='/'">University of Mindanao</h1>
</header>

<div class="main">
    @hasSection('sidebar')
        <div class="sidebar">
            @yield('sidebar')
        </div>
    @endif

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
