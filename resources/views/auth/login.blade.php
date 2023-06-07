@extends('layouts.guest')

@section('content')

    <h2>Login to Laravel Web App</h2>

    @if($errors->any())
        <p>Something went wrong!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>


        <div class="form-group">
            <input type="checkbox" class="form-control" id="remember_me" name="remember_me">
            <label for="remember_me">Remember Me</label>
        </div>

        <div>
            <a href="{{ route('password.request') }}">Forgot Password</a>
        </div>


        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

@endsection