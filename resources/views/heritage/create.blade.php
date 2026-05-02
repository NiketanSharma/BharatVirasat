@extends('layouts.app')

@section('title', __('ui.submit_title') . ' — ' . __('ui.app_name'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="text-center mb-4">
                <h1 class="section-title">{{ __('ui.submit_title') }}</h1>
                <p class="section-subtitle">{{ __('ui.submit_subtitle') }}</p>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('heritage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="bi bi-type me-1" style="color: var(--saffron);"></i>{{ __('ui.form_name') }} <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" style="border-radius: 10px; padding: 0.7rem 1rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category & State Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="category" class="form-label">
                                    <i class="bi bi-tag me-1" style="color: var(--saffron);"></i>{{ __('ui.form_category') }} <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                        id="category" name="category" style="border-radius: 10px; padding: 0.7rem 1rem;">
                                    <option value="">{{ __('ui.form_select_category') }}</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                            {{ ucfirst($cat) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">
                                    <i class="bi bi-geo-alt me-1" style="color: var(--saffron);"></i>{{ __('ui.form_state') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                       id="state" name="state" value="{{ old('state') }}"
                                       placeholder="{{ __('ui.form_state_placeholder') }}" style="border-radius: 10px; padding: 0.7rem 1rem;">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label for="short_desc" class="form-label">
                                <i class="bi bi-text-paragraph me-1" style="color: var(--saffron);"></i>{{ __('ui.form_short_desc') }} <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('short_desc') is-invalid @enderror"
                                      id="short_desc" name="short_desc" rows="3" style="border-radius: 10px; padding: 0.7rem 1rem;">{{ old('short_desc') }}</textarea>
                            <div class="form-text">{{ __('ui.form_short_desc_help') }}</div>
                            @error('short_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Long Description -->
                        <div class="mb-4">
                            <label for="long_desc" class="form-label">
                                <i class="bi bi-journal-text me-1" style="color: var(--saffron);"></i>{{ __('ui.form_long_desc') }} <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('long_desc') is-invalid @enderror"
                                      id="long_desc" name="long_desc" rows="7" style="border-radius: 10px; padding: 0.7rem 1rem;">{{ old('long_desc') }}</textarea>
                            @error('long_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="form-label">
                                <i class="bi bi-image me-1" style="color: var(--saffron);"></i>{{ __('ui.form_image') }}
                            </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                   id="image" name="image" accept="image/*" style="border-radius: 10px; padding: 0.7rem 1rem;">
                            <div class="form-text">{{ __('ui.form_image_help') }}</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-saffron btn-lg px-5" style="border-radius: 30px;">
                                <i class="bi bi-send me-2"></i>{{ __('ui.form_submit_btn') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
