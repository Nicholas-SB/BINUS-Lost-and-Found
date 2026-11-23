@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h1>{{ __('site.guide_title') }}</h1>
        <ol>
            <li class="mb-4">{{ __('site.guide_step1') }}
                <img src="{{ asset('images/step1.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 700px;"></li>
            <li class="mb-4">
                {{ __('site.guide_step2') }}
                <img src="{{ asset('images/step2.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 500px;">
                <p class="mt-2 mb-0 text-muted">{{ __('site.guide_non_binusian') }}</p>
            </li>
            <li class="mb-4">
                {{ __('site.guide_step3') }}
                <img src="{{ asset('images/step3.jpg') }}" class="img-fluid d-block mt-2 rounded border-3 img-thumbnail" style="max-width: 500px;">
            </li>
            <li class="mb-4">{{ __('site.guide_step4') }}</li>
            <li class="mb-4">{{ __('site.guide_step5') }}</li>
        </ol>
    </div>
@endsection