@extends('layouts.header')


@section('content')
<div class="order-payment-page">
  <div class="content-area-fix">
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Order Payment</h1>
    </div>

    <div class="section-card">
      <div class="section-header">
        <i class="bi bi-receipt"></i>
        Order Summary
      </div>
      <div class="section-content">
        <div class="info-row">  
          <span class="info-label">Sales Invoice:</span>
          <span class="info-value" id="order-id">#ORD-001</span>
        </div>
        <div class="info-row">
          <span class="info-label">Payment Method:</span>
          <span class="info-value" id="payment-method">Cash on Delivery</span>
        </div>
        <div class="info-row">
          <span class="info-label">Total Items:</span>
          <span class="info-value" id="total-items">0</span>
        </div>
        <div class="info-row">
          <span class="info-label">Total Amount:</span>
          <span class="info-value" id="order-total">₱ 0.00</span>
        </div>
        
        <div class="order-items" id="order-items-list">
          <!-- Items will be populated by JavaScript -->
        </div>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">
        <i class="bi bi-credit-card"></i>
        Payment Details
      </div>
      <div class="section-content">
        <div class="form-group">
          <label class="form-label">Selected Payment Method</label>
          <div class="payment-method-display" id="payment-method-display">
            <div class="payment-icon cod">
              <i class="bi bi-cash-coin"></i>
            </div>
            <div class="payment-details">
              <div class="payment-name">Cash on Delivery</div>
              <div class="payment-desc">Customer pays upon delivery</div>
            </div>
          </div>
        </div>

        <div class="form-group" id="payment-amount-group">
          <label class="form-label" for="payment-amount">Amount Received from Customer *</label>
          <div class="currency-input">
            <span class="currency-symbol">₱</span>
            <input type="number" 
                   id="payment-amount" 
                   class="form-control" 
                   step="0.01" 
                   min="0" 
                   placeholder="0.00"
            >
          </div>
          
          <div class="change-calculation" id="change-display" style="display: none;">
            <div class="change-amount" id="change-amount">Change: ₱ 0.00</div>
          </div>
        </div>

        <div class="form-group" id="gcash-status-group" style="display: none;">
          <div class="gcash-status">
            <div class="gcash-status-text">⏳ GCash Payment Pending</div>
            <div class="gcash-status-desc">Your payment is being processed via GCash. This may take a few moments.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="complete-order-wrapper">
      <button class="complete-order-btn" id="complete-order-btn">
        <i class="bi bi-check-circle"></i>
        Complete Order
      </button>
    </div>
  </div>
</div>
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

    /* Card sections */
    .section-card {
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
      display: flex;
      align-items: center;
      gap: 10px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .section-content {
      padding: 20px;
    }

    /* Order info styling */
    .info-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0;
      font-size: 14px;
      border-bottom: 1px solid #f5f5f5;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .info-row:last-child {
      border-bottom: none;
      font-size: 16px;
      font-weight: 700;
      color: #4A90E2;
      background: #f8f9fa;
      margin: 10px -20px -20px;
      padding: 15px 20px;
    }

    .info-label {
      color: #666;
    }

    .info-value {
      color: #333;
      font-weight: 600;
    }

    .order-items {
      border-top: 1px solid #f0f0f0;
      margin-top: 15px;
      padding-top: 15px;
    }


    .order-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      font-size: 13px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

     .quantity-item {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 28px;          /* adjust for size */
      height: 28px;
      background-color: #1976d2; /* same blue as in screenshot */
      color: #fff;
      font-weight: 600;
      font-size: 14px;
      border-radius: 6px;   /* for rounded corners */
      margin-right: 10px;   /* spacing before item name */
    }


    .item-info {
      flex-grow: 1;
    }

    .item-name {
      color: #333;
      font-weight: 500;
      margin-bottom: 2px;
    }

    .item-details {
      color: #666;
      font-size: 12px;
    }

    .item-total {
      color: #4A90E2;
      font-weight: 600;
    }

    .payment-method-display {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 15px;
      background: #f8f9fa;
      border-radius: 8px;
      border: 2px solid #e1e8ed;
    }

    .payment-icon {
      width: 40px;
      height: 40px;
      background: #4A90E2;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: white;
      flex-shrink: 0;
    }

    .payment-icon.cod {
      background: #28a745;
    }

    .payment-icon.gcash {
      background: #007DFF;
    }

    .payment-details {
      flex-grow: 1;
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

    .form-group {
      margin-bottom: 20px;
    }

    .form-group:last-child {
      margin-bottom: 0;
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
      border: 2px solid #e1e8ed;
      border-radius: 8px;
      font-size: 16px;
      background: #fff;
      transition: all 0.2s ease;
      box-sizing: border-box;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .form-control:focus {
      outline: none;
      border-color: #4A90E2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
    }

    .currency-input {
      position: relative;
    }

    .currency-symbol {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      color: #666;
      font-weight: 600;
    }

    .currency-input .form-control {
      padding-left: 35px;
    }

    .change-calculation {
      background: #e8f4fd;
      border: 2px solid #4A90E2;
      border-radius: 8px;
      padding: 15px;
      margin-top: 15px;
    }

    .change-amount {
      font-size: 18px;
      font-weight: 700;
      color: #4A90E2;
      text-align: center;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .insufficient-payment {
      background: #ffe6e6;
      border-color: #ff4757;
      color: #ff4757;
    }

    .gcash-status {
      background: #e8f5e8;
      border: 2px solid #28a745;
      border-radius: 8px;
      padding: 15px;
      margin-top: 15px;
      text-align: center;
    }

    .gcash-status-text {
      font-size: 16px;
      font-weight: 600;
      color: #28a745;
      margin-bottom: 5px;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .gcash-status-desc {
      font-size: 12px;
      color: #666;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .complete-order-wrapper {
      bottom: 120px;
      left: var(--sidebar-width);
      right: 0;
      margin-top: 20px;
      padding: 0 15px;
      transition: left var(--transition-duration) ease;
      background: transparent;
      pointer-events: none;
    }

    .complete-order-btn {
      pointer-events: auto;
    }

    .sidebar.collapsed ~ .main-content .complete-order-wrapper {
      left: var(--sidebar-collapsed-width);
    }

    @media (max-width: 768px) {
      .complete-order-wrapper {
        left: 0 !important;
        right: 0;
        bottom: 120px;
      }
      
      .complete-order-wrapper {
        z-index: 1100;
      }
    }

    .complete-order-btn {
      width: 100%;
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      color: #fff;
      border: none;
      padding: 16px 20px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
      cursor: pointer;
      transition: all 0.2s ease;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .complete-order-btn:active {
      transform: scale(0.98);
    }

    .complete-order-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
      box-shadow: none;
    }

    @keyframes checkmark {
      0% {
        transform: scale(0);
      }
      50% {
        transform: scale(1.2);
      }
      100% {
        transform: scale(1);
      }
    }

    .success-checkmark {
      animation: checkmark 0.3s ease-in-out;
    }

    @media (max-width: 480px) {
      .section-card {
        margin: 10px;
      }
      
      .section-header {
        padding: 15px;
        font-size: 16px;
      }
      
      .section-content {
        padding: 15px;
      }
      
      .info-row {
        padding: 10px 0;
        font-size: 13px;
      }
      
      .complete-order-btn {
        padding: 14px 18px;
        font-size: 15px;
      }
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
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
      border: none !important;
      border-radius: 10px !important;
      font-weight: 600 !important;
      padding: 12px 24px !important;
      font-family: 'Inter', sans-serif !important;
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4) !important;
    }
    
    .swal2-confirm:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 6px 16px rgba(40, 167, 69, 0.5) !important;
    }
    
    .swal2-deny {
      background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%) !important;
      border: none !important;
      border-radius: 10px !important;
      font-weight: 600 !important;
      padding: 12px 24px !important;
      font-family: 'Inter', sans-serif !important;
      box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4) !important;
    }
    
    .swal2-deny:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 6px 16px rgba(74, 144, 226, 0.5) !important;
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
    
    .order-completion-popup {
      animation: slideInUp 0.4s ease-out !important;
    }
    
    @keyframes slideInUp {
      from {
        transform: translateY(50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
    
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-10px);
      }
      60% {
        transform: translateY(-5px);
      }
    }
    
    .swal2-timer-progress-bar {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
    }
    
    .swal2-icon.swal2-success {
      border-color: #28a745 !important;
      color: #28a745 !important;
    }
    
    .swal2-icon.swal2-success .swal2-success-line {
      background-color: #28a745 !important;
    }
    
    .swal2-icon.swal2-success .swal2-success-ring {
      border-color: rgba(40, 167, 69, 0.3) !important;
    }
  </style>
