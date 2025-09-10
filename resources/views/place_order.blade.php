@extends('layouts.header')
@section('css')
  <style>
    body {
      background: #f8f9fa;
      padding-bottom: 150px !important;
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Header styling */
    .page-header {
      background: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0;
    }

    .page-title {
      font-size: 20px;
      font-weight: 600;
      color: #4A90E2;
      margin: 0;
    }

    .back-btn {
      background: none;
      border: none;
      color: #666;
      font-size: 18px;
      cursor: pointer;
      padding: 5px;
    }

    .header-icons {
      display: flex;
      gap: 15px;
      align-items: center;
      margin-left:25px;
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
    }

    .cart-item {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      border-bottom: 1px solid #f0f0f0;
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
    }

    .item-image img {
      max-width: 80%;
      max-height: 80%;
      object-fit: contain;
    }

    .item-details {
      flex-grow: 1;
    }

    .item-name {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      margin-bottom: 5px;
      line-height: 1.3;
    }

    /* Color indicator for stove items */
    .color-indicator {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 2px;
      font-size: 12px;
      color: #666;
    }

    .color-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      border: 1px solid #ddd;
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
    }

    .item-quantity {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .quantity-btn {
      background: #4A90E2;
      border: none;
      color: #fff;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      font-size: 14px;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .quantity-btn:hover {
      background: #357abd;
      transform: scale(1.1);
    }

    .quantity-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
    }

    .qty-display {
      font-size: 14px;
      font-weight: 600;
      min-width: 20px;
      text-align: center;
    }

    /* Order Summary Section */
    .summary-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 20px;
      font-size: 14px;
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
    }

    .payment-details {
      flex-grow: 1;
    }

    .payment-name {
      font-size: 14px;
      font-weight: 600;
      color: #333;
      margin-bottom: 2px;
    }

    .payment-desc {
      font-size: 12px;
      color: #666;
    }

    /* Place Order Button */
    .place-order-wrapper {
      position: fixed;
      bottom: 100px;
      left: 15px;
      right: 15px;
      z-index: 1000;
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

    /* Bottom Navigation */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: #fff;
      padding: 10px 0;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 999;
    }

    .bottom-nav i {
      font-size: 24px;
      color: #ccc;
    }

    .bottom-nav i.active {
      color: #4A90E2;
    }

    /* Empty cart state */
    .empty-cart {
      text-align: center;
      padding: 60px 20px;
      color: #666;
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
    }

    .continue-shopping-btn:hover {
      background: #357abd;
    }

    /* Remove item button */
    .remove-item-btn {
      background: #ff4757;
      border: none;
      color: #fff;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      font-size: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: all 0.2s ease;
      margin-left: 10px;
    }

    .remove-item-btn:hover {
      background: #ff3742;
      transform: scale(1.1);
    }
  </style>
@endsection

