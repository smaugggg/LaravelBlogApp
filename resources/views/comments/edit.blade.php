@extends('master')


@section('content')
    <h1>Edit Comment Form</h1>

    <!-- resources/views/comments/edit.blade.php -->

    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body" rows="4">{{ $comment->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>


    @include('partials.errors')

@endsection
