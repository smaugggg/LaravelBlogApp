@extends('master')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">{{ __('Edit Category Form') }}</h1>
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ $category->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
                @include('partials.errors')

            </div>
        </div>
    </div>
@endsection
