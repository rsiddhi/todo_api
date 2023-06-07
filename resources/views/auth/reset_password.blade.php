@extends('layouts.guest')

@section('content')

    <h2>Register</h2>

    @if($errors->any())
        <p>Something went wrong!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        {{ csrf_field() }}

        <input name="token" type="hidden" value="{{ $request->token }}">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $request->email) }}">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password">Conform Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Reset Password</button>
        </div>
    </form>

@endsection