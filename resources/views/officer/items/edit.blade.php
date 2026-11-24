@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ __('officer.edit_item_title') }}</h1>
    <form method="POST" action="{{ route('officer.items.update', $item) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">{{ __('officer.name') }}</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.description') }}</label>
            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.category') }}</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror">
                <option value="">{{ __('officer.choose') }}</option>
                @foreach (['Electronics', 'Bottles', 'Clothing', 'Accessories', 'Documents', 'Other'] as $cat)
                <option value="{{ $cat }}" @selected(old('category', $item->category) === $cat)>{{ __('site.categories.' . $cat) }}</option>
                @endforeach
            </select>
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.location_found') }}</label>
            <input type="text" name="location_found" value="{{ old('location_found', $item->location_found) }}" class="form-control @error('location_found') is-invalid @enderror">
            @error('location_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.date_found') }}</label>
            <input type="date" name="date_found" value="{{ old('date_found', $item->date_found->format('Y-m-d')) }}" class="form-control @error('date_found') is-invalid @enderror">
            @error('date_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('officer.photo') }}</label>
            <img src="{{ asset('storage/' . $item->photo_path) }}" class="rounded mb-2 d-block" style="height: 120px;">
            <input type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
            <div class="form-text">{{ __('officer.keep_photo_hint') }}</div>
            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">{{ __('officer.save_changes') }}</button>
    </form>
</div>
@endsection