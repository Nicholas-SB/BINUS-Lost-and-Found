@extends('layouts.app')
@section('content')
<div class='container py-4'>
    <a href="{{ route('items.index') }}">Back to list</a>

    <div class="card mt-3">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $item->photo_path) }}" class="w-100 rounded-start" style="height: 400px; object-fit: contain;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h1 class="card-title">{{ $item->name }}</h1>
                    <p>{{ $item->description ?? '-' }}</p>

                    <p><strong>Found at: </strong>{{ $item->location_found }}</p>
                    <p><strong>Date found: </strong>{{ $item->date_found }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection