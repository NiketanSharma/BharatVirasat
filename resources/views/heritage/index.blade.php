@extends('layouts.app')

@section('title', __('ui.directory_title') . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .directory-hero {
        background: linear-gradient(135deg, rgba(109,0,0,0.92), rgba(44,30,22,0.88)),
                    url('https://images.unsplash.com/photo-1599661046289-e31897846e41?w=1600') center/cover no-repeat;
        padding: 5rem 0 6rem;
        text-align: center;
        position: relative;
    }

    .directory-hero::after {
        content: '';
        position: absolute;
        bottom: -2px; left: 0; right: 0;
        height: 60px;
        background: var(--ivory-warm);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .directory-hero h1 {
        color: #fff !important;
        font-size: 3rem;
        text-shadow: 0 3px 15px rgba(0,0,0,0.3);
    }

    .directory-hero p {
        color: rgba(255,255,255,0.85);
        font-size: 1.1rem;
    }

    .filter-card {
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(15px);
        box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        border: 1px solid rgba(255,255,255,0.6);
        margin-top: -40px;
        position: relative;
        z-index: 10;
    }

    .results-count {
        font-size: 0.95rem;
        color: var(--warm-gray);
        padding: 0.5rem 0;
    }

    .results-count strong {
        color: var(--saffron-dark);
    }

    /* View toggle */
    .view-toggle .btn {
        border: 1px solid rgba(197,160,89,0.3);
        color: var(--warm-gray);
        padding: 0.4rem 0.8rem;
        transition: all 0.3s ease;
    }

    .view-toggle .btn.active {
        background: var(--saffron);
        color: #fff;
        border-color: var(--saffron);
    }

    /* Empty state */
    .empty-state {
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--gold);
        display: block;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
    <!-- Directory Hero -->
    <div class="directory-hero" data-aos="fade-in">
        <div class="container">
            <h1 class="section-title mb-2" data-aos="fade-up">{{ __('ui.directory_title') }}</h1>
            <p data-aos="fade-up" data-aos-delay="100">{{ __('ui.directory_subtitle') }}</p>
        </div>
    </div>

    <div class="container pb-5">
        <!-- Filters -->
        <div class="filter-card card border-0 mb-4" data-aos="fade-up" data-aos-delay="200">
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
                    <div class="col-md-2 d-flex gap-2">
                        <button type="submit" class="btn btn-saffron flex-grow-1">
                            <i class="bi bi-filter me-1"></i>{{ __('ui.filter_btn') }}
                        </button>
                        @if(request()->hasAny(['category', 'state', 'search']))
                            <a href="{{ route('heritage.index') }}" class="btn btn-outline-secondary" style="border-radius: 12px;" title="Clear filters">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Results count -->
        <div class="results-count mb-3 d-flex justify-content-between align-items-center" data-aos="fade-up">
            <span>Showing <strong>{{ $items->count() }}</strong> heritage items</span>
        </div>

        <!-- Results Grid -->
        <div class="row g-4">
            @forelse($items as $index => $item)
                <div class="col-md-6 col-lg-4 col-xl-3" data-aos="fade-up" data-aos-delay="{{ 80 * ($index % 8 + 1) }}">
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
                <div class="col-12">
                    <div class="empty-state text-center">
                        <i class="bi bi-search"></i>
                        <h4 style="color: var(--deep-red);">No items found</h4>
                        <p class="text-muted mb-4">{{ __('ui.no_items') }}</p>
                        <a href="{{ route('heritage.index') }}" class="btn btn-saffron px-4" style="border-radius: 25px;">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>{{ __('ui.all_categories') }}
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