@section('content')
  <!-- Header -->
  <div class="page-header">
    <button class="back-btn" onclick="history.back()">
      <i class="bi bi-arrow-left"></i>
    </button>
    <h1 class="page-title">Place Order</h1>
    <div class="header-icons">
    </div>
  </div>

  <!-- Cart Items Section -->
  <div class="cart-section">
    <div class="section-header">
      <i class="bi bi-cart-fill"></i> Cart Items
    </div>
    <div id="cart-items">
      <!-- Cart items will be populated by JavaScript -->
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

  <!-- Customer Information Section -->
  <!-- <div class="cart-section">
    <div class="section-header">
      <i class="bi bi-person-fill"></i> Customer Information
    </div>
    <form id="order-form">
      <div class="form-group">
        <label class="form-label" for="customer-name">Full Name *</label>
        <input type="text" id="customer-name" name="customer_name" class="form-control" required>
      </div>
      <div class="form-group">
        <label class="form-label" for="customer-phone">Phone Number *</label>
        <input type="tel" id="customer-phone" name="customer_phone" class="form-control" required>
      </div>
      <div class="form-group">
        <label class="form-label" for="customer-address">Delivery Address *</label>
        <textarea id="customer-address" name="customer_address" class="form-control" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label class="form-label" for="order-notes">Order Notes (Optional)</label>
        <textarea id="order-notes" name="order_notes" class="form-control" rows="2" placeholder="Special instructions for your order..."></textarea>
      </div>
    </form>
  </div> -->

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

  <!-- Bottom Navigation -->
  <div class="bottom-nav">
    <i class="bi bi-grid-3x3-gap"></i>
    <i class="bi bi-star"></i>
    <i class="bi bi-clipboard-check active"></i>
  </div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get cart data from localStorage (set by the products page)
    let cartData = [];
    try {
        const storedCartData = localStorage.getItem('cartData');
        if (storedCartData) {
            cartData = JSON.parse(storedCartData);
        }
    } catch (error) {
        console.error('Error loading cart data:', error);
        cartData = [];
    }

    // Function to render cart items
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
            // Color indicator HTML (only for items with color)
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
                <div class="cart-item" data-id="${item.id}">
                    <div class="item-image">
                        <img src="${item.image}" alt="${item.originalName || item.name}">
                    </div>
                    <div class="item-details">
                        <div class="item-name">${item.originalName || item.name}</div>
                        ${colorIndicatorHTML}
                        <div class="item-price">₱ ${item.price.toFixed(2)}</div>
                        <div class="item-quantity">
                            <button class="quantity-btn minus-btn" data-id="${item.id}">−</button>
                            <span class="qty-display">${item.quantity}</span>
                            <button class="quantity-btn plus-btn" data-id="${item.id}">+</button>
                            <button class="remove-item-btn" data-id="${item.id}" title="Remove item">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        cartItemsContainer.innerHTML = cartHTML;

        // Add event listeners for quantity buttons
        document.querySelectorAll('.minus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemId = this.dataset.id;
                updateQuantity(itemId, -1);
            });
        });

        document.querySelectorAll('.plus-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemId = this.dataset.id;
                updateQuantity(itemId, 1);
            });
        });

        // Add event listeners for remove buttons
        document.querySelectorAll('.remove-item-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemId = this.dataset.id;
                removeItem(itemId);
            });
        });
    }

    // Function to update quantity
    function updateQuantity(itemId, change) {
        const item = cartData.find(item => item.id == itemId);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                cartData = cartData.filter(item => item.id != itemId);
            }
            
            // Update localStorage
            localStorage.setItem('cartData', JSON.stringify(cartData));
            updateCartStats();
            
            renderCartItems();
            updateOrderSummary();
        }
    }

    // Function to remove item completely
    function removeItem(itemId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            cartData = cartData.filter(item => item.id != itemId);
            
            // Update localStorage
            localStorage.setItem('cartData', JSON.stringify(cartData));
            updateCartStats();
            
            renderCartItems();
            updateOrderSummary();
        }
    }

    // Function to update cart statistics in localStorage
    function updateCartStats() {
        const totalItems = cartData.reduce((sum, item) => sum + item.quantity, 0);
        const totalAmount = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        localStorage.setItem('cartItems', totalItems.toString());
        localStorage.setItem('cartTotal', totalAmount.toFixed(2));
    }

    // Function to calculate and update order summary
    function updateOrderSummary() {
        const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const total = subtotal; // No additional fees for now

        document.getElementById('subtotal').textContent = `₱ ${subtotal.toFixed(2)}`;
        document.getElementById('total-final').textContent = `₱ ${total.toFixed(2)}`;
        document.getElementById('final-total').textContent = `₱ ${total.toFixed(2)}`;
    }

    // Place order functionality
    document.getElementById('place-order-btn').addEventListener('click', function() {
        if (cartData.length === 0) {
            alert('Your cart is empty. Please add some items first.');
            return;
        }

        const form = document.getElementById('order-form');
        
        // Validate required fields
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);

        // Get selected payment method
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        
        // Prepare order data
        const orderData = {
            items: cartData,
            customer_name: formData.get('customer_name'),
            customer_phone: formData.get('customer_phone'),
            customer_address: formData.get('customer_address'),
            order_notes: formData.get('order_notes'),
            payment_method: paymentMethod,
            subtotal: cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0),
            total: cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0)
        };

        // Disable button during processing
        this.disabled = true;
        this.innerHTML = 'Processing... <i class="bi bi-hourglass-split"></i>';

        // Here you would typically send the order data to your backend
        // For now, we'll simulate the order placement
        setTimeout(() => {
            alert('Order placed successfully!');
            
            // Clear cart data from localStorage
            localStorage.removeItem('cartData');
            localStorage.removeItem('cartTotal');
            localStorage.removeItem('cartItems');
            
            // Redirect back to products page or home
            window.history.back();
        }, 2000);

        console.log('Order Data:', orderData);
    });

    // Initialize the page
    renderCartItems();
    updateOrderSummary();
});
</script>
@endsection