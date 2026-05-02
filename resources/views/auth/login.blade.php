@extends('layouts.app')

@section('title', __('ui.login_title') . ' — ' . __('ui.app_name'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="text-center mb-4">
                <h1 class="section-title">
                    <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('ui.login_title') }}
                </h1>
                <p class="section-subtitle">{{ __('ui.login_subtitle') }}</p>
            </div>

            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1" style="color: var(--saffron);"></i>{{ __('ui.login_email') }}
                            </label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus style="border-radius: 10px; padding: 0.7rem 1rem;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-1" style="color: var(--saffron);"></i>{{ __('ui.login_password') }}
                            </label>
                            <input type="password" name="password" id="password" class="form-control" required style="border-radius: 10px; padding: 0.7rem 1rem;">
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" style="border-color: var(--saffron);">
                            <label class="form-check-label" for="remember">{{ __('ui.login_remember') }}</label>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-saffron w-100" style="border-radius: 30px; padding: 0.7rem;">
                                {{ __('ui.login_btn') }} <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
