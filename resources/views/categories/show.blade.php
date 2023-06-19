@extends('master')
@section('content')
    <h1 class="mb-0"> {{ $category->name }}</h1>
    <small class="text-muted">{{ $category->description}}</small><br>
    <hr>
    @foreach ($category->posts as $post)
        <div class="bg-dark text-light mb-3">
            <div class="container max-w-4xl px-5 py-3 mx-auto rounded shadow-sm bg-dark">
                <div class="d-flex justify-content-between">
                    <span class="text-sm text-muted"><small>{{ $post->created_at }}</small></span>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-warning">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="mt-1">
                    <h3 class="pl-4"> <a href="{{ route('posts.show', $post->id) }}" class="text-primary text-decoration-none">{{ $post->name }}</a></h3>
                    <p class="mt-2">{{ strip_tags(substr($post->body, 0, 250)) }}{{ strlen($post->body) > 250 ? '...' : '' }}</p> {{-- limit to 250 characters and add '...' if longer --}}
                </div>
                <div class="d-flex justify-content-between mt-4 pb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read more</a>
                    <div>
                        <span class="text-gray-400 d-flex align-items-center">Posted by: <a href="{{ route('users.show', ['user' => $post->user_id]) }}" class="mx-1">{{ $post->author_username }}</a></span>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
