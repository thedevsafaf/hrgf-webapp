@extends('layouts.app')

@section('styles')
<style>
    .card-body p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .card-body p strong {
        color: #F3CA52;
        /* Color for the headings */
    }

    .card-body span {
        color: #ffffff;
        /* Color for the excavation details */
    }

    .card-body span.order-id {
        color: aqua;
        font-weight: bold;
        /* Color for the excavation details */
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Excavation Record Details</h2>
    <div class="card bg-dark mb-3">
        <div class="card-header">Details</div>
        <div class="card-body">
            <p><strong>Order ID:</strong> <span class="order-id">{{ $excavation->order->order_id }}</span></p>
            <p><strong>Engineer:</strong> <span>{{ $excavation->engineer }}</span></p>
            <p><strong>Note:</strong> <span>{{ $excavation->note }}</span></p>
            <p><strong>Company:</strong> <span>{{ $excavation->company }}</span></p>
            <p><strong>Location:</strong> <span>{{ $excavation->location }}</span></p>
            <p><strong>Nature of Work:</strong> <span>{{ $excavation->nature_of_work }}</span></p>
            @if ($excavation->images)
                <p><strong>Images:</strong></p>
                <img src="{{ asset('storage/' . $excavation->images) }}" alt="Excavation Image" style="max-width: 300px;">
            @else
                <p><strong>Image:</strong> <span>No image uploaded.</span></p>
            @endif
            @if ($excavation->documents)
                <p><strong>Documents:</strong> <a href=" {{ asset('storage/' . $excavation->documents) }}"
                        target="_blank">View
                        Document</a></p>
            @else
                <p><strong>Document:</strong> <span>No document uploaded.</span></p>
            @endif
        </div>
    </div>
    <a href="{{ route('excavations.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection