
<!-- Comments -->
@foreach ($post->comments as $comment)

<div class="container mb-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="ml-3">
                            <!-- need to link comments and users to display user NAME -->
                            <h4 class="font-weight-bold">{{ $comment->author_username }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="ml-3">
                            <span class="text-xs text-muted"><small>{{ $comment->created_at }}</small></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $comment->body }}
                </div>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-warning">Delete Comment</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endforeach


