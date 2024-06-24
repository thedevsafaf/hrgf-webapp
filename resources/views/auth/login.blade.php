@extends('layouts.app')

@section('title', 'HRGF | Login')

@section('content')
<div class="centered-container">
    <div class="container reduced p-5 box-shadow">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="mt-3 text-center">
            <p>Don't have an account? <a href="{{ route('register') }}">Please register</a></p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!--  Add specific scripts for the login page here if needed -->
@endsection