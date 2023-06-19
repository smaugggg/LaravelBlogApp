@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ __('Dashboard') }}</h2>
                    <div>
                        <a href="{{ route('categories.index') }}"
                           class="btn btn-outline-primary">{{ __('Categories') }}</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">{{ __('Posts') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @auth
                            <p>You are signed in as {{ auth()->user()->username }}</p>

                        @endauth

                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>
                                @guest
                                    <a href="{{ route('login') }}"
                                       class="btn btn-outline-primary">{{ __('Sign In') }}</a>

                                    <a href="{{ route('register') }}"
                                    class="btn btn-outline-primary">{{ __('Register') }}</a>
                                @endguest
                            </div>
                            <div>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="btn btn-outline-danger">{{ __('Sign Out') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
