@extends('layouts.app')

@section('title', __('ui.fav_title') . ' — ' . __('ui.app_name'))

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="section-title">
            <i class="bi bi-heart-fill me-2" style="color: var(--saffron);"></i>{{ __('ui.fav_title') }}
        </h1>
        <p class="section-subtitle">{{ __('ui.fav_subtitle') }}</p>
    </div>

    @if($items->count() > 0)
        <div class="row g-4">
            @foreach($items as $item)
                <div class="col-md-6 col-lg-4">
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
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-heart" style="font-size: 4rem; color: var(--gold); opacity: 0.5;"></i>
            </div>
            <p class="text-muted fs-5">{{ __('ui.fav_empty') }}</p>
            <a href="{{ route('heritage.index') }}" class="btn btn-saffron mt-3">
                <i class="bi bi-compass me-2"></i>{{ __('ui.hero_cta') }}
            </a>
        </div>
    @endif
</div>
@endsection
