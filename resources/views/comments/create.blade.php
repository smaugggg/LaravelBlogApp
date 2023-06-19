<div class="card-body">
    <form method="POST" action="{{ action([\App\Http\Controllers\CommentController::class, 'store']) }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body" maxlength="250" rows="4"></textarea>
        </div>

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group pt-3">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
