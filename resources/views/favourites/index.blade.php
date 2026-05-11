@extends('layouts.app')

@section('title', __('ui.fav_title') . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .fav-hero {
        background: linear-gradient(135deg, rgba(109,0,0,0.92), rgba(44,30,22,0.88));
        padding: 5rem 0 6rem;
        text-align: center;
        position: relative;
    }

    .fav-hero::after {
        content: '';
        position: absolute;
        bottom: -2px; left: 0; right: 0;
        height: 60px;
        background: var(--ivory-warm);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .fav-hero h1 { color: #fff !important; text-shadow: 0 3px 15px rgba(0,0,0,0.3); }
    .fav-hero p { color: rgba(255,255,255,0.85); font-size: 1.1rem; }

    .empty-fav {
        padding: 5rem 2rem;
        text-align: center;
    }

    .empty-fav-icon {
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(255,123,0,0.08), rgba(197,160,89,0.08));
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: var(--gold);
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('content')
    <!-- Favourites Hero -->
    <div class="fav-hero">
        <div class="container">
            <h1 class="section-title mb-2" data-aos="fade-up">
                <i class="bi bi-heart-fill me-2" style="color: var(--gold-light);"></i>{{ __('ui.fav_title') }}
            </h1>
            <p data-aos="fade-up" data-aos-delay="100">{{ __('ui.fav_subtitle') }}</p>
        </div>
    </div>

<div class="container pb-5" style="margin-top: -30px; position: relative; z-index: 10;">
    @if($items->count() > 0)
        <div class="row g-4">
            @foreach($items as $index => $item)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
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
                            <h5 class="card-title mb-1" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">
                                {{ $item->name }}
                            </h5>
                            <span class="badge badge-state mb-2 align-self-start">
                                <i class="bi bi-geo-alt-fill me-1"></i>{{ $item->state }}
                            </span>
                            <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem;">
                                {{ Str::limit($item->short_desc, 120) }}
                            </p>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('heritage.show', $item->id) }}" class="btn btn-heritage btn-sm">
                                    {{ __('ui.know_more') }} <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                                <form action="{{ route('favourites.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 10px;">
                                        <i class="bi bi-heart-break me-1"></i>{{ __('ui.fav_remove') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-fav" data-aos="fade-up">
            <div class="empty-fav-icon">
                <i class="bi bi-heart"></i>
            </div>
            <h4 style="color: var(--deep-red); margin-bottom: 0.5rem;">No favourites yet</h4>
            <p class="text-muted fs-5 mb-4">{{ __('ui.fav_empty') }}</p>
            <a href="{{ route('heritage.index') }}" class="btn btn-saffron btn-lg px-5" style="border-radius: 30px;">
                <i class="bi bi-compass me-2"></i>{{ __('ui.hero_cta') }}
            </a>
        </div>
    @endif
</div>
@endsection
