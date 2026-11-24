@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ __('officer.log_item_title') }}</h1>
    <form method="POST" action="{{ route('officer.items.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('officer.name') }}</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.description') }}</label>
            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.category') }}</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror">
                <option value="">{{ __('officer.choose') }}</option>
                @foreach (['Electronics', 'Bottles', 'Clothing', 'Accessories', 'Documents', 'Other'] as $cat)
                <option value="{{ $cat }}" @selected(old('category') === $cat)>{{ __('site.categories.' . $cat) }}</option>
                @endforeach
            </select>
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.location_found') }}</label>
            <input type="text" name="location_found" value="{{ old('location_found') }}" class="form-control @error('location_found') is-invalid @enderror">
            @error('location_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.date_found') }}</label>
            <input type="date" name="date_found" value="{{ old('date_found', date('Y-m-d')) }}" class="form-control @error('date_found') is-invalid @enderror">
            @error('date_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.photo') }}</label>
            <input type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">{{ __('officer.save_item') }}</button>
    </form>
</div>
@endsection