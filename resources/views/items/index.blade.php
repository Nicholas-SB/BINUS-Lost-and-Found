@extends('layouts.app')
@section('content')

<div class="container">
    <form method="GET" action="{{ route('items.index') }}" class="row g-2 mb-4 align-items-end">
        @include('partials.item-filters')

        <div class="col-md-2">
            <button class="btn btn-primary w-100">{{ __('site.search') }}</button>
        </div>
    </form>

    <h1>{{ __('site.items') }}</h1>
    <div class="row">
        @forelse ($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <a href="{{ route('items.show', $item) }}" class="stretched-link"></a>
                        <h5>{{ $item->name }}</h5>
                        <p class="text-muted mb-0">{{ $item->location_found }} - {{ $item->date_found->format('l, d M Y') }}</p>
                    </div>
                </div>
            </div>
        @empty
            {{-- Keep col-12 in case we put layout classes l8er --}}
            <div class="col-12">
                <h5>No items found.</h5>
            </div>
        @endforelse
    </div>
    {{ $items->links() }}
</div>

@endsection