@endsection

@section('js')
<!-- SweetAlert2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get order data from localStorage
    let orderData = {};
    let cartData = [];
    
    try {
        const storedOrderData = localStorage.getItem('orderData');
        const storedCartData = localStorage.getItem('cartData');
        
        if (storedOrderData) {
            orderData = JSON.parse(storedOrderData);
        }
        
        if (storedCartData) {
            cartData = JSON.parse(storedCartData);
        }
    } catch (error) {
        console.error('Error loading order data:', error);
        Swal.fire({
            title: 'Error Loading Data',
            text: 'Error loading order data. Please go back and try again.',
            icon: 'error',
            confirmButtonText: 'Go Back'
        }).then(() => {
            history.back();
        });
        return;
    }

    // Initialize page with order data
    function initializeOrderPage() {
        // Generate order ID
        const orderId = 'ORD-' + Date.now().toString().slice(-6);
        document.getElementById('order-id').textContent = '#' + orderId;
        
        // Display order summary
        const totalItems = cartData.reduce((sum, item) => sum + item.quantity, 0);
        const totalAmount = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        document.getElementById('total-items').textContent = totalItems;
        document.getElementById('order-total').textContent = '₱ ' + totalAmount.toFixed(2);
        
        // Display payment method
        const paymentMethod = orderData.payment_method || 'cod';
        updatePaymentMethodDisplay(paymentMethod);
        
        // Display order items
        displayOrderItems();
        
        // Store order ID for completion
        orderData.order_id = orderId;
        orderData.total_amount = totalAmount;
    }

    // Update payment method display
    function updatePaymentMethodDisplay(method) {
        const display = document.getElementById('payment-method-display');
        const paymentMethodText = document.getElementById('payment-method');
        const paymentAmountGroup = document.getElementById('payment-amount-group');
        const gcashStatusGroup = document.getElementById('gcash-status-group');
        
        if (method === 'gcash') {
            display.innerHTML = `
                <div class="payment-icon gcash">
                    <i class="bi bi-phone-fill"></i>
                </div>
                <div class="payment-details">
                    <div class="payment-name">GCash Payment</div>
                    <div class="payment-desc">Payment completed via GCash</div>
                </div>
            `;
            paymentMethodText.textContent = 'GCash';
            paymentAmountGroup.style.display = 'none';
            gcashStatusGroup.style.display = 'block';
        } else {
            display.innerHTML = `
                <div class="payment-icon cod">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div class="payment-details">
                    <div class="payment-name">Cash on Delivery</div>
                    <div class="payment-desc">Customer pays upon delivery</div>
                </div>
            `;
            paymentMethodText.textContent = 'Cash on Delivery';
            paymentAmountGroup.style.display = 'block';
            gcashStatusGroup.style.display = 'none';
        }
    }

    // Display order items
    function displayOrderItems() {
        const container = document.getElementById('order-items-list');
        let itemsHTML = '';
        
        cartData.forEach(item => {
            const itemTotal = item.price * item.quantity;
            let colorInfo = '';
            
            if (item.color) {
                colorInfo = ` (${item.color.charAt(0).toUpperCase() + item.color.slice(1)})`;
            }
            
            itemsHTML += `
                <div class="order-item">
                    <div class="quantity-item">${item.quantity}</div>
                    <div class="item-info">
                        <div class="item-name">${item.originalName || item.name}${colorInfo}</div>
                        <div class="item-details">₱${item.price.toFixed(2)}</div>
                    </div>
                    <div class="item-total">₱${itemTotal.toFixed(2)}</div>
                </div>
            `;
        });
        
        container.innerHTML = itemsHTML;
    }

    // Handle payment amount input (for COD only)
    const paymentAmountInput = document.getElementById('payment-amount');
    const changeDisplay = document.getElementById('change-display');
    const changeAmount = document.getElementById('change-amount');
    const completeOrderBtn = document.getElementById('complete-order-btn');

    // If the user wants to make the button of add to cart required
    // if (paymentAmountInput) {
    //     paymentAmountInput.addEventListener('input', function() {
    //         const receivedAmount = parseFloat(this.value) || 0;
    //         const totalAmount = orderData.total_amount || 0;
    //         const change = receivedAmount - totalAmount;
            
    //         if (receivedAmount > 0) {
    //             changeDisplay.style.display = 'block';
                
    //             if (change >= 0) {
    //                 changeDisplay.className = 'change-calculation';
    //                 changeAmount.textContent = `Change: ₱${change.toFixed(2)}`;
    //                 completeOrderBtn.disabled = false;
    //             } else {
    //                 changeDisplay.className = 'change-calculation insufficient-payment';
    //                 changeAmount.textContent = `Insufficient: ₱${Math.abs(change).toFixed(2)} more needed`;
    //                 completeOrderBtn.disabled = true;
    //             }
    //         } else {
    //             changeDisplay.style.display = 'none';
    //             completeOrderBtn.disabled = true;
    //         }
    //     });
    // }

    if (paymentAmountInput) {
        paymentAmountInput.addEventListener('input', function() {
            const receivedAmount = parseFloat(this.value) || 0;
            const totalAmount = orderData.total_amount || 0;
            const change = receivedAmount - totalAmount;

            if (receivedAmount > 0) {
                changeDisplay.style.display = 'block';
                if (change >= 0) {
                    changeDisplay.className = 'change-calculation';
                    changeAmount.textContent = `Change: ₱${change.toFixed(2)}`;
                } else {
                    changeDisplay.className = 'change-calculation insufficient-payment';
                    changeAmount.textContent = `Insufficient: ₱${Math.abs(change).toFixed(2)} more needed`;
                }
            } else {
                changeDisplay.style.display = 'none';
            }
            // NOTE: do not change completeOrderBtn.disabled here
        });
    }

    // Complete order functionality (updated with SweetAlert2)
    completeOrderBtn.addEventListener('click', function() {
        const paymentMethod = orderData.payment_method || 'cod';
        let isValid = true;
        
        // Validate payment for COD
        // if (paymentMethod === 'cod') {
        //     const receivedAmount = parseFloat(paymentAmountInput.value) || 0;
        //     const totalAmount = orderData.total_amount || 0;
            
        //     if (receivedAmount < totalAmount) {
        //         // Use SweetAlert2 for error message
        //         Swal.fire({
        //             title: '⚠️ Insufficient Payment',
        //             text: 'Please enter the correct amount received from the customer.',
        //             icon: 'warning',
        //             confirmButtonText: 'OK',
        //             customClass: {
        //                 popup: 'swal2-popup-custom'
        //             }
        //         });
        //         paymentAmountInput.focus();
        //         return;
        //     }
            
        //     orderData.received_amount = receivedAmount;
        //     orderData.change_amount = receivedAmount - totalAmount;
        // }
        
        // Disable button and show processing
        this.disabled = true;
        this.innerHTML = '<i class="bi bi-hourglass-split"></i> Processing...';
        
        // Simulate order completion
        setTimeout(() => {
            // Add completion timestamp
            orderData.completed_at = new Date().toLocaleString('en-PH', {
                year: 'numeric',
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
            orderData.status = 'completed';
            
            // Store completed order
            const completedOrders = JSON.parse(localStorage.getItem('completedOrders') || '[]');
            completedOrders.push(orderData);
            localStorage.setItem('completedOrders', JSON.stringify(completedOrders));
            
            // Show success message
            this.innerHTML = '<i class="bi bi-check-circle success-checkmark"></i> Order Completed!';
            this.className = 'complete-order-btn';
            
            // Clear cart data
            localStorage.removeItem('cartData');
            localStorage.removeItem('orderData');
            localStorage.removeItem('cartTotal');
            localStorage.removeItem('cartItems');
            
            Swal.fire({
                title: '✅ Order Completed!',
                text: 'Redirecting to products...',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                localStorage.clear();

                window.location.href = "{{ url('products') }}";
            });

            
        }, 2000);
    });

    // Order completion display functions
    function showOrderCompletion(orderData, paymentMethod) {
        if (paymentMethod === 'gcash') {
            showGCashOrderCompletion(orderData);
        } else {
            showCODOrderCompletion(orderData);
        }
    }

    // Initialize the page
    initializeOrderPage();
    
    // Set initial state for complete button based on payment method
    if (orderData.payment_method === 'gcash') {
        completeOrderBtn.disabled = false;
    } else {
        completeOrderBtn.disabled = false;
    }
});
</script>
@endsection