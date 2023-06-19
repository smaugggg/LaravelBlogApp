@extends('master')

@section('content')
    @if(Auth::check() && Auth::user()->role === 'admin')
        <h1>Deleted Comments</h1>
        @foreach ($comments as $comment)
            @if($comment->deleted_at != NULL)
                Comment ID: {{ $comment->id }}<br>
                Post ID: {{ $comment->post_id }}<br>
                Body: {{ $comment->body }}<br>
                <a href="{{ route('comments.restore', $comment->id) }}">
                    [Restore]</a><br>
                <a href="{{ route('comments.forcedelete', $comment->id) }}">
                    [Force Delete]</a><br>
                <br>
            @endif
        @endforeach
    @else
        <p>You need to be signed in as an admin to access this page.</p>
        <p><a href="{{ route('login') }}">Login</a></p>
    @endif
@endsection
