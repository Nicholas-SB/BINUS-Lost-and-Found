@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h1>How to Claim an Item?</h1>
        <ol>
            <li class="mb-4">Find your item on the list & note its name, location, and date found.
                <img src="{{ asset('images/step1.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 700px;"></li>
            <li class="mb-4">
                Prepare a printed Black & White copy of your BINUSIAN card and a receipt of the lost item.
                <img src="{{ asset('images/step2.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 500px;">
                <p class="mt-2 mb-0 text-muted">Not a Binusian? Bring a copy of another valid government-issued ID.</p>
            </li>
            <li class="mb-4">
                Go to the Lost & Found receptionist in the lobby.
                <img src="{{ asset('images/step3.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 500px;">
            </li>
            <li class="mb-4">Ask the officer to claim your item.</li>
            <li class="mb-4">Sign the printed claim slip the officer prints for you.</li>
        </ol>
    </div>
@endsection