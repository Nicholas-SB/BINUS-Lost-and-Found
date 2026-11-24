@extends('layouts.app')
@section('content')

<div class="container py-4">
    <h1 class="mb-3">{{ __('site.items') }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('items.index') }}" class="row g-2 mb-0 align-items-end">
                @include('partials.item-filters')

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">{{ __('site.search') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse ($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <a href="{{ route('items.show', $item) }}" class="stretched-link"></a>
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-1">
                            <h5 class="mb-0">{{ $item->name }}</h5>
                            <span class="badge text-bg-light border">{{ __('site.categories.' . $item->category) }}</span>
                        </div>
                        <p class="text-muted mb-0">{{ $item->location_found }} - {{ $item->date_found->translatedFormat('l, d M Y') }}</p>
                    </div>
                </div>
            </div>
        @empty
            {{-- Keep col-12 in case we put layout classes l8er --}}
            <div class="col-12">
                <h5>{{ __('site.no_items') }}</h5>
            </div>
        @endforelse
    </div>
    {{ $items->links() }}
</div>

@endsection