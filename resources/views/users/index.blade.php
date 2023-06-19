@extends('master')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($users as $user)
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/profile_pictures/' . $user->profile_picture) }}" alt="{{$user->username }}" class="card-img-top rounded-circle m-3" style="height: 100px; width: 100px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text"><strong>Username:</strong> {{ $user->username }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                <a href="{{ route('users.show', $user->id) }}" class="link-primary">View Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
