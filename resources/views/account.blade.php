@extends('layouts.header')

@section('content')
<div class="account-page">
  <div class="content-area-fix">
    <!-- Header -->
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Account</h1>
    </div>

    <!-- Profile Section -->
    <div class="section-card">
      <div class="section-content profile-section">
        <div class="profile-avatar">
          <div class="avatar-circle">
            <i class="bi bi-person-fill"></i>
          </div>
        </div>
        <div class="profile-info">
          <div class="profile-name">Arvin Santos</div>
          <div class="profile-phone">09876543245</div>
          <div class="profile-email">Owner@gmail.com</div>
        </div>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="section-card">
      <div class="menu-list">
        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-gear"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Account Settings</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="{{ route('list_product')}}" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-bag"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">List of Product</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-clock-history"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Subscription History</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <!-- <a href="" class="menu-item" id="kaagapayMenu">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-gear"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Kaagapay card</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a> -->

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-building"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Business Information</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="{{route('home')}}" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-shop"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Manage Store</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-question-circle"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">User Help</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>
    </div>

    <!-- App Version -->
    <div class="">
      <div class="">
        <div class="version-info">
          <span class="version-text">Gaz Lite V.1.0.0</span>
        </div>
      </div>
    </div>

    <!-- Sign Out Button -->
    <div class="signout-wrapper">
      <button class="signout-btn" onclick="logout()" id="signout-btn">
        <i class="bi bi-box-arrow-right"></i>
        Sign out
      </button>
    </div>
  </div>
</div>

<!-- <div id="kaagapayModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    
    <div class="modal-header">
      <h2 class="modal-title">🎴 Kaagapay Card</h2>
    </div>

    <div class="flip-card" id="flipCard">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <div class="front-content">
            <div class="top-section">
            </div>
            <div class="bottom-section">
              <div class="bottom-left">
                <div class="cardholder-name">Andrea Jane B. Austero</div>
                <div class="cardholder-title">Mega Dealer</div>
                <div class="card-number">1234 5678 9087 1314</div>
                <div class="card-type">KAAGAPAY CARD</div>
              </div>
              <div class="bottom-right">
                <div class="logo-area">
                  <img src="images/card-logo.png" alt="GAZ LITE">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flip-card-back">
          <div class="validity-info">
            <div class="date-info">06-2025</div>
          </div>
          <div class="magnetic-stripe"></div>
          <div class="back-content">
            <div class="back-message">
              Present this Kaagapay Card and enjoy discounts!
            </div>
            <div class="terms-text">
              The use of this card is governed by the terms and 
              <p>conditions of the Kaagapay Card Program. If found,
                <br>please return to any Gaz Lite Branch.
              </p>
              <p>Your membership is valid for two (2) years from <br>date of application.</p>
            </div>
            
            <div class="card-info-boxes">
              <div class="info-box">
                <div class="info-label">EXP DATE</div>
                <div class="info-value">06/2027</div>
              </div>
              <div class="info-box">
                <div class="info-label">STORE DELIVERY NO.</div>
                <div class="info-value">1234567890</div>
              </div>
            </div>
            
            <div class="barcode-section">
              <div class="barcode"></div>
              <div class="barcode-number">987654321098</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flip-toggle">
      <button class="flip-btn" onclick="toggleCard()">
        <i class="bi bi-arrow-repeat"></i> Flip Card
      </button>
    </div>

    <div class="card-actions">
      <button class="action-btn" onclick="downloadCard()">
        <i class="bi bi-download"></i> Save Card
      </button>
      <button class="action-btn" onclick="shareCard()">
        <i class="bi bi-share"></i> Share
      </button>
    </div>
  </div>
</div> -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.css" rel="stylesheet">

<style>
  .back-btn {
    background: none;
    border: none;
    color: #666;
    font-size: 18px;
    cursor: pointer;
    padding: 5px;
    transition: color 0.2s ease;
  }

  .back-btn:hover {
    color: #4A90E2;
  }

  .page-header-nya {
    background: #fff;
    padding: 20px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px !important;
    position: relative;
    outline: 0.2px solid #e1e1e1ff;
  }

  .page-title {
      font-size: 20px;
      font-weight: 600;
      color: #4A90E2;
      margin: 0;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

  /* Card sections */
  .section-card {
    background: #fff;
    margin: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
  }

  .section-content {
    padding: 20px;
  }

  /* Profile Section */
  .profile-section {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 25px 20px;
  }

  .profile-avatar {
    flex-shrink: 0;
  }

  .avatar-circle {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
  }

  .profile-info {
    flex-grow: 1;
  }

  .profile-name {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 4px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .profile-phone {
    font-size: 14px;
    color: #666;
    margin-bottom: 2px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .profile-email {
    font-size: 14px;
    color: #666;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  /* Menu List */
  .menu-list {
    padding: 0;
  }

  .menu-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 20px;
    border-bottom: 1px solid #f5f5f5;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .menu-item:last-child {
    border-bottom: none;
  }

  .menu-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
  }

  .menu-item:hover::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
    transition: all 0.3s ease;
  }

  /* Special styling for Kaagapay card menu item */
  #kaagapayMenu {
    background: linear-gradient(135deg, rgba(74, 144, 226, 0.05) 0%, rgba(53, 122, 189, 0.05) 100%);
    border-left: 3px solid #4A90E2;
  }

  #kaagapayMenu .menu-icon {
    background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
    color: white !important;
  }

  #kaagapayMenu .menu-title {
    color: #4A90E2;
    font-weight: 600;
  }

  .menu-content {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-grow: 1;
  }

  .menu-icon {
    width: 40px;
    height: 40px;
    background: #f6fbffff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #000000ff !important;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .menu-text {
    flex-grow: 1;
  }

  .menu-title {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin: 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .menu-arrow {
    color: #ccc;
    font-size: 14px;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .menu-item:hover .menu-arrow {
    color: #4A90E2;
    transform: translateX(5px);
  }

  /* Version Info */
  .version-info {
    text-align: left;
    padding: 10px 0;
    margin: 0 0 0 20px;
  }

  .version-text {
    font-size: 12px;
    color: #666;
    font-weight: 500;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  /* Sign Out Button */
  .signout-wrapper {
    padding: 0 15px;
    margin: 30px 0 120px 0;
  }

  .signout-btn {
    width: 100%;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: #fff;
    border: none;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    cursor: pointer;
    transition: all 0.2s ease;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .signout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.5);
  }

  .signout-btn:active {
    transform: scale(0.98);
  }

  /* Custom SweetAlert2 Styling */
  .swal2-popup {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
    border-radius: 16px !important;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15) !important;
  }
  
  .swal2-title {
    font-weight: 700 !important;
    color: #333 !important;
    font-size: 1.5em !important;
  }
  
  .swal2-html-container {
    font-weight: 400 !important;
    line-height: 1.6 !important;
    color: #555 !important;
  }
  
  .swal2-confirm {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    font-family: 'Inter', sans-serif !important;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4) !important;
  }
  
  .swal2-confirm:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.5) !important;
  }
  
  .swal2-cancel {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    font-family: 'Inter', sans-serif !important;
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.4) !important;
  }
  
  .swal2-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(108, 117, 125, 0.5) !important;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(8px);
    animation: fadeIn 0.3s ease-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes slideUp {
    from { 
      opacity: 0;
      transform: translate(-50%, -40%) scale(0.9);
    }
    to { 
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }
  }

  /* Modal Content - FIXED FOR ALL SCREEN SIZES */
  .modal-content {
    background: transparent;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* Key fix: Always maintain mobile-like dimensions */
    width: 90%;
    max-width: 420px; /* Never exceed this width */
    min-width: 320px; /* Minimum width for very small screens */
    animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  /* Modal Header */
  .modal-header {
    text-align: center;
    margin-bottom: 25px;
  }

  .modal-title {
    color: white;
    font-size: clamp(24px, 5vw, 28px); /* Responsive font size */
    font-weight: 700;
    margin: 0 0 8px 0;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .modal-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 16px;
    margin: 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  /* Close Button */
  .close-btn {
    color: white;
    position: absolute;
    top: -60px;
    right: 10px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
  }

  .close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
  }

  /* FLIP CARD CONTAINER - FIXED FOR ALL SCREENS */
  .flip-card {
    perspective: 1000px;
    /* Keep consistent card size across all screens */
    width: min(340px, 90vw);
    height: min(215px, 56vw);
    max-height: 215px;
    margin: auto;
  }

  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s ease;
    transform-style: preserve-3d;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
  }

  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }

  .flip-card-front,
  .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 12px;
  }

  /* FRONT CARD DESIGN - Responsive text sizes */
  .flip-card-front {
    background: #1573FF;
    color: white;
    overflow: hidden;
    padding: 0;
  }

  /* Large decorative circle (top right) - Responsive */
  .flip-card-front::before {
    content: '';
    position: absolute;
    top: -15%;
    right: -15%;
    width: 45%;
    height: 70%;
    background: #4DB1FB;
    border-radius: 50%;
    pointer-events: none;
  }

  /* Smaller decorative circle (bottom left) - Responsive */
  .flip-card-front::after {
    content: '';
    position: absolute;
    bottom: -60%;
    left: -60%;
    width: 130%;
    height: 180%;
    background: #1E1671;
    border-radius: 50%;
    pointer-events: none;
  }

  .front-content {
    padding: min(20px, 5vw);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    z-index: 2;
  }

  .bottom-section {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
  }

  .bottom-left {
    text-align: left;
    flex-grow: 1;
  }

  .bottom-right {
    display: flex;
    align-items: center;
  }

  .cardholder-name {
    font-size: clamp(11px, 3.5vw, 13px);
    font-weight: 600;
    text-transform: none;
    letter-spacing: 0.3px;
    margin-bottom: 2px;
  }

  .cardholder-title {
    font-size: 10px !important;
    font-weight: 400;
    opacity: 0.9;
    line-height: 1;
    margin-bottom: 5px;
  }

  .logo-area {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    border-radius: 6px;
  }

  .logo-area img {
    height: clamp(20px, 6vw, 24px);
    width: auto;
    max-width: clamp(50px, 15vw, 70px);
    object-fit: contain;
    margin-bottom: -10px;
    margin-right: -20px !important
  }

  .logo-fallback {
    color: #1e40af;
    font-size: clamp(12px, 4vw, 16px);
    font-weight: 700;
    letter-spacing: 1px;
  }

  .card-number {
    font-size: 15px !important;
    font-weight: 500;
    letter-spacing: clamp(1px, 0.8vw, 3px);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  }

  .card-type {
    font-size: 10px !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.95;
  }

  /* BACK CARD DESIGN - Responsive */
  .flip-card-back {
    background: #1573FF;
    color: white;
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    padding: 0;
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
  }

  .magnetic-stripe {
    background: #000000ff;
    height: 50px !important;
    width: 100%;
    margin-top: 25px;
    border-radius: 0;
    position: relative;
  }

  .back-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    height: calc(100% - 35px);
    justify-content: space-between;
  }

  .back-message {
    font-size: 7px;
    color: white;
    text-align: left;
    margin-bottom: 15px;
    padding: 0;
    line-height: 1.3;
  }

  /* Enhanced Barcode Section - Responsive */
  .barcode-section {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: min(8px, 2vw);
    border-radius: 4px;
    width: min(80px, 20vw);
    height: min(100px, 25vw);
    justify-content: center;
  }

  .barcode {
    width: 100%;
    height: min(40px, 10vw);
    background: repeating-linear-gradient(
      to right,
      #000,
      #000 2px,
      transparent 2px,
      transparent 4px
    );
    margin-bottom: 8px;
    border-radius: 2px;
  }


  .barcode-number {
    font-size: 7px;
    letter-spacing: 0.5px;
    color: #ffffffff;
    text-align: center;
    line-height: 1;
    writing-mode: horizontal-tb;
  }

  /* Flip Toggle Button - Responsive */
  .flip-toggle {
    text-align: center;
    margin: 20px 0;
  }

  .flip-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: min(10px, 2.5vw) min(20px, 5vw);
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: clamp(12px, 3.5vw, 14px);
    font-weight: 600;
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin: 0 auto;
  }

  .flip-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
  }

  /* Card Actions - Responsive */
  .card-actions {
    text-align: center;
    margin-top: 25px;
    display: flex;
    justify-content: center;
    gap: min(16px, 4vw);
    flex-wrap: wrap;
  }

  .action-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: min(12px, 3vw) min(24px, 6vw);
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: clamp(12px, 3.5vw, 14px);
    font-weight: 600;
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
  }

  .action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
  }

  /* Back card button styling - Responsive */
  .flip-card-back button {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    color: white;
    border: none;
    padding: min(12px, 3vw) min(24px, 6vw);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: clamp(12px, 4vw, 16px);
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
  }

  .flip-card-back button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(30, 64, 175, 0.4);
  }

  .terms-text {
    font-size: 7px;
    color: rgba(255, 255, 255, 0.9);
    text-align: justify;
    line-height: 1.4;
    padding-right: 2px !important;
  }

  .validity-info {
    text-align: left;
    margin-top: auto;
    padding-right: 100px;
  }

  .validity-text {
    font-size: 7px;
    color: rgba(255, 255, 255, 0.9);
    margin-top: auto;
    line-height: 1.3;
  }

  .date-info {
    font-size: 7px;
    color: white;
    text-align: right;
    position: absolute;
    right: 35px;
    top: 7px;
  }

  .card-info-boxes {
    display: flex;
    gap: 8px;
    margin: 10px 0;
    justify-content: flex-start;
  }

  .info-box {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 6px;
    padding: 6px 10px;
    min-width: 80px;
    text-align: center;
    backdrop-filter: blur(5px);
  }

  .info-label {
    font-size: 6px;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1;
    margin-bottom: 2px;
    font-weight: 500;
  }

  .info-value {
    font-size: 8px;
    color: white;
    font-weight: 600;
    line-height: 1;
    letter-spacing: 0.3px;
  }

  @media (max-width: 480px) {
    .card-info-boxes {
      gap: 6px;
      margin: -5px 0;
    }
    
    .info-box {
      min-width: 70px;
      padding: 5px 8px;
    }
    
    .info-label {
      font-size: 5px;
    }
    
    .info-value {
      font-size: 7px;
    }
  }

  @media (max-width: 480px) {
    .barcode-section {
      width: min(70px, 18vw);
      height: min(85px, 22vw);
      padding: 6px;
    }
    
    .validity-info {
      padding-right: 80px;
    }
    
    .barcode {
      height: min(35px, 9vw);
    }
  }


  /* Hide old elements */
  .chip,
  .card-header,
  .card-details,
  .card-details h3,
  .card-details small {
    display: none !important;
  }

  /* Specific Media Queries for Edge Cases */
  @media (max-width: 480px) {
    .modal-content {
      width: 95%;
      max-width: 380px;
    }
    
    .flip-card {
      width: min(320px, 90vw);
      height: min(200px, 56vw);
    }
    
    .card-actions {
      flex-direction: row;
      justify-content: center;
      gap: 12px;
    }
    
    .action-btn {
      min-width: 100px;
      padding: 10px 16px;
      font-size: 13px;
    }
    
    .flip-btn {
      padding: 8px 16px;
      font-size: 13px;
    }

     .card-number {
      font-size: 12px !important;
      letter-spacing: 3px;
    }
  }

  /* Large screen optimizations */
  @media (min-width: 768px) {
    .modal-content {
      /* Ensure it never gets too large on big screens */
      width: 420px;
      max-width: 420px;
    }
    
    .flip-card {
      /* Lock dimensions on larger screens */
      width: 340px;
      height: 215px;
    }
    
    /* Ensure text doesn't get too large */
    .modal-title {
      font-size: 28px;
    }
    
    .cardholder-name {
      font-size: 13px;
    }
    
    .cardholder-title {
      font-size: 10px;
    }
    
    .card-number {
      font-size: 12px !important;
      letter-spacing: 3px;
    }
    
    .card-type {
      font-size: 14px;
    }
    
    .barcode-number {
      font-size: 7px;
      letter-spacing: 3px;
    }
    
    .action-btn,
    .flip-btn {
      font-size: 14px;
    }
  }

  /* Extra large screen constraints */
  @media (min-width: 1200px) {
    .modal-content {
      /* Never exceed mobile-like proportions */
      width: 420px;
      max-width: 420px;
    }
  }

  /* Additional responsive utilities */
  .show-back .flip-card-inner {
    transform: rotateY(180deg);
  }

  .show-front .flip-card-inner {
    transform: rotateY(0deg);
  }
