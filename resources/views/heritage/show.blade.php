@extends('layouts.app')

@section('title', $item->name . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .detail-hero {
        background: linear-gradient(135deg, rgba(109, 0, 0, 0.92), rgba(44, 30, 22, 0.88));
        padding: 3rem 0 4rem;
        position: relative;
    }

    .detail-hero::after {
        content: '';
        position: absolute;
        bottom: -2px; left: 0; right: 0;
        height: 50px;
        background: var(--ivory-warm);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .detail-hero .breadcrumb-custom a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .detail-hero .breadcrumb-custom a:hover { color: var(--gold-light); }

    .detail-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .detail-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .detail-image:hover img {
        transform: scale(1.03);
    }

    .detail-image-placeholder {
        width: 100%;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        background: linear-gradient(135deg, var(--ivory-warm), var(--cream));
        border-radius: 20px;
    }

    .detail-content {
        background: #fff;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }

    .detail-meta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--ivory-warm), var(--cream));
        font-weight: 500;
        font-size: 0.9rem;
        border: 1px solid rgba(197,160,89,0.15);
        transition: all 0.3s ease;
    }

    .meta-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .long-desc {
        font-size: 1.05rem;
        line-height: 1.95;
        color: #444;
        white-space: pre-line;
    }

    .fav-btn {
        border-radius: 14px;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .fav-btn:hover {
        transform: translateY(-3px) scale(1.02);
    }

    .share-btn {
        width: 42px; height: 42px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,0,0,0.05);
        color: var(--warm-gray);
        border: none;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .share-btn:hover {
        background: var(--saffron);
        color: #fff;
        transform: translateY(-2px);
    }
</style>
@endsection

@section('content')
    <!-- Hero breadcrumb bar -->
    <div class="detail-hero">
        <div class="container">
            <div class="breadcrumb-custom" data-aos="fade-right">
                <a href="{{ route('home') }}"><i class="bi bi-house me-1"></i>Home</a>
                <span style="color: rgba(255,255,255,0.4); margin: 0 0.5rem;">›</span>
                <a href="{{ route('heritage.index') }}">Heritage</a>
                <span style="color: rgba(255,255,255,0.4); margin: 0 0.5rem;">›</span>
                <span style="color: var(--gold-light);">{{ Str::limit($item->name, 30) }}</span>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -2rem; position: relative; z-index: 5;">
        <div class="row g-4">
            <!-- Image Column -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="detail-image">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
                    @else
                        <div class="detail-image-placeholder">
                            <span class="cat-icon-{{ $item->category }}"></span>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="mt-3 d-flex gap-2">
                    <div class="flex-grow-1">
                        @if(in_array($item->id, $favourites))
                            <button class="btn btn-gold w-100 fav-btn" disabled>
                                <i class="bi bi-heart-fill me-2"></i>{{ __('ui.fav_added') }}
                            </button>
                        @else
                            <form action="{{ route('favourites.add', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-saffron w-100 fav-btn">
                                    <i class="bi bi-heart me-2"></i>{{ __('ui.fav_add') }}
                                </button>
                            </form>
                        @endif
                    </div>
                    <button class="share-btn" onclick="navigator.share ? navigator.share({title: '{{ $item->name }}', url: window.location.href}) : navigator.clipboard.writeText(window.location.href).then(() => alert('Link copied!'))" title="Share">
                        <i class="bi bi-share"></i>
                    </button>
                </div>
            </div>

            <!-- Details Column -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="detail-content">
                    <h1 style="font-size: 2.2rem; margin-bottom: 1rem;">{{ $item->name }}</h1>

                    <div class="detail-meta">
                        <div class="meta-item">
                            <i class="bi bi-tag-fill" style="color: var(--saffron);"></i>
                            <span>{{ __('ui.detail_category') }}:</span>
                            <span class="badge badge-category">{{ ucfirst($item->category) }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-geo-alt-fill" style="color: var(--deep-red);"></i>
                            <span>{{ __('ui.detail_state') }}:</span>
                            <strong>{{ $item->state }}</strong>
                        </div>
                    </div>

                    <hr style="border-color: var(--gold); opacity: 0.2;">

                    <h5 class="mb-3">
                        <i class="bi bi-book me-2" style="color: var(--saffron);"></i>{{ __('ui.detail_description') }}
                    </h5>

                    <div class="long-desc">
                        {{ $item->long_desc }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Items -->
        @if($related->count() > 0)
            <div class="mt-5 pt-3">
                <h3 class="section-title text-center mb-4" data-aos="fade-up">{{ __('ui.related_title') }}</h3>
                <div class="row g-4">
                    @foreach($related as $index => $rel)
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                            <div class="heritage-card card">
                                <div class="card-img-wrapper">
                                    @if($rel->image_path)
                                        <img src="{{ asset('storage/' . $rel->image_path) }}" class="card-img-top" alt="{{ $rel->name }}">
                                    @else
                                        <div class="card-img-placeholder bg-light">
                                            <span class="cat-icon-{{ $rel->category }}"></span>
                                        </div>
                                    @endif
                                    <div class="category-overlay">
                                        <span class="badge badge-category">{{ ucfirst($rel->category) }}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 style="font-family: 'Playfair Display', serif; color: var(--deep-red);">{{ $rel->name }}</h6>
                                    <span class="badge badge-state mb-2">
                                        <i class="bi bi-geo-alt-fill me-1"></i>{{ $rel->state }}
                                    </span>
                                    <p class="card-text text-muted" style="font-size: 0.82rem;">
                                        {{ Str::limit($rel->short_desc, 80) }}
                                    </p>
                                    <a href="{{ route('heritage.show', $rel->id) }}" class="btn btn-heritage btn-sm">
                                        {{ __('ui.know_more') }} <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
