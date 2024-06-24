@extends('layouts.app')

@section('title', 'HRGF | Register')

@section('content')
<div class="centered-container">
    <div class="container reduced p-5 box-shadow">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="engineer">Engineer</option>
                    <option value="supervisor">Supervisor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="mt-3 text-center">
            <p>Already have an account? <a href="{{ route('login') }}">Please login</a></p>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<!--  Add specific scripts for the registration page here if needed -->
@endsection