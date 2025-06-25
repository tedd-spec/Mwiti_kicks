@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Sneaker</h2>
    <form action="{{ route('sneakers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="brand" placeholder="Brand" class="form-control mb-2" required>
        <input type="text" name="model" placeholder="Model" class="form-control mb-2" required>
        <textarea name="description" placeholder="Description" class="form-control mb-2" required></textarea>
        <input type="number" name="price" placeholder="Price" step="0.01" class="form-control mb-2" required>
        <input type="file" name="image" class="form-control mb-2">
        <button type="submit" class="btn btn-dark">Add Sneaker</button>
    </form>
</div>
@endsection
