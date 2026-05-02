@extends('layouts.app')

@section('title', $item->name . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .detail-hero {
        background: linear-gradient(135deg, rgba(139, 0, 0, 0.9), rgba(62, 39, 35, 0.85));
        padding: 3rem 0;
        margin-bottom: 2rem;
    }

    .detail-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .detail-image img {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
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
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
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
        padding: 0.5rem 1rem;
        border-radius: 12px;
        background: var(--ivory-warm);
        font-weight: 500;
    }

    .long-desc {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #444;
        white-space: pre-line;
    }
</style>
@endsection

@section('content')
    <!-- Back Button Bar -->
    <div class="container pt-4">
        <a href="{{ route('heritage.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius: 20px;">
            <i class="bi bi-arrow-left me-1"></i>{{ __('ui.back_to_directory') }}
        </a>
    </div>

    <div class="container py-4">
        <div class="row g-4">
            <!-- Image Column -->
            <div class="col-lg-5">
                <div class="detail-image">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
                    @else
                        <div class="detail-image-placeholder">
                            <span class="cat-icon-{{ $item->category }}"></span>
                        </div>
                    @endif
                </div>

                <!-- Favourite Button -->
                <div class="mt-3">
                    @if(in_array($item->id, $favourites))
                        <button class="btn btn-gold w-100" disabled style="border-radius: 12px;">
                            <i class="bi bi-heart-fill me-2"></i>{{ __('ui.fav_added') }}
                        </button>
                    @else
                        <form action="{{ route('favourites.add', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-saffron w-100" style="border-radius: 12px;">
                                <i class="bi bi-heart me-2"></i>{{ __('ui.fav_add') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Details Column -->
            <div class="col-lg-7">
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

                    <hr style="border-color: var(--gold); opacity: 0.3;">

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
            <div class="mt-5">
                <h3 class="section-title text-center mb-4">{{ __('ui.related_title') }}</h3>
                <div class="row g-4">
                    @foreach($related as $rel)
                        <div class="col-md-6 col-lg-3">
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
