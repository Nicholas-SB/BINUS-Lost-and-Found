{{-- Shared item filters: search, category, date range. Used inside a <form> on the public list and officer dashboard. --}}
{{-- Text filter --}}
<div class="col-12">
    <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="{{ __('site.search_placeholder') }}">
</div>

{{-- Category filter --}}
<div class="col-md-3">
    <select name="category" class="form-select">
        <option value="">{{ __('site.all_categories') }}</option>
        @foreach (['Electronics', 'Bottles', 'Clothing', 'Accessories', 'Documents', 'Other'] as $cat)
            <option value="{{ $cat }}" @selected(request('category') === $cat)>{{ __('site.categories.' . $cat) }}</option>
        @endforeach
    </select>
</div>

{{-- Date filter --}}
<div class="col-md-2">
    <label class="form-label small mb-0">{{ __('site.from') }}</label>
    <input type="date" name="from" value="{{ request('from') }}" max="{{ date('Y-m-d') }}" class="form-control">
</div>

<div class="col-md-2">
    <label class="form-label small mb-0">{{ __('site.to') }}</label>
    <input type="date" name="to" value="{{ request('to', date('Y-m-d')) }}" max="{{ date('Y-m-d') }}" class="form-control">
</div>
