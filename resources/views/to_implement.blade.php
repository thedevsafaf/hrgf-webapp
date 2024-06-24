@extends('layouts.dashboard_layout')
@section('title', 'HRGF | To Implement')
@section('dashboard-title', 'To Implement')


@section('dashboard-content')
<p class="bold-text">User: <span>{{ $user->username }}</span></p>
<p class="bold-text m-b-md">Role: <span>{{ ucfirst($user->role) }}</span></p>
<ul class="list-group" id="list-items-en">
    <li class="list-group-item"><a href="{{ route('excavations.index') }}">Excavation</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">Cable Laying</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">Electricity Works</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">Shut Down</a></li>

</ul>

<ul class="list-group d-none" id="list-items-ar">
    <li class="list-group-item"><a href="{{ route('maintenance') }}">حفريات</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">مد الكابلات</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">أعمال الكهرباء</a></li>
    <li class="list-group-item"><a href="{{ route('maintenance') }}">اغلق</a></li>
</ul>

<div class="mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
</div>

@endsection

@section('scripts')
<!-- Additional scripts specific to dashboard if needed -->
@endsection