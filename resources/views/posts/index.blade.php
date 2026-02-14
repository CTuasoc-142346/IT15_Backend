@extends('layouts.app')

@section('title', 'Posts - UMTC')

@section('sidebar')
<h2>Categories</h2>
<a href="{{ url('/posts') }}" class="category-link">All Posts</a>
@foreach($categories as $category)
    <a href="{{ url('/posts?category=' . $category->id) }}" class="category-link">
        {{ $category->category_name }}
    </a>
@endforeach
@endsection

@section('content')
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
@endsection
