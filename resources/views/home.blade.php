@extends('layouts.header')
@section('css')

  <style>
    body {
      background: #f5f7fa;
      padding-bottom: 80px; /* Space for fixed cart bar */
    }

    /* Product Card */
    .product-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
      padding: 12px;
      text-align: center;
      transition: transform 0.2s ease;
    }

    .product-card:hover {
      transform: translateY(-2px);
    }

    .product-card img {
      width: 100%;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 8px;
    }

    .product-name {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      min-height: 36px;
    }

    .product-price {
      font-size: 14px;
      font-weight: 600;
      color: #007bff;
      margin-top: 4px;
    }

    /* Quantity Controls */
    .quantity-controls {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-top: 8px;
    }

    .quantity-controls button {
      background: #007bff;
      border: none;
      color: #fff;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      font-size: 18px;
      line-height: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

.cart-summary-wrapper {
  position: fixed;
  bottom: 12%; /* 10% from the bottom */
  left: 0;
  width: 100%;
  display: flex;
  justify-content: center;
  z-index: 1000;
}

/* Button Styling */
.cart-summary-btn {
  width: 90%; /* 90% width of the screen */
  background: #007bff;
  color: #fff;
  border: none;
  padding: 15px 20px;
  font-size: 16px;
  font-weight: bold;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-radius: 12px;
  box-shadow: 0 -2px 8px rgba(0,0,0,0.15);
  cursor: pointer;
  text-align: center;
  bottom:
}

.cart-summary-btn:active {
  background: #0056b3; /* Darker on press */
}

.cart-summary-btn i {
  font-size: 18px;
  margin-right: 8px;
}

.cart-summary-btn #total-amount {
  font-size: 15px;
  font-weight: 500;
}
    /* Search Bar */
    .search-bar {
      background: #fff;
      padding: 8px 12px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin: 10px;
    }

    .search-bar input {
      border: none;
      outline: none;
      font-size: 14px;
      width: 100%;
    }

    .search-bar i {
      color: #777;
      margin-right: 8px;
    }
  </style>
@endsection
@section('content')
  <div class="search-bar d-flex align-items-center">
    <i class="bi bi-search"></i>
    <input type="text" placeholder="Search products..." class="form-control">
  </div>

  <!-- Products Grid -->
  <div class="container">
    <div class="row g-3">
      <!-- Product Item -->
      <div class="col-6">
        <div class="product-card">
          <img src="https://via.placeholder.com/150" alt="Product">
          <div class="product-name">330g Gaz Lite Stove Kit 2</div>
          <div class="product-price">₱300.99</div>
          <div class="quantity-controls">
            <button class="btn-minus"><i class="bi bi-dash"></i></button>
            <span class="qty">0</span>
            <button class="btn-plus"><i class="bi bi-plus"></i></button>
          </div>
        </div>
      </div>

      <!-- Product Item -->
      <div class="col-6">
        <div class="product-card">
          <img src="https://via.placeholder.com/150" alt="Product">
          <div class="product-name">230g Gaz Lite Cylinder</div>
          <div class="product-price">₱34.98</div>
          <div class="quantity-controls">
            <button class="btn-minus"><i class="bi bi-dash"></i></button>
            <span class="qty">0</span>
            <button class="btn-plus"><i class="bi bi-plus"></i></button>
          </div>
        </div>
      </div>

      <!-- Add more products as needed -->
    </div>
  </div>

  <!-- Fixed Cart Summary -->
 <div class="cart-summary-wrapper">
  <button class="cart-summary-btn" id="checkoutBar">
    
    <span id="total-items"><i class="bi bi-cart-fill"></i> 0 Items</span>
    <div id="total-amount">Total: ₱0.00</div>
  </button>
</div>
@endsection
@section('js')

  <!-- Custom JS for Quantity & Total -->
  <script>
    const plusButtons = document.querySelectorAll('.btn-plus');
    const minusButtons = document.querySelectorAll('.btn-minus');
    const totalItems = document.getElementById('total-items');
    const totalAmount = document.getElementById('total-amount');

    let cart = {
      items: 0,
      amount: 0
    };

    plusButtons.forEach(button => {
      button.addEventListener('click', function() {
        const qtyElement = this.parentElement.querySelector('.qty');
        const priceElement = this.closest('.product-card').querySelector('.product-price');
        const price = parseFloat(priceElement.innerText.replace('₱', ''));

        let qty = parseInt(qtyElement.innerText);
        qty++;
        qtyElement.innerText = qty;

        cart.items++;
        cart.amount += price;

        updateCartSummary();
      });
    });

    minusButtons.forEach(button => {
      button.addEventListener('click', function() {
        const qtyElement = this.parentElement.querySelector('.qty');
        const priceElement = this.closest('.product-card').querySelector('.product-price');
        const price = parseFloat(priceElement.innerText.replace('₱', ''));

        let qty = parseInt(qtyElement.innerText);
        if (qty > 0) {
          qty--;
          qtyElement.innerText = qty;

          cart.items--;
          cart.amount -= price;
        }

        updateCartSummary();
      });
    });

    function updateCartSummary() {
     totalItems.innerHTML = `<i class="bi bi-cart-fill"></i> ${cart.items} Items`;
      totalAmount.innerText = `Total: ₱${cart.amount.toFixed(2)}`;
    }
  </script>
@endsection