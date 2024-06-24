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
    <h2>Create Excavation Record</h2>
    <form action="{{ route('excavations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="engineer">Engineer</label>
            <input type="text" class="form-control" id="engineer" name="engineer" required>
        </div>
        <div class="form-group">
            <label for="order_id">Order ID</label>
            <input type="text" class="form-control" id="order_id" name="order_id" maxlength="9" required pattern="\d{9}"
                title="Order ID must be exactly 9 digits">
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" name="note"></textarea>
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" id="company" name="company" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="nature_of_work">Nature of Work</label>
            <input type="text" class="form-control" id="nature_of_work" name="nature_of_work" required>
        </div>
        <div class="form-group">
            <label for="images">Upload Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>
        <div class="form-group">
            <label for="documents">Upload Documents</label>
            <input type="file" class="form-control" id="documents" name="documents[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection