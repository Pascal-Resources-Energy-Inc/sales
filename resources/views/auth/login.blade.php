@extends('layouts.app')
@section('css')

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%;
    overflow-x: hidden;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #ffffff;
}

.landing-page {
    height: 100vh;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
}

.landing-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 24px 30px 24px;
}

.landing-wrapper {
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.logo-section {
    margin-bottom: 30px;
}

.main-logo-img {
    width: 100%;
    max-width: 300px;
    height: auto;
}

.illustration-section {
    margin-bottom: 40px;
}

.human-illustration {
    width: 100%;
    max-width: 280px;
    height: auto;
}

.tagline {
    margin-bottom: 20px;
}

.tagline p {
    font-size: 18px;
    color: #666666;
    font-weight: 400;
    line-height: 1.4;
}

.progress-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 60px;
}

.dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E0E0E0;
    transition: background-color 0.3s ease;
}

.dot.active {
    background-color: #5DADE2;
}


.login-page {
    height: 100vh;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
}

.login-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    background-color: #ffffff;
    flex-shrink: 0;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.back-btn {
    top: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    background-color: #5DADE2;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.2s ease;
    z-index: 10;
    position: relative;
}

.back-btn:hover {
    background-color: #3498DB;
}

.page-title {
    margin-top: 30px;
    margin-left: 20px;
    font-size: 27px;
    font-weight: 550;
    color: #5DADE2;
    letter-spacing: 1px;
}

.logo-container {
    width: 60px;
    height: 60px;
}

.header-logo {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.login-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 24px 20px 24px;
}

.form-container {
    width: 100%;
    max-width: 400px;
}

.input-group {
    margin-bottom: 24px;
}

.input-label {
    display: block;
    font-size: 16px;
    color: #666666;
    margin-bottom: 8px;
    font-weight: 400;
}

.form-input {
    width: 100%;
    height: 56px;
    padding: 0 20px;
    border: none;
    border-radius: 12px !important;
    background-color: #F5F5F5;
    font-size: 16px;
    color: #333333;
    outline: none;
    transition: background-color 0.2s ease;
}

.form-input::placeholder {
    color: #AAAAAA;
    font-size: 16px;
}

.form-input:focus {
    background-color: #EEEEEE;
}

.form-input.error {
    background-color: #FFE5E5;
    border: 1px solid #FF6B6B;
}

.error-text {
    color: #FF6B6B;
    font-size: 14px;
    margin-top: 6px;
}

.signin-button {
    width: 100%;
    height: 56px;
    border: none;
    border-radius: 12px;
    background-color: #5DADE2;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s ease;
    margin-bottom: 24px;
}

.signin-button:hover {
    background-color: #3498DB;
}

.forgot-section {
    text-align: center;
    margin-bottom: 24px;
}

.forgot-link {
    color: #5DADE2;
    text-decoration: none;
    font-size: 16px;
    font-weight: 400;
}

.forgot-link:hover {
    text-decoration: underline;
}

.alert-error {
    background-color: #FFE5E5;
    color: #FF6B6B;
    padding: 12px 16px;
    border-radius: 8px;
    border-left: 4px solid #FF6B6B;
    margin-bottom: 20px;
    font-size: 14px;
}

@media (max-width: 480px) {
    .landing-content {
        padding: 30px 20px 25px 20px;
    }
    
    .login-header {
        padding: 16px 20px;
    }
    
    .login-content {
        padding: 0 20px 15px 20px;
    }
    
    .main-logo-img {
        max-width: 250px;
    }
    
    .human-illustration {
        max-width: 220px;
    }
    
    .tagline p {
        font-size: 16px;
    }
    
    .header-left {
        gap: 12px;
    }
    
    .page-title {
        font-size: 22px;
    }
    
    .form-input, .signin-button {
        height: 52px;
    }
    
    .progress-dots {
        margin-bottom: 40px;
    }
}

@media (max-width: 320px) {
    .landing-content {
        padding: 25px 15px 20px 15px;
    }
    
    .logo-section {
        margin-bottom: 25px;
    }
    
    .illustration-section {
        margin-bottom: 30px;
    }
    
    .tagline {
        margin-bottom: 15px;
    }
    
    .progress-dots {
        margin-bottom: 35px;
    }
}
</style>
@endsection
@section('content')


<div class="login-page" id="loginFormPage" style="display:'flex';">
   <div class="login-header">
        <div class="header-left">
            <button type="button" class="back-btn" onclick="history.back()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h1 class="page-title">Sign in</h1>
        </div>
      
    </div>

    <div class="login-content">
        <div class="form-container">
            <!-- Role indicator section -->
           

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                
                <!-- Hidden field to send selected role -->
              
                <div class="input-group">
                    <label for="email" class="input-label">Email or Phone Number</label>
                    <input 
                        id="email" 
                        type="text" 
                        class="form-input{{ $errors->has('email') ? ' error' : '' }}" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Email or Phone Number"
                        required 
                        autofocus
                    >
                    
                </div>

                <div class="input-group">
                    <label class="input-label" for="password">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        class="form-input{{ $errors->has('password') ? ' error' : '' }}" 
                        placeholder="At least 8 characters" 
                        name="password" 
                        required
                    >
                   
                </div>

                @if($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="alert-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button class="signin-button" type="submit" id="signinButton">
                    Sign in
                </button>

                <div class="forgot-section">
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Forgot password?
                    </a>
                </div>
                @if ($errors->any())
                    <div class="alert-error">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>


@endsection