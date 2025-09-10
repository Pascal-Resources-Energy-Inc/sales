@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #ffffff;
}

/* Landing Page Layout */
.landing-page {
    min-height: 100vh;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
}

.landing-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 24px;
}

.landing-wrapper {
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.logo-section {
    margin-bottom: 40px;
}

.main-logo-img {
    max-width: 300px;
    width: 100%;
    height: auto;
}

/* Carousel Images - Consistent Sizing */
.human-illustration {
    width: 280px;
    height: 280px;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    transition: transform 0.6s ease;
}

/* Bootstrap Carousel Customization */
.carousel-indicators {
    position: static;
    margin-top: 15px;
}

.carousel-indicators [data-bs-target] {
    width: 10px;
    height: 10px;
    background-color: #bbb;
    border-radius: 50%;
    margin: 0 5px;
    border: none;
    transition: background-color 0.3s ease;
}

.carousel-indicators .active {
    background-color: #5DADE2;
}

/* Tagline */
.tagline {
    margin-bottom: 30px;
}

.tagline p {
    font-size: 18px;
    color: #666666;
    font-weight: 400;
}

/* Sign In Button */
.landing-signin-button {
    width: 100%;
    max-width: 280px;
    height: 50px;
    border: 2px solid #5DADE2;
    border-radius: 12px;
    background-color: transparent;
    color: #5DADE2;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    margin-bottom: 24px;
    transition: all 0.3s ease;
}

.landing-signin-button:hover {
    background-color: #5DADE2;
    color: white;
    transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 480px) {
    .landing-content {
        padding: 0 20px;
    }
    
    .main-logo-img {
        max-width: 250px;
    }
    
    .human-illustration {
        width: 240px;
        height: 240px;
    }
    
    .tagline p {
        font-size: 16px;
    }
    
    .landing-wrapper {
        max-width: 320px;
    }
}

@media (max-width: 360px) {
    .human-illustration {
        width: 200px;
        height: 200px;
    }
    
    .main-logo-img {
        max-width: 200px;
    }
}
</style>
@endsection

@section('content')
<div class="landing-page" id="landingPage">
    <div class="landing-content">
        <div class="landing-wrapper">
            <div class="logo-section">
                <img src="{{asset('images/logo_sa_labas.png')}}" alt="GazLite Logo" class="main-logo-img">
            </div>
            
            <div id="illustrationCarousel" class="carousel slide mb-3" data-bs-ride="carousel" data-bs-interval="3000" data-bs-touch="true">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="{{ asset('images/human.png') }}" alt="Illustration 1" class="human-illustration">
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="{{ asset('images/second.png') }}" alt="Illustration 2" class="human-illustration">
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="{{ asset('images/third.png') }}" alt="Illustration 3" class="human-illustration">
                    </div>
                </div>

                <!-- Dots Navigation -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="2"></button>
                </div>
            </div>

            <div class="tagline">
                <p>Easy Management for your Store.</p>
            </div>

            <a href='{{url("/login")}}'>
                <button class="landing-signin-button">
                    Sign in
                </button>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection