@extends('layouts.app')

@section('title', __('ui.app_name') . ' — ' . __('ui.app_tagline'))

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(44, 30, 22, 0.8), rgba(109, 0, 0, 0.75)),
                    url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1600') center/cover no-repeat fixed;
        min-height: 80vh;
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
        font-size: 4rem;
        font-weight: 800;
        color: #fff;
        text-shadow: 0 4px 15px rgba(0,0,0,0.4);
        letter-spacing: 1px;
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
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 24px;
        padding: 2.5rem 2rem;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
    }

    .cat-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.8rem;
        padding: 1.2rem;
        border-radius: 20px;
        background: rgba(255, 253, 249, 0.8);
        border: 1px solid rgba(197, 160, 89, 0.2);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        color: var(--dark-brown);
        min-width: 110px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }

    .cat-btn:hover {
        border-color: var(--saffron-light);
        background: linear-gradient(135deg, #ffffff, var(--ivory-warm));
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 12px 25px rgba(255, 123, 0, 0.15);
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
            <div>
                <div class="ornament mx-auto mb-4" style="width: 80px;" data-aos="zoom-in" data-aos-duration="1000"></div>
                <h1 class="mb-3" data-aos="fade-up" data-aos-delay="100">{{ __('ui.hero_title') }}</h1>
                <p class="mx-auto mb-4" data-aos="fade-up" data-aos-delay="200">{{ __('ui.hero_subtitle') }}</p>
                <div class="hero-search mx-auto" data-aos="fade-up" data-aos-delay="300">
                    <form action="{{ route('heritage.index') }}" method="GET" class="d-flex shadow-lg" style="border-radius: 30px;">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('ui.search_placeholder') }}" value="{{ request('search') }}" style="background: rgba(255,255,255,0.95);">
                        <button type="submit" class="btn btn-saffron">
                            <i class="bi bi-search me-1"></i>{{ __('ui.search_btn') }}
                        </button>
                    </form>
                </div>
                <div class="mt-5" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('heritage.index') }}" class="btn btn-gold btn-lg px-5 shadow-lg" style="border-radius: 30px;">
                        <i class="bi bi-compass me-2"></i>{{ __('ui.hero_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="categories-card" data-aos="fade-up" data-aos-delay="500">
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
    <section class="py-5 mt-4">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">{{ __('ui.featured_title') }}</h2>
                <p class="section-subtitle">{{ __('ui.featured_subtitle') }}</p>
            </div>

            <div class="row g-4">
                @forelse($featured as $index => $item)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
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
