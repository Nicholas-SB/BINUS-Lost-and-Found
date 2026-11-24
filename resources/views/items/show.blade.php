@extends('layouts.app')
@section('content')
<div class='container py-4'>
    @auth
        <a href="{{ route('officer.dashboard') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> {{ __('officer.back_to_dashboard') }}</a>
    @else
        <a href="{{ route('items.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> {{ __('site.back_to_list') }}</a>
    @endauth

    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @elseif (session('error'))
        <div class='alert alert-danger'>{{ session('error') }}</div>
    @endif

    <div class="card mt-3">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $item->photo_path) }}" class="w-100 rounded-start" style="height: 400px; object-fit: contain; background-color: #212529;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h1 class="card-title">{{ $item->name }}</h1>
                    @if ($item->description)
                        <p>{{ $item->description }}</p>
                    @endif

                    <p><strong>{{ __('site.found_at') }}: </strong>{{ $item->location_found }}</p>
                    <p><strong>{{ __('site.date_found') }}: </strong>{{ $item->date_found->translatedFormat('l, d M Y') }}</p>

                    {{-- Officer-only actions (guests never see this block) --}}
                    @auth
                        <hr>
                        <p class="mb-2"><strong>{{ __('officer.status') }}: </strong>{{ __('officer.status_' . $item->status) }}</p>

                        @if ($item->claim)
                            <p class="text-muted small mb-2">
                                {{ __('officer.claimed_by', ['name' => $item->claim->claimant_name, 'date' => $item->claim->claimed_at->translatedFormat('d M Y, H:i')]) }}
                            </p>
                        @endif

                        <div class="d-flex flex-wrap gap-2">
                            @if ($item->status !== 'claimed')
                                <a href="{{ route('officer.claims.create', $item) }}" class="btn btn-primary btn-sm">{{ __('officer.record_claim') }}</a>
                            @else
                                <a href="{{ route('officer.claims.print', $item->claim) }}" class="btn btn-outline-secondary btn-sm">{{ __('officer.reprint_slip') }}</a>
                                <form method="POST" action="{{ route('officer.claims.destroy', $item->claim) }}" class="d-inline" onsubmit="return confirm(@js(__('officer.confirm_cancel_claim')))">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-primary btn-sm">{{ __('officer.cancel_claim') }}</button>
                                </form>
                            @endif

                            <a href="{{ route('officer.items.edit', $item) }}" class="btn btn-outline-primary btn-sm">{{ __('officer.edit') }}</a>
                            <form method="POST" action="{{ route('officer.items.destroy', $item) }}" class="d-inline" onsubmit="return confirm(@js(__('officer.confirm_delete')))">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">{{ __('officer.delete') }}</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection