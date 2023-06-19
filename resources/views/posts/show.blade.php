@extends('master')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container max-w-2xl px-6 py-16 mx-auto mt-5 justify-content-center">
                    <article class="space-y-8 bg-dark text-light px-5 py-3">
                        <div class="space-y-6">
                            <h1 class="my-0"><strong>{{ $post->name }}</strong></h1>
                            <div class="d-flex flex-column flex-md-row justify-content-between items-center text-gray-400">
                                <div class="d-flex items-center space-x-2">
                                    <p class="text-sm text-muted"><small>{{ $post->author_username . " • " . $post->created_at }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:text-gray-100 p-1">
                            <p>{{ $post->body }}</p>
                        </div>
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning">Delete Post</button>
                                </form>
                            @endif
                        @endauth
                    </article>
                    <div>
                        <div class="d-flex flex-wrap py-6 space-x-2 border-top border-dashed dark:border-gray-400">
                            @foreach($post->tags as $tag)
                                <a rel="noopener noreferrer" href="#" class="px-3 py-1 rounded-sm hover-underline text-primary">#{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="space-y-2 mt-4">
                            @if(count($relatedPosts) > 0)
                                <h4 class="text-lg font-semibold">Related posts</h4>
                                <ul class="ml-4 space-y-1 list-disc">
                                    @foreach($relatedPosts as $relatedPost)
                                        <li>
                                            <a rel="noopener noreferrer" href="{{ route('posts.show', $relatedPost->id) }}" class="hover-underline">{{ $relatedPost->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-header bg-primary text-dark text-center">
                        <h4>Add a Comment!</h4>
                    </div>
                    <div class="card-body">
                        @include('comments.create')
                    </div>
                </div>
                <div class="card-body">
                    @include('comments.show')
                </div>
            </div>
        </div>
    </div>
@endsection
