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
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            color: var(--dark-brown);
            min-height: 100vh;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--deep-red);
        }

        /* Navbar - Glassmorphism */
        .navbar-bharat {
            background: rgba(44, 30, 22, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1rem 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(197, 160, 89, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-bharat .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 800;
            color: #fff !important;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .navbar-bharat .navbar-brand span {
            color: var(--saffron);
        }

        .navbar-bharat .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-bharat .nav-link:hover,
        .navbar-bharat .nav-link.active {
            color: var(--gold-light) !important;
            background: rgba(255, 255, 255, 0.1);
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
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            position: relative;
        }

        .heritage-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border-radius: 20px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.8);
            pointer-events: none;
            z-index: 10;
        }

        .heritage-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(109, 0, 0, 0.12);
        }

        .heritage-card .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .heritage-card:hover .card-img-top {
            transform: scale(1.05);
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
            background: #1A1A1A;
            color: rgba(255, 255, 255, 0.7);
            padding: 3rem 0 2rem;
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
            background: linear-gradient(90deg, var(--saffron), var(--gold), var(--deep-red));
        }

        .footer-bharat h5 {
            color: var(--gold-light);
            font-family: 'Playfair Display', serif;
        }

        .footer-bharat .footer-divider {
            border-color: rgba(218, 165, 32, 0.3);
            margin: 1.5rem 0;
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

        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        .delay-5 { animation-delay: 0.5s; }
        .delay-6 { animation-delay: 0.6s; }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-bharat .navbar-brand { font-size: 1.3rem; }
            .hero-section h1 { font-size: 2rem !important; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-bharat sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-gem me-2"></i>{{ __('ui.app_name') }}
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
        <div class="container text-center">
            <h5 class="mb-3"><i class="bi bi-gem me-2"></i>{{ __('ui.app_name') }}</h5>
            <p class="mb-1">{{ __('ui.footer_text') }}</p>
            <hr class="footer-divider">
            <p class="mb-0" style="font-size: 0.85rem;">
                &copy; {{ date('Y') }} {{ __('ui.footer_copyright') }}
            </p>
        </div>
    </footer>

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
            
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                var navbar = document.querySelector('.navbar-bharat');
                if (window.scrollY > 50) {
                    navbar.style.padding = '0.5rem 0';
                    navbar.style.background = 'rgba(26, 26, 26, 0.95)';
                } else {
                    navbar.style.padding = '1rem 0';
                    navbar.style.background = 'rgba(44, 30, 22, 0.85)';
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
