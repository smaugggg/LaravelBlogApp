@extends('master')
@section('content')
    <h1>Contact Page</h1>
    @if(!$email)
        <p>No Email Provided</p>
    @else
        <p>{{ $email }}</p>
    @endif
@endsection


