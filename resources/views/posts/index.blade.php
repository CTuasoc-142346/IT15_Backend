<!DOCTYPE html>
<html>
<head>
    <title>UMTC Posts</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background: #ffffff;
        }

        .sidebar {
            width: 240px;
            background: #800000;
            padding: 20px;
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

        .content {
            flex: 1;
            padding: 25px;
            background: #f9f9f9;
            overflow-y: auto;
        }

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
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Categories</h2>

        <a href="{{ url('/posts') }}" class="category-link">
            All Posts
        </a>

        @foreach($categories as $category)
            <a href="{{ url('/posts?category=' . $category->id) }}" class="category-link">
                {{ $category->category_name }}
            </a>
        @endforeach
    </div>

    <div class="content">
        <h1>Posts</h1>

        <div class="posts-grid">
            @forelse($posts as $post)
                <div class="post-card">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->text }}</p>
                    <div class="post-category">
                        Category: {{ $post->category->category_name ?? 'Uncategorized' }}
                    </div>

                </div>
            @empty
                <p>No posts found.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
