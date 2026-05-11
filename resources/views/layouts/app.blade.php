<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BharatVirasat — Explore India's rich cultural heritage including festivals, dance forms, art, cuisines, monuments, and music.">
    <title>@yield('title', __('ui.app_name') . ' — ' . __('ui.app_tagline'))</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&family=Poppins:wght@300;400;500;600;700&family=Tiro+Devanagari+Hindi&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --saffron: #FF7B00;
            --saffron-dark: #CC6200;
            --saffron-light: #FF9E40;
            --deep-red: #6D0000;
            --deep-red-light: #940000;
            --ivory: #FAFAFA;
            --ivory-warm: #FFFDF9;
            --gold: #C5A059;
            --gold-light: #E0C388;
            --dark-brown: #2C1E16;
            --warm-gray: #5D4A41;
            --cream: #F5EFEB;
            --bg-gradient: linear-gradient(135deg, #FFFDF9 0%, #F5EFEB 100%);
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 8px 30px rgba(0,0,0,0.1);
            --shadow-lg: 0 20px 50px rgba(0,0,0,0.12);
            --transition-smooth: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            color: var(--dark-brown);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--deep-red);
        }

        /* Navbar - Glassmorphism */
        .navbar-bharat {
            background: rgba(26, 20, 18, 0.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            padding: 0.8rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(197, 160, 89, 0.15);
            transition: all 0.4s var(--transition-smooth);
        }

        .navbar-bharat .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff !important;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .brand-emblem {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px; height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--saffron), var(--gold));
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(255, 123, 0, 0.35);
            border: 2px solid rgba(255,255,255,0.15);
            transition: all 0.3s ease;
        }

        .navbar-bharat .navbar-brand:hover .brand-emblem {
            transform: rotate(-5deg) scale(1.05);
            box-shadow: 0 6px 18px rgba(255, 123, 0, 0.45);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .brand-text .brand-main {
            font-size: 1.5rem;
            font-weight: 800;
        }

        .brand-text .brand-main .text-gold {
            background: linear-gradient(135deg, var(--gold-light), var(--saffron-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-text .brand-tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 0.6rem;
            font-weight: 400;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: rgba(224, 195, 136, 0.7);
        }

        .navbar-bharat .nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 0.9rem !important;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-bharat .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%; right: 50%;
            height: 2px;
            background: linear-gradient(90deg, var(--saffron), var(--gold));
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .navbar-bharat .nav-link:hover::after,
        .navbar-bharat .nav-link.active::after {
            left: 20%; right: 20%;
        }

        .navbar-bharat .nav-link:hover,
        .navbar-bharat .nav-link.active {
            color: #fff !important;
        }

        .navbar-bharat .nav-link.active {
            color: var(--gold-light) !important;
        }

        .lang-toggle {
            background: var(--saffron) !important;
            color: #fff !important;
            font-weight: 600 !important;
            border-radius: 20px !important;
            padding: 0.4rem 1rem !important;
            font-size: 0.85rem !important;
            transition: all 0.3s ease;
        }

        .lang-toggle:hover {
            background: var(--gold) !important;
            transform: scale(1.05);
        }

        /* Cards */
        .heritage-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0,0,0,0.06);
            transition: all 0.45s var(--transition-smooth);
            height: 100%;
            position: relative;
        }

        .heritage-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--saffron), var(--gold), var(--deep-red));
            border-radius: 22px 22px 0 0;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 10;
        }

        .heritage-card:hover::before { opacity: 1; }

        .heritage-card:hover {
            transform: translateY(-12px) scale(1.01);
            box-shadow: 0 25px 50px rgba(109, 0, 0, 0.14), 0 10px 20px rgba(0,0,0,0.06);
        }

        .heritage-card .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.6s var(--transition-smooth);
        }

        .heritage-card:hover .card-img-top {
            transform: scale(1.08);
        }

        .heritage-card .card-img-wrapper {
            overflow: hidden;
            position: relative;
        }

        .heritage-card .card-img-wrapper .category-overlay {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 2;
        }

        .card-img-placeholder {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--saffron);
        }

        /* Badges */
        .badge-category {
            background: linear-gradient(135deg, var(--saffron), var(--saffron-light));
            color: #fff;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.4rem 0.85rem;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            box-shadow: 0 4px 10px rgba(255, 123, 0, 0.3);
        }

        .badge-state {
            background: rgba(139, 0, 0, 0.1);
            color: var(--deep-red);
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.3rem 0.65rem;
            border-radius: 15px;
        }

        /* Buttons */
        .btn-saffron {
            background: linear-gradient(135deg, var(--saffron-light), var(--saffron));
            color: #fff;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 0.7rem 1.8rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 15px rgba(255, 123, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-saffron::after {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: skewX(-20deg);
            transition: all 0.5s ease;
        }

        .btn-saffron:hover::after {
            left: 150%;
        }

        .btn-saffron:hover {
            background: linear-gradient(135deg, var(--saffron), var(--saffron-dark));
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 123, 0, 0.45);
        }

        .btn-heritage {
            background: linear-gradient(135deg, var(--deep-red), var(--deep-red-light));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-heritage:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--dark-brown);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(218, 165, 32, 0.3);
        }

        /* Category filter buttons */
        .category-filter-btn {
            background: #fff;
            border: 2px solid var(--saffron);
            color: var(--saffron-dark);
            border-radius: 25px;
            padding: 0.45rem 1.2rem;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-filter-btn:hover,
        .category-filter-btn.active {
            background: var(--saffron);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 153, 51, 0.3);
        }

        /* Section titles */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--deep-red);
            position: relative;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--saffron), var(--gold));
            border-radius: 3px;
        }

        .section-subtitle {
            color: var(--warm-gray);
            font-size: 1.05rem;
            margin-top: 1rem;
        }

        /* Footer */
        .footer-bharat {
            background: linear-gradient(180deg, #1a1412 0%, #0d0a08 100%);
            color: rgba(255, 255, 255, 0.7);
            padding: 4rem 0 2rem;
            margin-top: 5rem;
            position: relative;
        }

        .footer-bharat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--saffron), var(--gold), var(--deep-red), var(--gold), var(--saffron));
            background-size: 200% 100%;
            animation: shimmerGradient 4s ease infinite;
        }

        @keyframes shimmerGradient {
            0%,100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .footer-bharat h5 {
            color: var(--gold-light);
            font-family: 'Playfair Display', serif;
        }

        .footer-bharat .footer-divider {
            border-color: rgba(218, 165, 32, 0.2);
            margin: 2rem 0;
        }

        .footer-bharat a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-bharat a:hover {
            color: var(--gold-light);
            padding-left: 4px;
        }

        .footer-social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px; height: 42px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.7) !important;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin: 0 0.3rem;
        }

        .footer-social-link:hover {
            background: var(--saffron);
            color: #fff !important;
            transform: translateY(-3px);
            padding-left: 0 !important;
        }

        /* Alert customization */
        .alert-heritage {
            background: linear-gradient(135deg, #FFF3E0, #FFF8E1);
            border: 1px solid var(--gold);
            color: var(--dark-brown);
            border-radius: 12px;
            border-left: 4px solid var(--saffron);
        }

        /* Form styles */
        .form-control:focus,
        .form-select:focus {
            border-color: var(--saffron);
            box-shadow: 0 0 0 0.2rem rgba(255, 153, 51, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-brown);
        }

        /* Decorative elements */
        .ornament {
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--saffron), var(--gold), var(--saffron));
            border-radius: 3px;
            display: inline-block;
        }

        /* Admin table */
        .table-heritage thead {
            background: linear-gradient(135deg, var(--deep-red), var(--dark-brown));
            color: #fff;
        }

        .table-heritage thead th {
            border: none;
            padding: 0.9rem 1rem;
            font-weight: 600;
        }

        /* Category icons mapping */
        .cat-icon-festival::before { content: "🎆"; }
        .cat-icon-dance::before { content: "💃"; }
        .cat-icon-art::before { content: "🎨"; }
        .cat-icon-cuisine::before { content: "🍛"; }
        .cat-icon-monument::before { content: "🏛️"; }
        .cat-icon-music::before { content: "🎵"; }

        /* Pagination */
        .pagination .page-link {
            color: var(--deep-red);
            border-color: #e0d5c7;
        }

        .pagination .page-item.active .page-link {
            background: var(--saffron);
            border-color: var(--saffron);
            color: #fff;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes pulse-glow {
            0%,100% { box-shadow: 0 0 5px rgba(255,123,0,0.3); }
            50% { box-shadow: 0 0 20px rgba(255,123,0,0.5); }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-float { animation: float 3s ease-in-out infinite; }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        .delay-5 { animation-delay: 0.5s; }
        .delay-6 { animation-delay: 0.6s; }

        /* Scroll to top */
        .scroll-top-btn {
            position: fixed;
            bottom: 30px; right: 30px;
            width: 48px; height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--saffron), var(--saffron-dark));
            color: #fff;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-top-btn.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-top-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255,123,0,0.4);
        }

        /* Stats counter */
        .stat-card {
            text-align: center;
            padding: 2rem 1rem;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--saffron), var(--deep-red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: var(--warm-gray);
            font-weight: 500;
            font-size: 0.95rem;
            margin-top: 0.3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-bharat .navbar-brand { font-size: 1.1rem; }
            .brand-emblem { width: 34px; height: 34px; font-size: 1rem; border-radius: 10px; }
            .brand-text .brand-main { font-size: 1.2rem; }
            .brand-text .brand-tagline { font-size: 0.5rem; letter-spacing: 1.5px; }
            .hero-section h1 { font-size: 2rem !important; }
            .stat-number { font-size: 2rem; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-bharat sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-emblem">
                    🏛️
                </span>
                <span class="brand-text">
                    <span class="brand-main"><span class="text-gold">Bharat</span>Virasat</span>
                    <span class="brand-tagline">Heritage of India</span>
                </span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-white" style="font-size: 1.5rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-heart me-1"></i>{{ __('ui.nav_home') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('heritage.*') ? 'active' : '' }}" href="{{ route('heritage.index') }}">
                            <i class="bi bi-collection me-1"></i>{{ __('ui.nav_heritage') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('trivia.*') ? 'active' : '' }}" href="{{ route('trivia.index') }}">
                            <i class="bi bi-question-circle me-1"></i>{{ __('ui.nav_trivia') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('heritage.create') ? 'active' : '' }}" href="{{ route('heritage.create') }}">
                            <i class="bi bi-plus-circle me-1"></i>{{ __('ui.nav_submit') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('favourites.*') ? 'active' : '' }}" href="{{ route('favourites.index') }}">
                            <i class="bi bi-heart me-1"></i>{{ __('ui.nav_favourites') }}
                            @if(count(session('favourites', [])) > 0)
                                <span class="badge rounded-pill" style="background: var(--gold); color: var(--dark-brown); font-size: 0.7rem;">
                                    {{ count(session('favourites', [])) }}
                                </span>
                            @endif
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                                <i class="bi bi-gear me-1"></i>{{ __('ui.nav_admin') }}
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-light" style="border-radius: 20px;">
                                    <i class="bi bi-box-arrow-right me-1"></i>{{ __('ui.nav_logout') }}
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('login') }}" style="border: 1px solid rgba(255,255,255,0.3); border-radius: 20px;">
                                <i class="bi bi-person-circle me-1"></i>{{ __('ui.nav_login') }}
                            </a>
                        </li>
                    @endauth
                    <li class="nav-item ms-2">
                        @if(app()->getLocale() === 'en')
                            <a class="nav-link lang-toggle" href="{{ route('language.switch', 'hi') }}">
                                हिन्दी
                            </a>
                        @else
                            <a class="nav-link lang-toggle" href="{{ route('language.switch', 'en') }}">
                                English
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-heritage alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2 text-success"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('info'))
            <div class="alert alert-heritage alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle-fill me-2" style="color: var(--saffron);"></i>{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-bharat">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4 text-center text-lg-start">
                    <h5 class="mb-3"><span style="display:inline-block;width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,var(--saffron),var(--gold));text-align:center;line-height:32px;font-size:0.9rem;margin-right:8px;vertical-align:middle;">🏛️</span>{{ __('ui.app_name') }}</h5>
                    <p style="font-size: 0.9rem; line-height: 1.7;">{{ __('ui.footer_text') }}</p>
                    <div class="mt-3">
                        <a href="#" class="footer-social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="mb-3" style="color: var(--gold-light); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Explore</h6>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('heritage.index') }}"><i class="bi bi-chevron-right me-1" style="font-size: 0.7rem;"></i>Heritage</a></li>
                        <li class="mb-2"><a href="{{ route('trivia.index') }}"><i class="bi bi-chevron-right me-1" style="font-size: 0.7rem;"></i>Trivia</a></li>
                        <li class="mb-2"><a href="{{ route('favourites.index') }}"><i class="bi bi-chevron-right me-1" style="font-size: 0.7rem;"></i>Favourites</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="mb-3" style="color: var(--gold-light); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Categories</h6>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('heritage.index', ['category'=>'festival']) }}">🎆 Festivals</a></li>
                        <li class="mb-2"><a href="{{ route('heritage.index', ['category'=>'dance']) }}">💃 Dance</a></li>
                        <li class="mb-2"><a href="{{ route('heritage.index', ['category'=>'monument']) }}">🏛️ Monuments</a></li>
                        <li class="mb-2"><a href="{{ route('heritage.index', ['category'=>'cuisine']) }}">🍛 Cuisine</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3" style="color: var(--gold-light); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Contribute</h6>
                    <p style="font-size: 0.9rem;">Help us preserve India's cultural heritage by submitting new entries.</p>
                    <a href="{{ route('heritage.create') }}" class="btn btn-sm btn-outline-light" style="border-radius: 20px; border-color: rgba(255,255,255,0.2);">
                        <i class="bi bi-plus-circle me-1"></i>Submit Heritage Item
                    </a>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="mb-0" style="font-size: 0.85rem;">
                    &copy; {{ date('Y') }} {{ __('ui.footer_copyright') }}
                </p>
                <p class="mb-0" style="font-size: 0.8rem; color: rgba(255,255,255,0.4);">
                    Made with <i class="bi bi-heart-fill" style="color: var(--saffron);"></i> for India's Heritage
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top-btn" id="scrollTopBtn" aria-label="Scroll to top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50,
            });
            
            // Navbar scroll effect + scroll-to-top
            var scrollBtn = document.getElementById('scrollTopBtn');
            window.addEventListener('scroll', function() {
                var navbar = document.querySelector('.navbar-bharat');
                if (window.scrollY > 50) {
                    navbar.style.padding = '0.4rem 0';
                    navbar.style.background = 'rgba(13, 10, 8, 0.97)';
                    navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.3)';
                } else {
                    navbar.style.padding = '0.8rem 0';
                    navbar.style.background = 'rgba(26, 20, 18, 0.92)';
                    navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.2)';
                }
                scrollBtn.classList.toggle('visible', window.scrollY > 400);
            });
            scrollBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
