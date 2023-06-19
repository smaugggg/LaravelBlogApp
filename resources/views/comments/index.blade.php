@extends('master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card my-3">
                        <div class="card-header bg-secondary text-white text-center">
                            <h4>{{ $post->name }}</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->body }}</p>
                        </div>
                        <div class="card-footer">
                            <h5>Comments</h5>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Created at</th>
                                    @if (Auth::user()->role === 'admin')
                                        <th>Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($post->comments as $comment)
                                    @if ($comment->deleted_at == null)
                                        <tr>
                                            <td>{{ $comment->body }}</td>
                                            <td>{{ $comment->author_id }}</td>
                                            <td>{{ $comment->created_at }}</td>
                                            @if (Auth::user()->role === 'admin')
                                                <td>
                                                    <form action="{{ action([\App\Http\Controllers\CommentController::class, 'destroy'], $comment->id) }}" method="POST" class="d-inline">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-outline-warning">Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
