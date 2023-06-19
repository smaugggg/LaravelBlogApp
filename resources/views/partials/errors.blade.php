@if ($errors->any())
    <div class="alert alert-danger mt-3">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif
