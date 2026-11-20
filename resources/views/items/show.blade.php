@extends('layouts.app')
@section('content')
<div class='container py-4'>
    @auth
        <a href="{{ route('officer.dashboard') }}">Back to dashboard</a>
    @else
        <a href="{{ route('items.index') }}">Back to list</a>
    @endauth

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
                    <p><strong>Date found: </strong>{{ $item->date_found->format('l, d M Y') }}</p>

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
                                {{-- TODO: Cancel Claim button --}}
                            @endif

                            {{-- TODO: Edit Item button --}}
                            {{-- TODO: Delete Item button --}}
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection