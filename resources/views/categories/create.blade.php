
@extends('master')
@section('content')
    <h1>New Category Form</h1>

    <form method="POST" action="{{ action([\App\Http\Controllers\CategoryController::class, 'store']) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input name="description" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    @include('partials.errors')
@endsection

