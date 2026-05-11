@extends('layouts.app')

@section('title', __('ui.app_name') . ' — ' . __('ui.app_tagline'))

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(44, 30, 22, 0.88), rgba(109, 0, 0, 0.82)),
                    url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1600') center/cover no-repeat fixed;
        min-height: 92vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    /* Animated particles */
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23DAA520' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 0;
        animation: patternDrift 20s linear infinite;
    }

    @keyframes patternDrift {
        0% { transform: translate(0, 0); }
        100% { transform: translate(60px, 60px); }
    }

    /* Bottom wave */
    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -2px; left: 0; right: 0;
        height: 80px;
        background: var(--ivory-warm);
        clip-path: ellipse(55% 100% at 50% 100%);
        z-index: 2;
    }

    .hero-content { position: relative; z-index: 1; }

    .hero-section h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.2rem;
        font-weight: 800;
        color: #fff;
        text-shadow: 0 4px 20px rgba(0,0,0,0.4);
        letter-spacing: 1px;
        line-height: 1.15;
    }

    .hero-section h1 .highlight {
        background: linear-gradient(135deg, var(--gold-light), var(--saffron-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-section p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.88);
        max-width: 650px;
        line-height: 1.7;
    }

    .hero-search {
        max-width: 550px;
        margin: 0 auto;
    }

    .hero-search .form-control {
        border-radius: 30px 0 0 30px;
        padding: 0.85rem 1.5rem;
        border: 2px solid rgba(197, 160, 89, 0.5);
        font-size: 1rem;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(5px);
    }

    .hero-search .form-control:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(197,160,89,0.2);
    }

    .hero-search .btn {
        border-radius: 0 30px 30px 0;
        padding: 0.85rem 2rem;
    }

    /* Floating particles */
    .particle {
        position: absolute;
        border-radius: 50%;
        background: rgba(218, 165, 32, 0.15);
        animation: particleFloat 6s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes particleFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
        50% { transform: translateY(-40px) rotate(180deg); opacity: 0.7; }
    }

    /* Stats Section */
    .stats-section {
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }

    .stats-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.8);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
    }

    /* Categories Section */
    .categories-section {
        padding: 4rem 0 2rem;
    }

    .cat-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.8rem;
        padding: 1.4rem 1.2rem;
        border-radius: 20px;
        background: rgba(255, 253, 249, 0.9);
        border: 1px solid rgba(197, 160, 89, 0.15);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        color: var(--dark-brown);
        min-width: 120px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        position: relative;
        overflow: hidden;
    }

    .cat-btn::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--saffron), var(--gold));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .cat-btn:hover::after { transform: scaleX(1); }

    .cat-btn:hover {
        border-color: var(--saffron-light);
        background: linear-gradient(135deg, #ffffff, var(--ivory-warm));
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 15px 35px rgba(255, 123, 0, 0.15);
        color: var(--saffron-dark);
    }

    .cat-btn .cat-icon { font-size: 2.2rem; }
    .cat-btn .cat-label { font-weight: 600; font-size: 0.85rem; }

    /* Featured section */
    .featured-section {
        padding: 4rem 0 3rem;
        background: linear-gradient(180deg, var(--ivory-warm) 0%, var(--cream) 100%);
    }

    /* CTA Banner */
    .cta-banner {
        background: linear-gradient(135deg, var(--deep-red) 0%, var(--dark-brown) 100%);
        border-radius: 24px;
        padding: 3.5rem;
        position: relative;
        overflow: hidden;
        color: #fff;
    }

    .cta-banner::before {
        content: '';
        position: absolute;
        top: -50%; right: -20%;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(255,123,0,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    @media (max-width: 768px) {
        .hero-section h1 { font-size: 2.2rem !important; }
        .hero-section { min-height: 75vh; }
        .cta-banner { padding: 2rem; }
        .stat-number { font-size: 2rem; }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Floating particles -->
        <div class="particle" style="width:12px;height:12px;top:15%;left:10%;animation-delay:0s;"></div>
        <div class="particle" style="width:8px;height:8px;top:25%;right:15%;animation-delay:1s;"></div>
        <div class="particle" style="width:15px;height:15px;top:60%;left:20%;animation-delay:2s;"></div>
        <div class="particle" style="width:10px;height:10px;top:70%;right:25%;animation-delay:3s;"></div>
        <div class="particle" style="width:6px;height:6px;top:40%;left:75%;animation-delay:4s;"></div>

        <div class="container text-center hero-content">
            <div>
                <div class="ornament mx-auto mb-4" style="width: 80px;" data-aos="zoom-in" data-aos-duration="1000"></div>
                <h1 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                    {{ __('ui.hero_title') }}
                </h1>
                <p class="mx-auto mb-4" data-aos="fade-up" data-aos-delay="200">{{ __('ui.hero_subtitle') }}</p>
                <div class="hero-search mx-auto" data-aos="fade-up" data-aos-delay="300">
                    <form action="{{ route('heritage.index') }}" method="GET" class="d-flex shadow-lg" style="border-radius: 30px;">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('ui.search_placeholder') }}" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-saffron">
                            <i class="bi bi-search me-1"></i>{{ __('ui.search_btn') }}
                        </button>
                    </form>
                </div>
                <div class="mt-5 d-flex justify-content-center gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('heritage.index') }}" class="btn btn-gold btn-lg px-5 shadow-lg" style="border-radius: 30px;">
                        <i class="bi bi-compass me-2"></i>{{ __('ui.hero_cta') }}
                    </a>
                    <a href="{{ route('trivia.index') }}" class="btn btn-lg px-4 shadow" style="border-radius: 30px; background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(5px);">
                        <i class="bi bi-lightbulb me-2"></i>Play Trivia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-card" data-aos="fade-up" data-aos-delay="200">
                <div class="row text-center">
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="stat-number" data-count="{{ $featured->count() > 0 ? \App\Models\HeritageItem::count() : 0 }}">0</div>
                            <div class="stat-label">Heritage Items</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="stat-number" data-count="6">0</div>
                            <div class="stat-label">Categories</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="stat-number" data-count="{{ $featured->count() > 0 ? \App\Models\HeritageItem::distinct('state')->count('state') : 0 }}">0</div>
                            <div class="stat-label">States Covered</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card">
                            <div class="stat-number" data-count="{{ \App\Models\TriviaQuestion::count() }}">0</div>
                            <div class="stat-label">Trivia Questions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <h2 class="section-title">Explore by Category</h2>
                <p class="section-subtitle">Discover the diverse facets of India's cultural tapestry</p>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3" data-aos="fade-up" data-aos-delay="100">
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
    </section>

    <!-- Featured Heritage Items -->
    <section class="featured-section">
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

            @if($featured->count() > 0)
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('heritage.index') }}" class="btn btn-saffron btn-lg px-5" style="border-radius: 30px;">
                    View All Heritage Items <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="py-5">
        <div class="container">
            <div class="cta-banner" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-7 position-relative" style="z-index:1;">
                        <h2 style="font-family: 'Playfair Display', serif; color: #fff; font-size: 2.2rem; margin-bottom: 1rem;">
                            Test Your Knowledge of Indian Heritage
                        </h2>
                        <p style="color: rgba(255,255,255,0.8); font-size: 1.05rem; margin-bottom: 1.5rem;">
                            Challenge yourself with our heritage trivia quiz. Learn fascinating facts about India's culture, monuments, and traditions.
                        </p>
                        <a href="{{ route('trivia.index') }}" class="btn btn-gold btn-lg px-5" style="border-radius: 30px;">
                            <i class="bi bi-lightning-charge me-2"></i>Start Quiz Now
                        </a>
                    </div>
                    <div class="col-lg-5 text-center d-none d-lg-block position-relative" style="z-index:1;">
                        <div class="animate-float" style="font-size: 8rem; opacity: 0.9;">🏆</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Animated stat counter
    document.addEventListener('DOMContentLoaded', function() {
        const statNumbers = document.querySelectorAll('.stat-number');
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-count')) || 0;
                    let current = 0;
                    const duration = 1500;
                    const step = Math.max(1, Math.floor(target / (duration / 16)));
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = current + (target > 0 ? '+' : '');
                    }, 16);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.5 });
        statNumbers.forEach(el => observer.observe(el));
    });
</script>
@endsection
