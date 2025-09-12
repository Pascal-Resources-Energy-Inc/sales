@extends('layouts.header')
@section('content')
<div class="place-order-page">
  <div class="content-area-fix">
    <!-- Header -->
    <div class="page-header">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Order Summary</h1>
      <div class="header-icons">
      </div>
    </div>

    <!-- Client Selection Section -->
<div class="client-section">
    <div class="client-header" onclick="openClientModal()">
        <h2 class="client-title">Client</h2>
        <i class="bi bi-chevron-right client-arrow"></i>
    </div>
    <div class="client-content">
        <div class="assigned-ads-card">
            <div class="ads-icon">
                <i class="bi bi-scooter"></i>
            </div>
            <div class="ads-info">
                <div class="ads-label">Assigned ADS</div>
                <div class="ads-name" id="assigned-ads-name">YULIVER BALBANERO</div>
                <div class="ads-change" onclick="openClientModal()">Change</div>
            </div>
        </div>
    </div>
</div>

<!-- Client Selection Modal -->
<div class="modal-overlay" id="clientModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Choose</h2>
            <button class="modal-close" onclick="closeClientModal()">
                <i class="bi bi-x"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="delivery-option selected" onclick="selectDeliveryOption(this, 'pickup')">
                <input type="radio" name="delivery_method" value="pickup" checked>
                <div class="delivery-option-content">
                    <div class="delivery-option-title">Pick-up</div>
                </div>
            </div>
            <div class="delivery-option" onclick="selectDeliveryOption(this, 'delivery')">
                <input type="radio" name="delivery_method" value="delivery">
                <div class="delivery-option-content">
                    <div class="delivery-option-title">Delivery</div>
                </div>
            </div>
            
            <div class="pickup-date-section">
                <div class="pickup-date-label">Pick-up Date</div>
                <select class="date-selector" id="pickupDate">
                    <option value="21-june-2020">21 June 2020</option>
                    <option value="22-june-2020">22 June 2020</option>
                    <option value="23-june-2020">23 June 2020</option>
                    <option value="24-june-2020">24 June 2020</option>
                </select>
            </div>
            
            <button class="update-btn" onclick="updateClientSelection()">
                Update
            </button>
        </div>
    </div>
</div>

<div class="modal-overlay" id="clientModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Choose</h2>
            <button class="modal-close" onclick="closeClientModal()">
                <i class="bi bi-x"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="delivery-option selected" onclick="selectDeliveryOption(this, 'pickup')">
                <input type="radio" name="delivery_method" value="pickup" checked>
                <div class="delivery-option-content">
                    <div class="delivery-option-title">Pick-up</div>
                </div>
            </div>
            <div class="delivery-option" onclick="selectDeliveryOption(this, 'delivery')">
                <input type="radio" name="delivery_method" value="delivery">
                <div class="delivery-option-content">
                    <div class="delivery-option-title">Delivery</div>
                </div>
            </div>
            
            <div class="pickup-date-section">
                <div class="pickup-date-label">Pick-up Date</div>
                <select class="date-selector" id="pickupDate">
                    <option value="21-june-2020">21 June 2020</option>
                    <option value="22-june-2020">22 June 2020</option>
                    <option value="23-june-2020">23 June 2020</option>
                    <option value="24-june-2020">24 June 2020</option>
                </select>
            </div>
            
            <button class="update-btn" onclick="updateClientSelection()">
                Update
            </button>
        </div>
    </div>
</div>

    <!-- Cart Items Section -->
    <div class="cart-section">
      <div class="section-header">
        <i class="bi bi-cart-fill"></i> Cart Items
      </div>
      <div id="cart-items">
      </div>
    </div>

    <!-- Order Summary Section -->
    <div class="cart-section">
      <div class="section-header">
        <i class="bi bi-receipt"></i> Order Summary
      </div>
      <div class="summary-row">
        <span class="summary-label">Subtotal:</span>
        <span class="summary-value" id="subtotal">₱ 0.00</span>
      </div>
      <div class="summary-row total">
        <span class="summary-label">Total Amount:</span>
        <span class="summary-value" id="total-final">₱ 0.00</span>
      </div>
    </div>

    <!-- Payment Method Section -->
    <div class="cart-section">
      <div class="section-header">
        <i class="bi bi-credit-card-fill"></i> Payment Method
      </div>
      <div class="payment-option">
        <input type="radio" name="payment_method" value="cod" id="cod" checked>
        <div class="payment-icon">
          <i class="bi bi-cash-coin"></i>
        </div>
        <div class="payment-details">
          <div class="payment-name">Cash on Delivery</div>
          <div class="payment-desc">Pay when you receive your order</div>
        </div>
      </div>
      <div class="payment-option">
        <input type="radio" name="payment_method" value="gcash" id="gcash">
        <div class="payment-icon" style="background: #007DFF; color: white;">
          <i class="bi bi-phone-fill"></i>
        </div>
        <div class="payment-details">
          <div class="payment-name">GCash</div>
          <div class="payment-desc">Pay online via GCash</div>
        </div>
      </div>
    </div>

    <!-- Place Order Button -->
    <div class="place-order-wrapper">
      <button class="place-order-btn" id="place-order-btn">
        Place Order • <span id="final-total">₱ 0.00</span>
      </button>
    </div>
  </div>
</div>
@endsection

@section('css')
  <style>    
    .header-icons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .header-icons i {
      font-size: 18px;
      color: #666;
      cursor: pointer;
    }

    /* Cart Items Section */
    .cart-section {
      background: #fff;
      margin: 15px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      overflow: hidden;
    }

    .section-header {
      padding: 20px;
      border-bottom: 1px solid #f0f0f0;
      font-size: 18px;
      font-weight: 600;
      color: #333;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Swipe Container - Increased delete area width */
.swipe-container {
  position: relative;
  overflow: hidden;
  background: #fff;
}

.swipe-item {
  position: relative;
  transform: translateX(0);
  transition: transform 0.3s ease;
  background: #fff;
  z-index: 2;
  width: 100%;
}

.swipe-item.swiping {
  transition: none;
}

/* Increased delete background width and improved styling */
.delete-background {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  width: 120px; /* Increased from 80px to 120px */
  background: linear-gradient(135deg, #ff4757 0%, #ff3742 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 24px; /* Increased icon size */
  z-index: 1;
  cursor: pointer;
  box-shadow: inset 2px 0 8px rgba(0, 0, 0, 0.2);
}

.delete-background:hover {
  background: linear-gradient(135deg, #ff3742 0%, #ff2d3a 100%);
}

.delete-background:active {
  transform: scale(0.95);
  transition: transform 0.1s ease;
}

/* Add delete text alongside icon for better UX */
.delete-background::after {
  content: 'Delete';
  font-size: 12px;
  font-weight: 600;
  margin-left: 8px;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Improved cart item layout to accommodate larger delete area */
.cart-item {
  display: flex;
  align-items: center;
  padding: 15px 20px;
  border-bottom: 1px solid #f0f0f0;
  background: #fff;
  position: relative;
}

.cart-item:last-child {
  border-bottom: none;
}

    .item-image {
      width: 60px;
      height: 60px;
      background: #fafafa;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      overflow: hidden;
      flex-shrink: 0;
    }

    .item-image img {
      max-width: 80%;
      max-height: 80%;
      object-fit: contain;
    }

    .item-details {
      flex-grow: 1;
      min-width: 0;
    }

    .item-name {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      margin-bottom: 5px;
      line-height: 1.3;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Color indicator for stove items */
    .color-indicator {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 2px;
      font-size: 12px;
      color: #666;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .color-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      border: 1px solid #ddd;
      flex-shrink: 0;
    }

    .color-dot.yellow { background-color: #FFD700; }
    .color-dot.choco { background-color: #8B4513; }
    .color-dot.green { background-color: #32CD32; }
    .color-dot.red { background-color: #FF4444; }
    .color-dot.blue { background-color: #4169E1; }
    .color-dot.white { background-color: #FFFFFF; border: 2px solid #999; }

    .item-price {
      font-size: 16px;
      font-weight: 700;
      color: #4A90E2;
      margin-bottom: 8px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Quantity input styling */
    .item-quantity {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .quantity-btn {
      background: #4A90E2;
      border: none;
      color: #fff;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      font-size: 16px;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: all 0.2s ease;
      flex-shrink: 0;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .quantity-btn:hover {
      background: #357abd;
      transform: scale(1.05);
    }

    .quantity-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
      transform: none;
    }

    .qty-input {
      width: 50px;
      height: 32px;
      text-align: center;
      border: 2px solid #e0e0e0;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      background: #fff;
      transition: all 0.2s ease;
      -webkit-appearance: none;
      -moz-appearance: textfield;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .qty-input:focus {
      outline: none;
      border-color: #4A90E2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
    }

    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Order Summary Section */
    .summary-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 20px;
      font-size: 14px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .summary-row.total {
      font-size: 16px;
      font-weight: 700;
      color: #333;
      border-top: 2px solid #f0f0f0;
      background: #f8f9fa;
    }

    .summary-label {
      color: #666;
    }

    .summary-value {
      color: #333;
      font-weight: 600;
    }

    .summary-row.total .summary-value {
      color: #4A90E2;
      font-size: 18px;
    }

    /* Customer Info Section */
    .form-group {
      margin-bottom: 20px;
      padding: 0 20px;
    }

    .form-group:first-child {
      padding-top: 20px;
    }

    .form-group:last-child {
      padding-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
      background: #fff;
      transition: border-color 0.2s ease;
      box-sizing: border-box;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .form-control:focus {
      outline: none;
      border-color: #4A90E2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
    }

    /* Payment Method Section */
    .payment-option {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      border-bottom: 1px solid #f0f0f0;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .payment-option:last-child {
      border-bottom: none;
    }

    .payment-option:hover {
      background: #f8f9fa;
    }

    .payment-option input[type="radio"] {
      margin-right: 15px;
      transform: scale(1.2);
    }

    .payment-icon {
      width: 40px;
      height: 40px;
      background: #f0f0f0;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      font-size: 18px;
      color: #666;
      flex-shrink: 0;
    }

    .payment-details {
      flex-grow: 1;
      min-width: 0;
    }

    .payment-name {
      font-size: 14px;
      font-weight: 600;
      color: #333;
      margin-bottom: 2px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .payment-desc {
      font-size: 12px;
      color: #666;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Place Order Button - Fixed positioning matching header layout */
    .place-order-wrapper {
      margin-top: 30px; /* Increased to avoid bottom nav overlap */
      left: var(--sidebar-width);
      right: 0;
      z-index: 1100; /* Higher z-index than bottom nav */
      padding: 0 15px;
      transition: left var(--transition-duration) ease;
      background: transparent;
      pointer-events: none; /* Allow clicks to pass through wrapper */
    }

    /* Make button clickable */
    .place-order-btn {
      pointer-events: auto; /* Re-enable clicks on the button itself */
    }

    /* Adjust for collapsed sidebar */
    .sidebar.collapsed ~ .main-content .place-order-wrapper {
      left: var(--sidebar-collapsed-width);
    }

    @media (max-width: 768px) {
      .place-order-wrapper {
        left: 0 !important;
        right: 0;
        bottom: 120px;
      }
      
      .place-order-wrapper {
        z-index: 1100;
      }
    }
    .place-order-btn {
      width: 100%;
      background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%);
      color: #fff;
      border: none;
      padding: 16px 20px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
      cursor: pointer;
      transition: all 0.2s ease;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .place-order-btn:active {
      transform: scale(0.98);
      box-shadow: 0 2px 8px rgba(74, 144, 226, 0.6);
    }

    .place-order-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
      box-shadow: none;
    }

    /* Empty cart state */
    .empty-cart {
      text-align: center;
      padding: 60px 20px;
      color: #666;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .empty-cart i {
      font-size: 64px;
      color: #ddd;
      margin-bottom: 20px;
    }

    .empty-cart h3 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #333;
    }

    .empty-cart p {
      font-size: 14px;
      margin-bottom: 30px;
    }

    .continue-shopping-btn {
      background: #4A90E2;
      color: #fff;
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s ease;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .continue-shopping-btn:hover {
      background: #357abd;
    }

    .swipe-hint {
  position: absolute;
  top: 50%;
  right: 140px; /* Adjusted to account for larger delete area */
  transform: translateY(-50%);
  color: #ccc;
  font-size: 12px;
  opacity: 0.7;
  animation: swipeHint 2s infinite;
  pointer-events: none;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

@keyframes swipeHint {
  0%, 100% { 
    transform: translateY(-50%) translateX(0); 
    opacity: 0.7;
  }
  50% { 
    transform: translateY(-50%) translateX(-15px); 
    opacity: 1;
  }
}

.swipe-item[style*="translateX(-120px)"] {
  box-shadow: -8px 0 16px rgba(0, 0, 0, 0.1);
}

/* Responsive adjustments for mobile */
@media (max-width: 480px) {
  .delete-background {
    width: 100px; /* Slightly smaller on mobile */
    font-size: 20px;
  }
  
  .delete-background::after {
    font-size: 10px;
    margin-left: 6px;
  }
  
  .swipe-hint {
    right: 120px;
    font-size: 11px;
  }
}

    /* Responsive adjustments */
    @media (max-width: 480px) {
      .cart-section {
        margin: 10px;
      }
      
      .section-header {
        padding: 15px;
        font-size: 16px;
      }
      
      .cart-item {
        padding: 12px 15px;
      }
      
      .item-image {
        width: 50px;
        height: 50px;
        margin-right: 12px;
      }
      
      .item-name {
        font-size: 13px;
      }
      
      .item-price {
        font-size: 14px;
      }
      
      .summary-row {
        padding: 10px 15px;
        font-size: 13px;
      }
      
      .place-order-btn {
        padding: 14px 18px;
        font-size: 15px;
      }
    }

    /* Client Selection Section */
.client-section {
    background: #fff;
    margin: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.client-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.client-header:hover {
    background-color: #f8f9fa;
}

.client-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.client-arrow {
    font-size: 16px;
    color: #666;
    transition: transform 0.2s ease;
}

.client-content {
    padding: 0 20px 20px;
}

.assigned-ads-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.ads-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4A90E2, #357abd);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.ads-icon i {
    font-size: 24px;
    color: white;
}

.ads-info {
    flex-grow: 1;
}

.ads-label {
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.ads-name {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.ads-change {
    font-size: 14px;
    color: #4A90E2;
    cursor: pointer;
    font-weight: 500;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.ads-change:hover {
    text-decoration: underline;
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: flex-end;
    z-index: 2000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.modal-content {
    background: #fff;
    width: 100%;
    border-radius: 20px 20px 0 0;
    max-height: 80vh;
    overflow-y: auto;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.modal-overlay.active .modal-content {
    transform: translateY(0);
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 25px;
    border-bottom: 1px solid #f0f0f0;
}

.modal-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    color: #666;
    cursor: pointer;
    padding: 5px;
}

.modal-body {
    padding: 25px;
}

.delivery-option {
    display: flex;
    align-items: center;
    padding: 20px;
    border: 2px solid #f0f0f0;
    border-radius: 12px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.delivery-option:hover {
    border-color: #4A90E2;
    background: #f8f9fa;
}

.delivery-option.selected {
    border-color: #4A90E2;
    background: #f0f8ff;
}

.delivery-option input[type="radio"] {
    width: 20px;
    height: 20px;
    margin-right: 15px;
    accent-color: #4A90E2;
}

.delivery-option-content {
    flex-grow: 1;
}

.delivery-option-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.pickup-date-section {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #f0f0f0;
}

.pickup-date-label {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.date-selector {
    width: 100%;
    padding: 15px;
    border: 2px solid #f0f0f0;
    border-radius: 12px;
    font-size: 16px;
    background: #fff;
    cursor: pointer;
    transition: border-color 0.2s ease;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.date-selector:focus {
    outline: none;
    border-color: #4A90E2;
}

.update-btn {
    width: 100%;
    background: linear-gradient(135deg, #4A90E2, #357abd);
    color: #fff;
    border: none;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 12px;
    cursor: pointer;
    margin-top: 25px;
    transition: all 0.2s ease;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.update-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(74, 144, 226, 0.3);
}

.update-btn:active {
    transform: translateY(0);
}


  </style>
@endsection

@section('javascript')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let cartData = [];
    
    try {
        const storedCartData = localStorage.getItem('cartData');
        if (storedCartData) {
            cartData = JSON.parse(storedCartData);
            console.log('Parsed cartData:', cartData);
        } else {
            console.log('No cartData found in localStorage');
        }
    } catch (error) {
        console.error('Error loading cart data:', error);
        cartData = [];
    }

    let isSwipeActive = false;
    let startX = 0;
    let startY = 0;
    let currentX = 0;
    let currentY = 0;
    let activeSwipeItem = null;
    let swipeDirection = null;

    const SWIPE_THRESHOLD = 50;
    const MAX_SWIPE_DISTANCE = 120;
    const MIN_MOVEMENT_THRESHOLD = 15;

    function initSwipeListeners() {
        document.querySelectorAll('.swipe-item').forEach(item => {
            item.addEventListener('touchstart', handleTouchStart, { passive: true });
            item.addEventListener('touchmove', handleTouchMove, { passive: false });
            item.addEventListener('touchend', handleTouchEnd, { passive: true });

            item.addEventListener('mousedown', handleMouseStart);
            item.addEventListener('mousemove', handleMouseMove);
            item.addEventListener('mouseup', handleMouseEnd);
            item.addEventListener('mouseleave', handleMouseEnd);
        });
    }

    // Check if the target element should prevent swipe
    function shouldPreventSwipe(target) {
        const preventSwipeElements = [
            'input', 'button', 'select', 'textarea', 
            '.qty-input', '.quantity-btn', '.plus-btn', '.minus-btn'
        ];
        
        return preventSwipeElements.some(selector => {
            if (selector.startsWith('.')) {
                return target.classList.contains(selector.substring(1));
            }
            return target.tagName.toLowerCase() === selector;
        }) || target.closest('.item-quantity');
    }

    function handleTouchStart(e) {
        // Don't start swipe if touching interactive elements
        if (shouldPreventSwipe(e.target)) {
            return;
        }
        
        const touch = e.touches[0];
        handleStart(touch.clientX, touch.clientY, e.currentTarget);
    }

    function handleMouseStart(e) {
        // Don't start swipe if clicking interactive elements
        if (shouldPreventSwipe(e.target)) {
            return;
        }
        
        e.preventDefault();
        handleStart(e.clientX, e.clientY, e.currentTarget);
    }

    function handleStart(clientX, clientY, element) {
        if (activeSwipeItem && activeSwipeItem !== element) {
            resetSwipe(activeSwipeItem);
        }
        
        isSwipeActive = true;
        startX = clientX;
        startY = clientY;
        currentX = clientX;
        currentY = clientY;
        activeSwipeItem = element;
        swipeDirection = null;
    }

    function handleTouchMove(e) {
        if (!isSwipeActive) return;
        
        const touch = e.touches[0];
        currentX = touch.clientX;
        currentY = touch.clientY;
        
        if (swipeDirection === null) {
            const deltaX = Math.abs(currentX - startX);
            const deltaY = Math.abs(currentY - startY);
            
            if (deltaX > MIN_MOVEMENT_THRESHOLD || deltaY > MIN_MOVEMENT_THRESHOLD) {
                if (deltaX > deltaY) {
                    swipeDirection = 'horizontal';
                } else {
                    swipeDirection = 'vertical';
                }
            }
        }
        
        if (swipeDirection === 'horizontal') {
            e.preventDefault();
            handleMove();
        } else if (swipeDirection === 'vertical') {
            resetSwipe(activeSwipeItem);
            isSwipeActive = false;
            activeSwipeItem = null;
            swipeDirection = null;
        }
    }

    function handleMouseMove(e) {
        if (!isSwipeActive) return;
        
        currentX = e.clientX;
        currentY = e.clientY;
        
        e.preventDefault();
        swipeDirection = 'horizontal';
        handleMove();
    }

    function handleMove() {
        const diffX = startX - currentX;
        
        if (diffX > 0 && diffX <= MAX_SWIPE_DISTANCE) {
            activeSwipeItem.classList.add('swiping');
            activeSwipeItem.style.transform = `translateX(-${diffX}px)`;
        } else if (diffX <= 0) {
            resetSwipe(activeSwipeItem);
        } else if (diffX > MAX_SWIPE_DISTANCE) {
            activeSwipeItem.style.transform = `translateX(-${MAX_SWIPE_DISTANCE}px)`;
        }
    }

    function handleTouchEnd(e) {
        handleEnd();
    }

    function handleMouseEnd(e) {
        handleEnd();
    }

    function handleEnd() {
        if (!isSwipeActive || !activeSwipeItem) return;
        
        isSwipeActive = false;
        if (activeSwipeItem) {
            activeSwipeItem.classList.remove('swiping');
        }
        
        if (swipeDirection === 'horizontal') {
            const diffX = startX - currentX;
            
            if (diffX > SWIPE_THRESHOLD) {
                activeSwipeItem.style.transform = `translateX(-${MAX_SWIPE_DISTANCE}px)`;
                activeSwipeItem.style.boxShadow = '-8px 0 16px rgba(0, 0, 0, 0.1)';
                if ('vibrate' in navigator) {
                    navigator.vibrate(50);
                }
            } else {
                resetSwipe(activeSwipeItem);
            }
        }
        
        swipeDirection = null;
    }

    function resetSwipe(element) {
        if (element) {
            element.style.transform = 'translateX(0)';
            element.style.boxShadow = '';
            element.classList.remove('swiping');
        }
    }

    function resetAllSwipes() {
        document.querySelectorAll('.swipe-item').forEach(item => {
            resetSwipe(item);
        });
        activeSwipeItem = null;
        isSwipeActive = false;
        swipeDirection = null;
    }

    // Close swipes when clicking outside or on interactive elements
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.swipe-container') && !e.target.closest('.delete-background')) {
            resetAllSwipes();
        }
        // Also close if clicking on interactive elements
        if (shouldPreventSwipe(e.target)) {
            resetAllSwipes();
        }
    });

    let scrollTimer;
    document.addEventListener('scroll', function() {
        if (activeSwipeItem) {
            resetAllSwipes();
        }
        
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(() => {
            resetAllSwipes();
        }, 100);
    }, { passive: true });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && activeSwipeItem) {
            resetAllSwipes();
        }
    });

    // Enhanced quantity input handlers
    window.updateQuantityFromInput = function(itemId, newQuantity) {
        const quantity = parseInt(newQuantity);
        
        if (isNaN(quantity) || quantity < 1) {
            const input = document.querySelector(`.qty-input[data-id="${itemId}"]`);
            input.value = 1;
            updateItemQuantity(itemId, 1);
            return;
        }
        
        if (quantity > 999) {
            const input = document.querySelector(`.qty-input[data-id="${itemId}"]`);
            input.value = 999;
            updateItemQuantity(itemId, 999);
            return;
        }
        
        updateItemQuantity(itemId, quantity);
    };

    window.validateQuantityInput = function(input) {
        const value = parseInt(input.value);
        if (isNaN(value) || value < 1) {
            input.value = 1;
            updateQuantityFromInput(input.dataset.id, 1);
        } else if (value > 999) {
            input.value = 999;
            updateQuantityFromInput(input.dataset.id, 999);
        }
    };

    // Handle input focus to close swipes
    window.handleInputFocus = function(input) {
        resetAllSwipes();
        setTimeout(() => input.select(), 50);
    };

    function updateItemQuantity(itemId, newQuantity) {
        const item = cartData.find(item => item.id == itemId);
        if (item) {
            item.quantity = newQuantity;
            localStorage.setItem('cartData', JSON.stringify(cartData));
            updateCartStats();
            updateOrderSummary();
            updateQuantityDisplays();
        }
    }

    function updateQuantityDisplays() {
        cartData.forEach(item => {
            const input = document.querySelector(`.qty-input[data-id="${item.id}"]`);
            if (input && input !== document.activeElement) {
                input.value = item.quantity;
            }
        });
    }

    function renderCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        
        if (cartData.length === 0) {
            cartItemsContainer.innerHTML = `
                <div class="empty-cart">
                    <i class="bi bi-cart-x"></i>
                    <h3>Your cart is empty</h3>
                    <p>Add some items to your cart to continue</p>
                    <button class="continue-shopping-btn" onclick="window.history.back()">
                        Continue Shopping
                    </button>
                </div>
            `;
            document.querySelector('.place-order-wrapper').style.display = 'none';
            return;
        }

        let cartHTML = '';
        cartData.forEach(item => {
            let colorIndicatorHTML = '';
            if (item.color) {
                colorIndicatorHTML = `
                    <div class="color-indicator">
                        <div class="color-dot ${item.color}"></div>
                        <span>Color: ${item.color.charAt(0).toUpperCase() + item.color.slice(1)}</span>
                    </div>
                `;
            }

            cartHTML += `
                <div class="swipe-container">
                    <div class="delete-background" onclick="removeItemWithAnimation('${item.id}')">
                        <i class="bi bi-trash"></i>
                    </div>
                    <div class="swipe-item" data-id="${item.id}">
                        <div class="cart-item">
                            <div class="item-image">
                                <img src="${item.image}" alt="${item.originalName || item.name}">
                            </div>
                            <div class="item-details">
                                <div class="item-name">${item.originalName || item.name}</div>
                                ${colorIndicatorHTML}
                                <div class="item-price">₱ ${item.price.toFixed(2)}</div>
                                <div class="item-quantity">
                                    <button class="quantity-btn minus-btn" data-id="${item.id}">−</button>
                                    <input type="number" 
                                          class="qty-input" 
                                          value="${item.quantity}" 
                                          min="1" 
                                          max="999"
                                          data-id="${item.id}"
                                          oninput="handleQuantityInput(this)"
                                          onchange="updateQuantityFromInput('${item.id}', this.value)"
                                          onblur="validateQuantityInput(this)"
                                          onfocus="handleInputFocus(this)">
                                    <button class="quantity-btn plus-btn" data-id="${item.id}">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        cartItemsContainer.innerHTML = cartHTML;

        // Initialize swipe listeners FIRST
        initSwipeListeners();

        // Then initialize quantity button listeners
        document.querySelectorAll('.minus-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                resetAllSwipes(); // Close any open swipes
                const itemId = this.dataset.id;
                const currentInput = document.querySelector(`.qty-input[data-id="${itemId}"]`);
                const currentQty = parseInt(currentInput.value);
                if (currentQty > 1) {
                    updateItemQuantity(itemId, currentQty - 1);
                }
            });
        });

        document.querySelectorAll('.plus-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                resetAllSwipes(); // Close any open swipes
                const itemId = this.dataset.id;
                const currentInput = document.querySelector(`.qty-input[data-id="${itemId}"]`);
                const currentQty = parseInt(currentInput.value);
                if (currentQty < 999) {
                    updateItemQuantity(itemId, currentQty + 1);
                }
            });
        });

        // Show place order button
        const placeOrderWrapper = document.querySelector('.place-order-wrapper');
        if (placeOrderWrapper) {
            placeOrderWrapper.style.display = 'block';
        }
    }

    window.removeItemWithAnimation = function(itemId) {
        const swipeContainer = document.querySelector(`[data-id="${itemId}"]`).closest('.swipe-container');
        
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            swipeContainer.style.transition = 'all 0.3s ease';
            swipeContainer.style.transform = 'translateX(-100%)';
            swipeContainer.style.opacity = '0';
            
            setTimeout(() => {
                removeItem(itemId);
            }, 300);
        } else {
            resetAllSwipes();
        }
    };

    function removeItem(itemId) {
        cartData = cartData.filter(item => item.id != itemId);
        localStorage.setItem('cartData', JSON.stringify(cartData));
        updateCartStats();
        renderCartItems();
        updateOrderSummary();
    }

    function updateCartStats() {
        const totalItems = cartData.reduce((sum, item) => sum + item.quantity, 0);
        const totalAmount = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        localStorage.setItem('cartItems', totalItems.toString());
        localStorage.setItem('cartTotal', totalAmount.toFixed(2));
    }

    function updateOrderSummary() {
        const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const total = subtotal;

        const subtotalElement = document.getElementById('subtotal');
        const totalFinalElement = document.getElementById('total-final');
        const finalTotalElement = document.getElementById('final-total');

        if (subtotalElement) subtotalElement.textContent = `₱ ${subtotal.toFixed(2)}`;
        if (totalFinalElement) totalFinalElement.textContent = `₱ ${total.toFixed(2)}`;
        if (finalTotalElement) finalTotalElement.textContent = `₱ ${total.toFixed(2)}`;
    }

    const placeOrderBtn = document.getElementById('place-order-btn');
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener('click', function() {
            if (cartData.length === 0) {
                alert('Your cart is empty. Please add some items first.');
                return;
            }

            const paymentMethodElement = document.querySelector('input[name="payment_method"]:checked');
            const paymentMethod = paymentMethodElement ? paymentMethodElement.value : 'cod';
            
            const orderData = {
                items: cartData,
                payment_method: paymentMethod,
                subtotal: cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0),
                total: cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0),
                order_notes: document.getElementById('order-notes') ? document.getElementById('order-notes').value : ''
            };

            localStorage.setItem('orderData', JSON.stringify(orderData));

            this.disabled = true;
            this.innerHTML = 'Processing... <i class="bi bi-hourglass-split"></i>';

            setTimeout(() => {
                window.location.href = "{{ route('order-payment') }}";
            }, 1000);

            console.log('Order Data:', orderData);
        });
    }

    // Initialize everything
    renderCartItems();
    updateOrderSummary();
});
</script>

<script>
  // Client Modal Functions
function openClientModal() {
    const modal = document.getElementById('clientModal');
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    if (typeof resetAllSwipes === 'function') {
        resetAllSwipes(); // Close any open cart swipes if function exists
    }
}

function closeClientModal() {
    const modal = document.getElementById('clientModal');
    modal.classList.remove('active');
    document.body.style.overflow = '';
}

function selectDeliveryOption(element, type) {
    // Remove selected class from all options
    document.querySelectorAll('.delivery-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    // Add selected class to clicked option
    element.classList.add('selected');
    
    // Check the radio button
    const radio = element.querySelector('input[type="radio"]');
    radio.checked = true;
}

function updateClientSelection() {
    const selectedMethod = document.querySelector('input[name="delivery_method"]:checked').value;
    const selectedDate = document.getElementById('pickupDate').value;
    
    console.log('Selected method:', selectedMethod);
    console.log('Selected date:', selectedDate);
    
    // Here you would typically save the selection and update the UI
    closeClientModal();
    
    // You can customize this notification or remove it
    // alert(`Updated: ${selectedMethod.charAt(0).toUpperCase() + selectedMethod.slice(1)} on ${selectedDate}`);
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const clientModal = document.getElementById('clientModal');
    if (clientModal) {
        clientModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeClientModal();
            }
        });
    }
    
    // Close modal with escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeClientModal();
        }
    });
});
  </script>