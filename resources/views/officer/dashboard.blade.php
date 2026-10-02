@extends('layouts.app')
@section('content')

<div class='container'>
    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @endif

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
</div>

@endsection