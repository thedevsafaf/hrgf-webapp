@extends('layouts.app')

@section('styles')
<style>
    .order-id {
        color: aqua;
        font-weight: bold;
    }

    .no-result-text {
        color: #f3ca52;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Excavation Records</h2>

    <!-- Search Form -->
    <form action="{{ route('excavations.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by Order ID...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
    </form>

    <!-- add item button -->
    <a href="{{ route('excavations.create') }}" class="btn btn-primary mb-3">Add Excavation Record</a>

    <!-- alert msg -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($excavations->isEmpty())
        <p class="no-result-text">Sorry, could not find the matched order ID.</p>
    @else
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Engineer</th>
                    <th>Order ID</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Nature of Work</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Initialize a variable to maintain slNo --}}
                @php
                    $slNo = ($excavations->currentPage() - 1) * $excavations->perPage() + 1;
                @endphp

                @foreach ($excavations as $excavation)
                    <tr>
                        <td>{{ $slNo++ }}</td>
                        <td>{{ $excavation->engineer }}</td>
                        <td class="order-id">{{ $excavation->order->order_id }}</td>
                        <td>{{ $excavation->company }}</td>
                        <td>{{ $excavation->location }}</td>
                        <td>{{ $excavation->nature_of_work }}</td>
                        <td>
                            <a href="{{ route('excavations.show', $excavation->id) }}" class="btn btn-info"><i
                                    class="fas fa-eye"></i> View</a>
                            <a href="{{ route('excavations.edit', $excavation->id) }}" class="btn btn-warning"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('excavations.destroy', $excavation->id) }}" method="POST"
                                class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display pagination links -->
        {{ $excavations->links() }}
    @endif

    <div class="mt-3">
        <a href="{{ route('to_implement') }}" class="btn btn-secondary">Back to Implement Page</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Main Dashboard</a>
    </div>


</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const confirmed = confirm('Are you sure you want to delete this record?');
                if (confirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection