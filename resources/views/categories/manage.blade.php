@extends('master')
@section('content')
    @if(Auth::check() && auth()->user()->role == 'admin')
        <h1>Deleted Categories</h1>
        @foreach ($categories as $category)
            @if($category->deleted_at != NULL)
                Category ID: {{ $category->id }}<br>
                Name: {{ $category->name }}<br>
                Description: {{ $category->description }}<br>
                <a href="{{ route('categories.restore', $category->id) }}">
                    [Restore]</a><br>
                <a href="{{ route('categories.forcedelete', $category->id) }}">
                    [Force Delete]</a><br>
                <br>
            @endif
        @endforeach
    @else
        <p>You must be logged in as an admin to view this page. Please <a href="{{ route('login') }}">log in</a>.</p>
    @endif
@endsection
