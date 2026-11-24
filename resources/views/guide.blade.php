@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <h1 class="mb-4">{{ __('site.guide_title') }}</h1>

        <div class="row g-5">
            {{-- Claim steps --}}
            <div class="col-lg-7">
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

            {{-- FAQ --}}
            <div class="col-lg-5">
                <h2 class="h4 mb-3">{{ __('site.faq_title') }}</h2>
                <div class="accordion" id="faq">
                    @foreach (['not_listed', 'how_long', 'bm_location', 'non_binusian', 'hours'] as $key)
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $key }}">
                                    {{ __('site.faq_' . $key . '_q') }}
                                </button>
                            </h3>
                            <div id="faq-{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body text-muted">
                                    {{ __('site.faq_' . $key . '_a') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
