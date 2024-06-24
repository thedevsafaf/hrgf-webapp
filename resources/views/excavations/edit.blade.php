@extends('layouts.app')
@section('styles')
<style>
    .reduced-form {
        max-width: 600px;
        margin: auto;
    }
</style>
@endsection

@section('content')
<div class="container reduced-form p-5">
    <h2>Edit Excavation Record</h2>
    <form action="{{ route('excavations.update', $excavation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="engineer">Engineer</label>
            <input type="text" class="form-control" id="engineer" name="engineer" value="{{ $excavation->engineer }}"
                required>
        </div>
        <div class="form-group">
            <label for="order_id">Order ID</label>
            <input type="text" class="form-control" id="order_id" name="order_id"
                value="{{ $excavation->order->order_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" name="note">{{ $excavation->note }}</textarea>
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $excavation->company }}"
                required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $excavation->location }}"
                required>
        </div>
        <div class="form-group">
            <label for="nature_of_work">Nature of Work</label>
            <input type="text" class="form-control" id="nature_of_work" name="nature_of_work"
                value="{{ $excavation->nature_of_work }}" required>
        </div>
        <div class="form-group">
            <label for="images">Upload Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>
        <div class="form-group">
            <label for="documents">Upload Documents</label>
            <input type="file" class="form-control" id="documents" name="documents[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection