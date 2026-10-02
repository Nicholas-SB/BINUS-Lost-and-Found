@extends('layouts.app')
@section('content')

<div class='container'>
    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @endif

    @if ($overdue->isNotEmpty())
        <h2>Transfer to Business Management</h2>    
        <table class='table'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Found</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($overdue as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->date_found->format('l, d M Y') }}</td>
                        <td>
                            <form method='POST' action="{{ route('officer.items.transfer', $item) }}">
                                @csrf
                                @method('PATCH')
                                <button class='btn btn-warning btn-sm'>Transfer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{ $items->onEachSide(3)->links() }}
    <table class='table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date Found</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->date_found->format('l, d M Y') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if ($item->status != 'claimed')
                            <a href="{{ route('officer.claims.create', $item) }}">Record Claim</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->onEachSide(3)->links() }}
</div>

@endsection