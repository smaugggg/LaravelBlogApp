@extends('master')

@section('content')
    <h1>New Post</h1>
    <form method="POST" action="{{ action([\App\Http\Controllers\PostController::class, 'store'])}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input name="name" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body:</label>
            <textarea name="body" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags:</label>
            <select multiple name="tags[]" class="form-select" aria-label="Multiple select tags">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <div class="form-text">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</div>
        </div>



        <div class="mb-3">
            <label for="category_id" class="form-label">Gallery:</label>
            <select name="category_id" class="form-select">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    @include('partials.errors')




@endsection
