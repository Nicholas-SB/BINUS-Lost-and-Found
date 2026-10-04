@extends('layouts.app')
@section('content')

<div class="container">
    <form method="GET" action="{{ route('items.index') }}" class="mb-4">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Items...">
    </form>

    <h1>Items</h1>
    <div class="row">
        @forelse ($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->date_found->format('l, d M Y') }}</p>
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