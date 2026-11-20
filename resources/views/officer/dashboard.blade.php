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
            <label class="form-label small mb-0">View</label>
            <select name="view" class="form-select" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="unclaimed" @selected(request('view') === 'unclaimed')>Unclaimed</option>
                <option value="claimed" @selected(request('view') === 'claimed')>Claimed</option>
                <option value="transfer" @selected(request('view') === 'transfer')>Viable to Transfer</option>
                <option value="transferred" @selected(request('view') === 'transferred')>Transferred</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    {{ $items->onEachSide(3)->links() }}
    <table class='table table-sm align-middle'>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Location</th>
                <th>Date Found</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><img src="{{ asset('storage/' . $item->photo_path) }}" class="rounded" style="height: 60px; width: 60px; object-fit: cover;"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->location_found }}</td>
                    <td>{{ $item->date_found->format('l, d M Y') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if ($item->status != 'claimed')
                            <a href="{{ route('officer.claims.create', $item) }}" class="btn btn-primary btn-sm">Record Claim</a>
                        @endif

                        @if ($item->status === 'unclaimed' && $item->date_found->lt(now()->subWeek()))
                            <form method="POST" action="{{ route('officer.items.transfer', $item) }}" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-warning btn-sm">Transfer</button>
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