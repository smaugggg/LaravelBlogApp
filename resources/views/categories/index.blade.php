@extends('master')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Categories</h1>
        <div class="row justify-content-around ">
            @foreach($categories as $category)
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><small>{{ $category->posts->count() }} Post(s)</small></h6>
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{ route('categories.show', $category->id) }}" class="link-primary">View Category</a>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <hr>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-success">Edit</a>
                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
            <hr>
                <!-- Pagination -->
                {{ $categories->links('vendor.pagination.my-template') }}
        </div>
    </div>
@endsection
