@extends('master')
@section('content')
    @if(Auth::check() && auth()->user()->role == 'admin')
        <h1>Deleted Posts</h1>
        @foreach ($posts as $post)
            @if($post->deleted_at != NULL)
                Post ID: {{ $post->id }}<br>
                Name: {{ $post->name }}<br>
                Body: {{ $post->body }}<br>
                <a href="{{ route('posts.restore', $post->id) }}">
                    [Restore]</a><br>
                <a href="{{ route('posts.forcedelete', $post->id) }}">
                    [Force Delete]</a><br>
                <br>
            @endif
        @endforeach
    @else
        <p>You must be logged in as an admin to view this page. Please <a href="{{ route('login') }}">log in</a>.</p>
    @endif
@endsection
