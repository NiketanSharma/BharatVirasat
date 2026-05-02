@extends('layouts.app')

@section('title', __('ui.app_name') . ' — ' . __('ui.app_tagline'))

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(139, 0, 0, 0.85), rgba(62, 39, 35, 0.9)),
                    url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1600') center/cover no-repeat;
        min-height: 75vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23DAA520' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 0;
    }

    .hero-content { position: relative; z-index: 1; }

    .hero-section h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        text-shadow: 2px 4px 10px rgba(0,0,0,0.3);
    }

    .hero-section p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 650px;
    }

    .hero-search {
        max-width: 550px;
        margin: 0 auto;
    }

    .hero-search .form-control {
        border-radius: 30px 0 0 30px;
        padding: 0.75rem 1.5rem;
        border: 2px solid var(--gold);
        font-size: 1rem;
    }

    .hero-search .btn {
        border-radius: 0 30px 30px 0;
        padding: 0.75rem 1.8rem;
    }

    .categories-section {
        margin-top: -40px;
        position: relative;
        z-index: 10;
    }

    .categories-card {
        background: #fff;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .cat-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
        border-radius: 16px;
        background: var(--ivory-warm);
        border: 2px solid transparent;
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--dark-brown);
        min-width: 100px;
    }

    .cat-btn:hover {
        border-color: var(--saffron);
        background: #fff;
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(255, 153, 51, 0.15);
        color: var(--saffron-dark);
    }

    .cat-btn .cat-icon {
        font-size: 2rem;
    }

    .cat-btn .cat-label {
        font-weight: 600;
        font-size: 0.85rem;
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center hero-content">
            <div class="animate-in">
                <div class="ornament mx-auto mb-4" style="width: 80px;"></div>
                <h1 class="mb-3">{{ __('ui.hero_title') }}</h1>
                <p class="mx-auto mb-4">{{ __('ui.hero_subtitle') }}</p>
                <div class="hero-search mx-auto">
                    <form action="{{ route('heritage.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('ui.search_placeholder') }}" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-saffron">
                            <i class="bi bi-search me-1"></i>{{ __('ui.search_btn') }}
                        </button>
                    </form>
                </div>
                <div class="mt-4">
                    <a href="{{ route('heritage.index') }}" class="btn btn-gold btn-lg px-4">
                        <i class="bi bi-compass me-2"></i>{{ __('ui.hero_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="categories-card">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('heritage.index') }}" class="cat-btn">
                        <span class="cat-icon">🇮🇳</span>
                        <span class="cat-label">{{ __('ui.all_categories') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'festival']) }}" class="cat-btn">
                        <span class="cat-icon">🎆</span>
                        <span class="cat-label">{{ __('ui.category_festival') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'dance']) }}" class="cat-btn">
                        <span class="cat-icon">💃</span>
                        <span class="cat-label">{{ __('ui.category_dance') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'art']) }}" class="cat-btn">
                        <span class="cat-icon">🎨</span>
                        <span class="cat-label">{{ __('ui.category_art') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'cuisine']) }}" class="cat-btn">
                        <span class="cat-icon">🍛</span>
                        <span class="cat-label">{{ __('ui.category_cuisine') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'monument']) }}" class="cat-btn">
                        <span class="cat-icon">🏛️</span>
                        <span class="cat-label">{{ __('ui.category_monument') }}</span>
                    </a>
                    <a href="{{ route('heritage.index', ['category' => 'music']) }}" class="cat-btn">
                        <span class="cat-icon">🎵</span>
                        <span class="cat-label">{{ __('ui.category_music') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Heritage Items -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('ui.featured_title') }}</h2>
                <p class="section-subtitle">{{ __('ui.featured_subtitle') }}</p>
            </div>

            <div class="row g-4">
                @forelse($featured as $index => $item)
                    <div class="col-md-6 col-lg-4 animate-in delay-{{ $index + 1 }}">
                        <div class="heritage-card card">
                            <div class="card-img-wrapper">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->name }}">
                                @else
                                    <div class="card-img-placeholder bg-{{ ['warning', 'danger', 'info', 'success', 'primary', 'secondary'][$index % 6] }} bg-opacity-10">
                                        <span class="cat-icon-{{ $item->category }}"></span>
                                    </div>
                                @endif
                                <div class="category-overlay">
                                    <span class="badge badge-category">{{ ucfirst($item->category) }}</span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-1" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">
                                    {{ $item->name }}
                                </h5>
                                <span class="badge badge-state mb-2 align-self-start">
                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $item->state }}
                                </span>
                                <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem;">
                                    {{ Str::limit($item->short_desc, 120) }}
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
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
