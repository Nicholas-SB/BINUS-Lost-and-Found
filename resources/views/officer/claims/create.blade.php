@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $item->name }}</h1>
        <img src="{{ asset('storage/' . $item->photo_path) }}" class="img-fluid" style="max-width: 300px">

        <form method='POST' action="{{ route('officer.claims.store', $item) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ __('officer.claimant_name') }}</label>
                <input type="text" name="claimant_name" value="{{ old('claimant_name') }}" class="form-control @error('claimant_name') is-invalid @enderror">
                @error('claimant_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ __('officer.email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ __('officer.phone') }}</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('officer.nim') }}</label>
                <input type="text" name="nim" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror">
                @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">{{ __('officer.record_claim') }}</button>
        </form>
    </div>
@endsection 