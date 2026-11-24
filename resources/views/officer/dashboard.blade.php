@extends('layouts.app')
@section('content')

<div class='container'>
    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @elseif (session('error'))
        <div class='alert alert-danger'>{{ session('error') }}</div>
    @endif

    {{-- Filters --}}
    <form method="GET" action="{{ route('officer.dashboard') }}" class="row g-2 mb-3 align-items-end">
        @include('partials.item-filters')

        {{-- Officer-only: status view --}}
        <div class="col-md-3">
            <label class="form-label small mb-0">{{ __('officer.view') }}</label>
            <select name="view" class="form-select" onchange="this.form.submit()">
                <option value="">{{ __('officer.view_all') }}</option>
                <option value="unclaimed" @selected(request('view') === 'unclaimed')>{{ __('officer.view_unclaimed') }}</option>
                <option value="claimed" @selected(request('view') === 'claimed')>{{ __('officer.view_claimed') }}</option>
                <option value="transfer" @selected(request('view') === 'transfer')>{{ __('officer.view_transfer') }}</option>
                <option value="transferred" @selected(request('view') === 'transferred')>{{ __('officer.view_transferred') }}</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">{{ __('site.search') }}</button>
        </div>
    </form>

    {{ $items->onEachSide(3)->links() }}
    <table class='table table-sm align-middle'>
        <thead>
            <tr>
                <th>{{ __('officer.image') }}</th>
                <th>{{ __('officer.name') }}</th>
                <th>{{ __('officer.location') }}</th>
                <th>{{ __('officer.date_found') }}</th>
                <th>{{ __('officer.status') }}</th>
                <th>{{ __('officer.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><img src="{{ asset('storage/' . $item->photo_path) }}" class="rounded" style="height: 60px; width: 60px; object-fit: cover;"></td>
                    <td><a href="{{ route('items.show', $item) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->location_found }}</td>
                    <td>{{ $item->date_found->translatedFormat('l, d M Y') }}</td>
                    <td>
                        @switch($item->status)
                            @case('unclaimed')
                                <span class="badge text-bg-secondary">{{ __('officer.status_unclaimed') }}</span>
                                @break
                            @case('transferred')
                                <span class="badge text-bg-warning">{{ __('officer.status_transferred') }}</span>
                                @break
                            @case('claimed')
                                <span class="badge text-bg-success">{{ __('officer.status_claimed') }}</span>
                                @break
                            @default
                                <span class="badge text-bg-light border">{{ $item->status }}</span>
                        @endswitch
                    </td>
                    <td>
                        @if ($item->status != 'claimed')
                            <a href="{{ route('officer.claims.create', $item) }}" class="btn btn-primary btn-sm">{{ __('officer.record_claim') }}</a>
                        @endif

                        @if ($item->status === 'unclaimed' && $item->date_found->lt(now()->subWeek()))
                            <form method="POST" action="{{ route('officer.items.transfer', $item) }}" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-warning btn-sm">{{ __('officer.transfer') }}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->onEachSide(3)->links() }}
</div>

@endsection