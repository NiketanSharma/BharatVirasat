@extends('layouts.app')

@section('title', __('ui.directory_title') . ' — ' . __('ui.app_name'))

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="section-title">{{ __('ui.directory_title') }}</h1>
        <p class="section-subtitle">{{ __('ui.directory_subtitle') }}</p>
    </div>

    <!-- Filters -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <div class="card-body p-4">
            <form action="{{ route('heritage.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-funnel me-1"></i>{{ __('ui.filter_category') }}
                    </label>
                    <select name="category" class="form-select" style="border-radius: 10px;">
                        <option value="">{{ __('ui.filter_all_categories') }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ ucfirst($cat) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-geo-alt me-1"></i>{{ __('ui.filter_state') }}
                    </label>
                    <select name="state" class="form-select" style="border-radius: 10px;">
                        <option value="">{{ __('ui.filter_all_states') }}</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                {{ $state }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-search me-1"></i>{{ __('ui.search_btn') }}
                    </label>
                    <input type="text" name="search" class="form-control" style="border-radius: 10px;"
                           placeholder="{{ __('ui.search_placeholder') }}" value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-saffron w-100">
                        <i class="bi bi-filter me-1"></i>{{ __('ui.filter_btn') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Grid -->
    <div class="row g-4">
        @forelse($items as $index => $item)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="heritage-card card">
                    <div class="card-img-wrapper">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->name }}">
                        @else
                            <div class="card-img-placeholder bg-light">
                                <span class="cat-icon-{{ $item->category }}"></span>
                            </div>
                        @endif
                        <div class="category-overlay">
                            <span class="badge badge-category">{{ ucfirst($item->category) }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title mb-1" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">
                            {{ $item->name }}
                        </h6>
                        <span class="badge badge-state mb-2 align-self-start" style="font-size: 0.7rem;">
                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $item->state }}
                        </span>
                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.82rem;">
                            {{ Str::limit($item->short_desc, 100) }}
                        </p>
                        <a href="{{ route('heritage.show', $item->id) }}" class="btn btn-heritage btn-sm mt-auto align-self-start">
                            {{ __('ui.know_more') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-collection" style="font-size: 3rem; color: var(--gold);"></i>
                <p class="mt-3 text-muted">{{ __('ui.no_items') }}</p>
                <a href="{{ route('heritage.index') }}" class="btn btn-saffron mt-2">
                    {{ __('ui.all_categories') }}
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($items->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $items->links() }}
        </div>
    @endif
</div>
@endsection