</style>
@endsection

@section('js')
<!-- SweetAlert2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>

<script>
function logout() {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}

function toggleCard() {
    const flipCard = document.getElementById('flipCard');
    const flipBtn = document.querySelector('.flip-btn');

    flipCard.classList.toggle('show-back');

    if (flipCard.classList.contains('show-back')) {
        flipBtn.innerHTML = '<i class="bi bi-arrow-repeat"></i> Show Front';
    } else {
        flipBtn.innerHTML = '<i class="bi bi-arrow-repeat"></i> Show Back';
    }
}

// Enhanced Kaagapay Card Functions
function redeemReward() {
    Swal.fire({
        title: '🎉 Reward Redeemed!',
        text: 'Your exclusive discount has been applied to your account.',
        icon: 'success',
        confirmButtonText: 'Awesome!',
        timer: 3000,
        timerProgressBar: true
    });
}

function downloadCard() {
    Swal.fire({
        title: '💾 Download Card',
        text: 'Your Kaagapay card will be saved to your device.',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Download',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Simulate download
            Swal.fire('Downloaded!', 'Your card has been saved successfully.', 'success');
        }
    });
}

function shareCard() {
    if (navigator.share) {
        navigator.share({
            title: 'My Kaagapay Card',
            text: 'Check out my exclusive Kaagapay rewards card!',
            url: window.location.href
        });
    } else {
        Swal.fire({
            title: '📱 Share Card',
            text: 'Card details copied to clipboard!',
            icon: 'success',
            timer: 2000
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    function performSignOut() {
        // Show success message
        Swal.fire({
            title: '✅ Signed Out Successfully!',
            text: 'You have been securely signed out of your account.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: true
        }).then(() => {
            // Redirect to login page
            window.location.href = "{{ route('login') }}";
        });
    }

    // Enhanced modal functionality
    const modal = document.getElementById("kaagapayModal");
    const closeBtn = modal.querySelector(".close-btn");

    // Handle Kaagapay card menu click
    document.getElementById("kaagapayMenu").addEventListener("click", function (e) {
        e.preventDefault();
        modal.style.display = "block";
        document.body.style.overflow = "hidden"; // Prevent background scrolling
        
        // Reset card to show back side by default
        const flipCard = document.getElementById('flipCard');
        flipCard.classList.remove('show-front');
        const flipBtn = document.querySelector('.flip-btn');
        flipBtn.innerHTML = '<i class="bi bi-arrow-repeat"></i> Show Front';
    });

    // Close modal function
    function closeModal() {
        modal.style.display = "none";
        document.body.style.overflow = "auto"; // Restore scrolling
        
        // Reset card to default state when closing
        const flipCard = document.getElementById('flipCard');
        flipCard.classList.remove('show-front');
        const flipBtn = document.querySelector('.flip-btn');
        flipBtn.innerHTML = '<i class="bi bi-arrow-repeat"></i> Show Front';
    }

    // Close modal events
    closeBtn.addEventListener("click", closeModal);
    
    // Close when clicking outside
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close with Escape key
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && modal.style.display === "block") {
            closeModal();
        }
    });

    // Handle other menu items (excluding Kaagapay and List of Product)
    document.querySelectorAll(".menu-item").forEach(item => {
        if (item.id !== "kaagapayMenu" && !item.getAttribute('href').includes('route')) {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                const menuTitle = this.querySelector('.menu-title').textContent;
                
                // Show different messages based on menu item
                let message = 'This feature is coming soon!';
                let icon = 'info';
                
                if (menuTitle.includes('Settings')) {
                    message = 'Account settings panel will be available soon.';
                } else if (menuTitle.includes('History')) {
                    message = 'Your subscription history will be displayed here.';
                } else if (menuTitle.includes('Business')) {
                    message = 'Business information management coming soon.';
                } else if (menuTitle.includes('Help')) {
                    message = 'Help center and support will be available soon.';
                } else if (menuTitle.includes('Customers')) {
                    message = 'Customer management tools coming soon.';
                }
                
                Swal.fire({
                    title: menuTitle,
                    text: message,
                    icon: icon,
                    confirmButtonText: 'Got it!',
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        }
    });

    // Add smooth animations to menu items
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Add card flip animation on modal open
    setTimeout(() => {
        const flipCard = document.getElementById('flipCard');
        if (flipCard) {
            flipCard.style.transition = 'transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        }
    }, 100);
});

// Add global function for card interactions
window.toggleCard = toggleCard;
window.redeemReward = redeemReward;
window.downloadCard = downloadCard;
window.shareCard = shareCard;
window.logout = logout;
</script>
@endsection