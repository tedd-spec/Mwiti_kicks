@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $sneaker->image) }}" class="img-fluid rounded" alt="{{ $sneaker->name }}">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">{{ $sneaker->name }}</h2>
            <p class="text-muted">KSh {{ number_format($sneaker->price) }}</p>
            <p>{{ $sneaker->description }}</p>

            <a href="{{ route('order', ['sneaker' => $sneaker->id]) }}" class="btn btn-dark mt-3">Order Now</a>
        </div>
    </div>
</div>
@endsection
