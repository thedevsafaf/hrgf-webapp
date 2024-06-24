@extends('layouts.dashboard_layout')

@section('title', 'HRGF Dashboard | ' . $user->username)

@section('dashboard-title', 'Welcome, ' . $user->name . ' !')

@section('dashboard-content')

<div class="row mb-3">
    <div class="col-md-6">
        <p class="bold-text">Username: <br><span>{{ $user->username }}</span></p>
    </div>
    <div class="col-md-6">
        <p class="bold-text">Role: <br><span>{{ ucfirst($user->role) }}</span></p>
    </div>
</div>

<ul class="list-group" id="list-items-en">
    @if ($user->role == 'supervisor')
        <li class="list-group-item disabled">To Implement</li>
    @else
        <li class="list-group-item"><a href="{{ route('to_implement') }}">To Implement</a></li>
    @endif
    <li class="list-group-item"><a href="{{ route('maintenance') }}">Project</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">Emergency</a></li>
</ul>

<ul class="list-group d-none" id="list-items-ar">
    @if ($user->role == 'supervisor')
        <li class="list-group-item disabled">للتنفيذ</li>
    @else
        <li class="list-group-item"><a href="{{ route('to_implement') }}">للتنفيذ</a></li>
    @endif
    <li class="list-group-item"><a href="{{ route('maintenance') }}">المشروع</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">الطوارئ</a></li>
</ul>
@endsection

@section('scripts')
<!-- Additional scripts specific to dashboard if needed -->
@endsection