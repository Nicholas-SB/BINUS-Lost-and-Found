@extends('layouts.app')
@section('content')
<div class='container py-4'>
    @auth
        <a href="{{ route('officer.dashboard') }}">Back to dashboard</a>
    @else
        <a href="{{ route('items.index') }}">{{ __('site.back_to_list') }}</a>
    @endauth

    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @elseif (session('error'))
        <div class='alert alert-danger'>{{ session('error') }}</div>
    @endif

    <div class="card mt-3">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $item->photo_path) }}" class="w-100 rounded-start" style="height: 400px; object-fit: contain;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h1 class="card-title">{{ $item->name }}</h1>
                    <p>{{ $item->description ?? '-' }}</p>

                    <p><strong>{{ __('site.found_at') }}: </strong>{{ $item->location_found }}</p>
                    <p><strong>{{ __('site.date_found') }}: </strong>{{ $item->date_found->translatedFormat('l, d M Y') }}</p>

                    {{-- Officer-only actions (guests never see this block) --}}
                    @auth
                        <hr>
                        <p class="mb-2"><strong>Status: </strong>{{ $item->status }}</p>

                        @if ($item->claim)
                            <p class="text-muted small mb-2">
                                Claimed by {{ $item->claim->claimant_name }} on {{ $item->claim->claimed_at->format('d M Y, H:i') }}
                            </p>
                        @endif

                        <div class="d-flex flex-wrap gap-2">
                            @if ($item->status !== 'claimed')
                                <a href="{{ route('officer.claims.create', $item) }}" class="btn btn-primary btn-sm">Record Claim</a>
                            @else
                                <a href="{{ route('officer.claims.print', $item->claim) }}" class="btn btn-outline-secondary btn-sm">Reprint Claim Slip</a>
                                <form method="POST" action="{{ route('officer.claims.destroy', $item->claim) }}" class="d-inline" onsubmit="return confirm('Cancel this claim?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-primary btn-sm">Cancel Claim</button>
                                </form>
                            @endif

                            <a href="{{ route('officer.items.edit', $item) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('officer.items.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Delete this item? This cannot be undone')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection