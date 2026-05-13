@php
    $states = [
        ['name' => 'Rajasthan', 'image' => 'https://images.unsplash.com/photo-1599661046289-e31897846e41?w=800', 'desc' => 'The land of Maharajas and desert forts.'],
        ['name' => 'Kerala', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=800', 'desc' => 'God\'s own country with serene backwaters.'],
        ['name' => 'Maharashtra', 'image' => 'https://images.unsplash.com/photo-1566552881560-0be862a7c445?w=800', 'desc' => 'Home to Ajanta, Ellora and ancient Maratha history.'],
        ['name' => 'Uttar Pradesh', 'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=800', 'desc' => 'The spiritual heartland and home to the Taj Mahal.'],
        ['name' => 'Tamil Nadu', 'image' => 'https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=800', 'desc' => 'Land of Dravidian architecture and thousands of temples.'],
        ['name' => 'Gujarat', 'image' => 'https://images.unsplash.com/photo-1599661046827-dacff0c0f09a?w=800', 'desc' => 'Vibrant traditions and the architectural wonders of Ahmedabad.'],
        ['name' => 'West Bengal', 'image' => 'https://images.unsplash.com/photo-1558431382-27e303142255', 'desc' => 'The intellectual soul of India, home to colonial splendor.'],
        ['name' => 'Karnataka', 'image' => 'https://images.unsplash.com/photo-1605640840605-14ac1855827b', 'desc' => 'Land of grand palaces and historical empires.'],
    ];
@endphp

<div class="state-explorer-container" data-aos="fade-up">
    <div class="state-cards-grid">
        @foreach($states as $state)
            <a href="{{ route('heritage.index', ['state' => $state['name']]) }}" class="state-card-link">
                <div class="state-card">
                    <div class="state-card-bg" style="background-image: url('{{ $state['image'] }}')"></div>
                    <div class="state-card-overlay">
                        <div class="state-card-content">
                            <span class="state-badge">Explore</span>
                            <h3 class="state-name">{{ $state['name'] }}</h3>
                            <p class="state-desc">{{ $state['desc'] }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<style>
    .state-explorer-container {
        width: 100%;
        padding: 20px 0;
    }

    .state-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        padding: 10px;
    }

    .state-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .state-card {
        position: relative;
        height: 380px;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .state-card-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: transform 0.8s ease;
    }

    .state-card:hover .state-card-bg {
        transform: scale(1.1);
    }

    .state-card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
        transition: background 0.4s ease;
    }

    .state-card:hover .state-card-overlay {
        background: linear-gradient(to top, rgba(139, 0, 0, 0.85) 0%, rgba(0,0,0,0.3) 60%, transparent 100%);
    }

    .state-card-content {
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }

    .state-card:hover .state-card-content {
        transform: translateY(0);
    }

    .state-badge {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .state-card:hover .state-badge {
        opacity: 1;
    }

    .state-name {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #fff;
        margin-bottom: 8px;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .state-desc {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
        margin-bottom: 0;
        line-height: 1.4;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, margin-top 0.4s ease;
    }

    .state-card:hover .state-desc {
        max-height: 60px;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .state-card {
            height: 300px;
        }
        .state-name {
            font-size: 1.5rem;
        }
    }
</style>
