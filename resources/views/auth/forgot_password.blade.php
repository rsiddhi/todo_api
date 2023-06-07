@extends('layouts.guest')

@section('content')

    <h2>Laravel Web App</h2>

    @if($errors->any())
        <p>Something went wrong!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form method="POST" action="/forgot_password">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Send Reset Password Email</button>
        </div>
    </form>

@endsection