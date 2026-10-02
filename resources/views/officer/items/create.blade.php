@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Log a found item</h1>
    <form method="POST" action="{{ route('officer.items.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror">
                <option value="">Choose...</option>
                @foreach (['Electronics', 'Bottles', 'Clothing', 'Accessories', 'Documents', 'Other'] as $cat)
                <option value="{{ $cat }}" @selected(old('category') === $cat)>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Location found</label>
            <input type="text" name="location_found" value="{{ old('location_found') }}" class="form-control @error('location_found') is-invalid @enderror">
            @error('location_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date found</label>
            <input type="date" name="date_found" value="{{ old('date_found', date('Y-m-d')) }}" class="form-control @error('date_found') is-invalid @enderror">
            @error('date_found') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Save item</button>
    </form>
</div>
@endsection