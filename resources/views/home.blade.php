@extends('layouts.header')
@section('css')

  <style>
    body {
      background: #f8f9fa;
      padding-bottom: 150px !important; /* Space for fixed cart bar */
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

   

    .page-title {
      font-size: 20px;
      font-weight: 600;
      color: #4A90E2;
      margin: 0;
    }

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

    .top-controls {
      background: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      position: relative;
      outline: 0.2px solid #e1e1e1ff;
    }

.dropdown {
  position: relative;
  display: inline-block;
}

.category-dropdown {
  display: flex;
  margin-left: 20px;
  align-items: center;
  gap: 10px;
  font-size: 16px;
  color: #333;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px 12px;
  border-radius: 6px;
  transition: background-color 0.2s ease;
}

.category-dropdown:hover {
  background-color: #f8f9fa;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 0.875rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 0.375rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
}

.dropdown-menu.show {
  display: block;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 0.5rem 1rem;
  clear: both;
  font-weight: 400;
  color: #212529;
  text-align: inherit;
  text-decoration: none;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
  cursor: pointer;
  transition: background-color 0.15s ease-in-out;
}

.dropdown-item:hover,
.dropdown-item:focus {
  color: #1e2125;
  background-color: #e9ecef;
}

.dropdown-item.active {
  color: #fff;
  text-decoration: none;
  background-color: #4A90E2;
}

/* Product card hiding animation */
.product-card-container.filtered-out {
  display: none !important;
}

.product-card-container.filtered-in {
  display: block;
  animation: fadeInUp 0.3s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Empty state styling */
.filter-empty-state {
  text-align: center;
  padding: 60px 20px;
  color: #666;
}

.filter-empty-state i {
  font-size: 48px;
  margin-bottom: 16px;
  display: block;
  color: #ccc;
}

.filter-empty-state h3 {
  font-size: 18px;
  margin-bottom: 8px;
  font-weight: 600;
}

.filter-empty-state p {
  font-size: 14px;
  margin-bottom: 20px;
}

.clear-filter-btn {
  background: #4A90E2;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.2s ease;
}

.clear-filter-btn:hover {
  background: #186ed1;
}

    .view-controls {
      display: flex;
      gap: 10px;
    }

    .view-controls i {
      font-size: 18px;
      color: #666;
      cursor: pointer;
      padding: 8px;
    }

    .view-controls i.active {
      color: #4A90E2;
    }

    /* Products container - Added bottom margin for cart clearance */
    .products-container {
      padding: 15px;
      margin-bottom: 20px; /* Extra space to ensure last products are accessible */
    }

    /* Bootstrap grid override for proper 2-column layout */
    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -7.5px;
    }

    .col-6 {
      flex: 0 0 50%;
      max-width: 50%;
      padding: 0 7.5px;
      margin-bottom: 15px;
    }

    /* Product Card Container - Now includes expansion area */
    .product-card-container {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      border: 1px solid #f0f0f0;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .product-card-container.expanded {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }

    /* Product Card - Adjusted for container wrapper */
    .product-card {
      padding: 12px;
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .product-card:hover {
      transform: translateY(-2px);
    }

    /* Image Container - Optimized for 2-column grid */
    .product-image-container {
      width: 100%;
      height: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
      background: #fafafa;
      border-radius: 8px;
      overflow: hidden;
    }

    .product-card img {
      max-width: 80%;
      max-height: 80%;
      width: auto;
      height: auto;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .product-card img:hover {
      transform: scale(1.05);
    }

    .product-info {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-name {
      font-size: 13px;
      font-weight: 500;
      color: #333;
      min-height: 32px;
      margin-bottom: 8px;
      line-height: 1.2;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-align: left;
    }

    /* Price and Add Button Container */
    .price-add-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: auto;
      padding-top: 8px;
    }

    .product-price {
      font-size: 16px;
      font-weight: 700;
      color: #4A90E2;
      margin: 0;
      flex: 1;
      text-align: left;
    }

    /* Updated Add to Cart Button */
    .add-to-cart {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      flex: 0 0 auto;
    }

    /* Updated Add to Cart Button - Circular */
    .add-to-cart button {
      background: #4A90E2;
      border: none;
      color: #fff;
      padding: 0; /* Remove padding since we're using fixed dimensions */
      border-radius: 50%; /* Make it circular */
      font-size: 13px;
      font-weight: 600;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 4px;
      transition: all 0.2s ease;
      cursor: pointer;
      width: 32px; /* Fixed width */
      height: 32px; /* Fixed height - same as width for perfect circle */
      box-shadow: 0 2px 4px rgba(74, 144, 226, 0.3);
    }

    .add-to-cart button:hover {
      background: #186ed1ff;
      transform: translateY(-1px);
      box-shadow: 0 3px 6px rgba(74, 144, 226, 0.4);
    }

    .add-to-cart button:active {
      transform: scale(0.95);
    }

    .add-to-cart button i {
      font-size: 14px; /* Slightly larger icon for better visibility */
    }

    .color-selection-expansion {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      border: 1px solid #e9ecef;
      border-radius: 12px;
      padding: 0;
      width: 90%;
      max-width: 350px;
      max-height: 80vh;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      z-index: 2000;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .color-selection-expansion.active {
      opacity: 1;
      visibility: visible;
      padding: 20px;
    }

    /* Modal overlay for expansion */
    .expansion-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1999;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .expansion-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .expansion-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #e9ecef;
    }

    .expansion-title {
      font-size: 16px;
      font-weight: 600;
      color: #333;
      margin: 0;
    }

    .close-expansion {
      background: none;
      border: none;
      color: #666;
      font-size: 18px;
      cursor: pointer;
      padding: 4px;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s ease;
    }

    .close-expansion:hover {
      background: #f5f5f5;
      color: #333;
    }

    /* Updated color options - Text based with inputs */
    .color-options {
      margin-bottom: 20px;
    }

    .color-option-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .color-option-row:last-child {
      border-bottom: none;
    }

    .color-label {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      text-transform: capitalize;
      min-width: 60px;
    }

    .color-input-wrapper {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .color-quantity-input {
      width: 60px;
      padding: 6px 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      text-align: center;
      font-size: 14px;
      font-weight: 500;
      outline: none;
      transition: border-color 0.2s ease;
    }

    .color-quantity-input:focus {
      border-color: #4A90E2;
    }

    .color-quantity-input::-webkit-outer-spin-button,
    .color-quantity-input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .color-quantity-input[type=number] {
      -moz-appearance: textfield;
    }

    /* Remove old color option styles and quantity container */
    .color-options .color-option,
    .quantity-container {
      display: none;
    }

    .expansion-total {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 0;
      border-top: 1px solid #e9ecef;
      margin-bottom: 15px;
    }

    .expansion-total-label {
      font-size: 14px;
      font-weight: 500;
      color: #666;
    }

    .expansion-total-price {
      font-size: 16px;
      font-weight: 700;
      color: #4A90E2;
    }

    .add-to-cart-expansion {
      background: #4A90E2;
      color: #fff;
      border: none;
      padding: 12px 16px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      width: 100%;
    }

    .add-to-cart-expansion:hover {
      background: #186ed1;
    }

    .add-to-cart-expansion:disabled {
      background: #ccc;
      cursor: not-allowed;
    }

    /* Fixed Cart Summary - Matching second image */
    .cart-summary-wrapper {
      position: fixed;
      bottom: 100px; /* Above bottom navigation */
      left: 15px;
      right: 15px;
      z-index: 1000;
    }

    .cart-summary-btn {
      width: 100%;
      background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%);
      color: #fff;
      border: none;
      padding: 16px 20px;
      font-size: 15px;
      font-weight: 600;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
      cursor: pointer;
      text-align: center;
      transition: all 0.2s ease;
    }

    .cart-summary-btn:active {
      transform: scale(0.98);
      box-shadow: 0 2px 8px rgba(74, 144, 226, 0.6);
    }

    .cart-summary-btn i {
      font-size: 18px;
      margin-right: 6px;
    }

    .cart-summary-btn #total-amount {
      font-size: 15px;
      font-weight: 600;
    }

    /* Bottom navigation - Matching second image */
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

    /* Responsive adjustments for very small screens */
    @media (max-width: 375px) {
      .product-card {
        padding: 10px;
      }
      
      .product-name {
        font-size: 12px;
        min-height: 30px;
      }
      
      .product-price {
        font-size: 15px;
      }
      
      .products-container {
        padding: 10px;
      }

      .add-to-cart button {
        width: 28px;
        height: 28px;
      }
      
      .add-to-cart button i {
        font-size: 12px;
      }

      .color-selection-expansion {
        width: 95%;
        max-height: 75vh;
      }
      
      .color-selection-expansion.active {
        padding: 15px;
      }
      
      .color-quantity-input {
        width: 50px;
        padding: 5px 6px;
        font-size: 13px;
      }
      
      .expansion-title {
        font-size: 15px;
      }
      
      .color-label {
        font-size: 13px;
        min-width: 55px;
      }
    }

    .search-container {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background: #fff;
      padding: 15px 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      z-index: 1500;
      transform: translateY(-100%);
      transition: transform 0.3s ease-in-out;
      border-bottom: 1px solid #e1e1e1;
    }

    .search-container.active {
      transform: translateY(0);
    }

    .search-form {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .search-input-wrapper {
      flex: 1;
      position: relative;
    }

    .search-input {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #e1e1e1;
      border-radius: 8px;
      font-size: 16px;
      outline: none;
      transition: border-color 0.2s ease;
      background: #f8f9fa;
    }

    .search-input:focus {
      border-color: #4A90E2;
      background: #fff;
    }

    .search-input::placeholder {
      color: #999;
    }

    .search-btn {
      background: #4A90E2;
      color: #fff;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s ease;
      white-space: nowrap;
    }

    .search-btn:hover {
      background: #186ed1;
    }

    .close-search {
      background: none;
      border: none;
      font-size: 18px;
      color: #666;
      cursor: pointer;
      padding: 8px;
      border-radius: 50%;
      transition: background 0.2s ease;
    }

    .close-search:hover {
      background: #f5f5f5;
    }

    /* Search overlay to darken content when search is active */
    .search-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.3);
      z-index: 1400;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .search-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    /* Adjust main content when search is active */
    .content-wrapper {
      transition: transform 0.3s ease;
    }

    /* Search results styling */
    .search-results {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: #fff;
      border: 1px solid #e1e1e1;
      border-top: none;
      border-radius: 0 0 8px 8px;
      max-height: 300px;
      overflow-y: auto;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      z-index: 10;
    }

    .search-result-item {
      padding: 12px 16px;
      border-bottom: 1px solid #f0f0f0;
      cursor: pointer;
      transition: background 0.2s ease;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .search-result-item:hover {
      background: #f8f9fa;
    }

    .search-result-item:last-child {
      border-bottom: none;
    }

    .search-result-image {
      width: 40px;
      height: 40px;
      object-fit: contain;
      border-radius: 6px;
      background: #f5f5f5;
    }

    .search-result-info {
      flex: 1;
    }

    .search-result-name {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      margin-bottom: 2px;
    }

    .search-result-price {
      font-size: 13px;
      color: #4A90E2;
      font-weight: 600;
    }

    .no-results {
      padding: 20px;
      text-align: center;
      color: #666;
      font-style: italic;
    }

    /* Camera modal styles */
    .camera-modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 2500;
    }

    .camera-modal-content {
      background: #fff;
      border-radius: 15px;
      width: 95%;
      max-width: 400px;
      max-height: 90vh;
      overflow: hidden;
      position: relative;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    .camera-header {
      padding: 15px 20px;
      background: linear-gradient(135deg, #4A90E2 0%, #357abd 100%);
      color: white;
      text-align: center;
      position: relative;
    }

    .camera-header h3 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }

    .camera-close {
      position: absolute;
      top: 12px;
      right: 20px;
      background: none;
      border: none;
      color: white;
      font-size: 24px;
      cursor: pointer;
      padding: 8px;
      border-radius: 50%;
      transition: background 0.2s ease;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .camera-close:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .camera-container {
      position: relative;
      width: 100%;
      height: 300px;
      background: #000;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #cameraVideo {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .camera-controls {
      padding: 20px;
      text-align: center;
      background: #f8f9fa;
    }

    .camera-status {
      margin-bottom: 15px;
      font-size: 14px;
      color: #666;
      font-weight: 500;
    }

    @media (max-width: 375px) {
      .search-container {
        padding: 12px 15px;
      }
      
      .search-input {
        padding: 10px 14px;
        font-size: 14px;
      }
      
      .search-btn {
        padding: 10px 16px;
        font-size: 13px;
      }

      .camera-modal-content {
        width: 98%;
      }
      
      .camera-container {
        height: 250px;
      }
      
      .camera-controls {
        padding: 15px;
      }
    }
  </style>
@endsection

@section('content')

<div class="search-overlay" id="searchOverlay"></div>

<!-- Search Container -->
<div class="search-container" id="searchContainer">
  <form class="search-form" id="searchForm">
    <div class="search-input-wrapper">
      <input 
        type="text" 
        class="search-input" 
        id="searchInput" 
        placeholder="Search for products..."
        autocomplete="off"
      >
      <div class="search-results" id="searchResults"></div>
    </div>
    <button type="submit" class="search-btn">Search</button>
    <button type="button" class="close-search" id="closeSearch">
      <i class="bi bi-x"></i>
    </button>
  </form>
</div>

<div class="top-controls mt-1">
  <div class="dropdown">
    <button class="category-dropdown" type="button" id="categoryDropdown">
      <span id="selectedCategory">All Products</span>
      <i class="bi bi-chevron-down"></i>
    </button>
    <ul class="dropdown-menu" id="categoryDropdownMenu">
      <li><a class="dropdown-item category-filter" href="#" data-category="all">All Products</a></li>
      <li><a class="dropdown-item category-filter" href="#" data-category="stove">Stoves</a></li>
      <li><a class="dropdown-item category-filter" href="#" data-category="cylinder">Gas Cylinders</a></li>
    </ul>
  </div>
  <div class="view-controls">
    <i class="bi bi-search"></i>
    <i class="fas fa-barcode mt-1"></i>
    <i class="bi bi-list-ul"></i>
  </div>
</div>

<div class="content-wrapper" id="contentWrapper">
<div class="products-container">
  <div class="row">
    @forelse($products as $index => $product)
      <div class="col-6">
        <div class="product-card-container" id="container-{{ $product->id }}">
          <div class="product-card">
            <div class="product-image-container">
              @if($product->product_image)
                <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->product_name }}">
              @else
                <img src="{{ asset('images/stovewcyllinder.jpg') }}" alt="{{ $product->product_name }}">
              @endif
            </div>
            <div class="product-info">
              <div class="product-name">{{ $product->product_name }}</div>
              <div class="price-add-container">
                <div class="product-price">₱ {{ number_format($product->price, 2) }}</div>
                <div class="add-to-cart">
                  @if(stripos($product->product_name, 'stove') !== false)
                    <button class="add-btn" data-container="container-{{ $product->id }}" data-price="{{ $product->price }}" data-name="{{ $product->product_name }}" data-image="{{ $product->product_image ? asset('uploads/products/' . $product->product_image) : asset('images/stovewcyllinder.jpg') }}">
                      <i class="bi bi-plus"></i>
                    </button>
                  @else
                    <button class="add-btn" data-price="{{ $product->price }}" data-name="{{ $product->product_name }}" data-image="{{ $product->product_image ? asset('uploads/products/' . $product->product_image) : asset('images/stovewcyllinder.jpg') }}">
                      <i class="bi bi-plus"></i>
                    </button>
                  @endif
                </div>
              </div>
            </div>
          </div>
          
          <!-- Color Selection Expansion (only for stove products) -->
          @if(stripos($product->product_name, 'stove') !== false)
            <div class="color-selection-expansion" id="expansion-{{ $product->id }}">
              <div class="expansion-header">
                <h4 class="expansion-title">Choose Color & Quantity</h4>
                <button class="close-expansion" data-container="container-{{ $product->id }}">
                  <i class="bi bi-x"></i>
                </button>
              </div>
              
              <div class="color-options">
                @foreach(['yellow', 'blue', 'red', 'white', 'choco', 'green'] as $color)
                  <div class="color-option-row">
                    <span class="color-label">{{ ucfirst($color) }}</span>
                    <div class="color-input-wrapper">
                      <input type="number" class="color-quantity-input" data-color="{{ $color }}" min="0" value="0" max="999">
                    </div>
                  </div>
                @endforeach
              </div>
              
              <div class="expansion-total">
                <span class="expansion-total-label">Total:</span>
                <span class="expansion-total-price">₱ 0.00</span>
              </div>
              
              <button class="add-to-cart-expansion" disabled>Add to Cart</button>
            </div>
          @endif
        </div>
      </div>
    @empty
      <div class="col-12">
        <div style="text-align: center; padding: 40px; color: #666;">
          <i class="bi bi-box" style="font-size: 48px; margin-bottom: 16px; display: block;"></i>
          <h3 style="font-size: 18px; margin-bottom: 8px;">No Products Available</h3>
          <p style="font-size: 14px;">There are currently no products to display.</p>
        </div>
      </div>
    @endforelse
  </div>
</div>

      <!-- Product Item 6 -->
      <div class="col-6">
          <!-- Color Selection Expansion -->
          <div class="color-selection-expansion" id="expansion-6">
            <div class="expansion-header">
              <h4 class="expansion-title">Choose Color & Quantity</h4>
              <button class="close-expansion" data-container="container-6">
                <i class="bi bi-x"></i>
              </button>
            </div>
            
            <div class="color-options">
              <div class="color-option yellow" data-color="yellow">
                <span class="color-label">Yellow</span>
              </div>
              <div class="color-option choco" data-color="choco">
                <span class="color-label">Choco</span>
              </div>
              <div class="color-option green" data-color="green">
                <span class="color-label">Green</span>
              </div>
              <div class="color-option red" data-color="red">
                <span class="color-label">Red</span>
              </div>
              <div class="color-option blue" data-color="blue">
                <span class="color-label">Blue</span>
              </div>
              <div class="color-option white" data-color="white">
                <span class="color-label">White</span>
              </div>
            </div>
            
            <div class="quantity-container">
              <span class="quantity-label">Quantity:</span>
              <div class="quantity-controls">
                <button type="button" class="quantity-btn minus-btn">-</button>
                <span class="quantity-display">1</span>
                <button type="button" class="quantity-btn plus-btn">+</button>
              </div>
            </div>
            
            <div class="expansion-total">
              <span class="expansion-total-label">Total:</span>
              <span class="expansion-total-price">₱ 549.50</span>
            </div>
            
            <button class="add-to-cart-expansion" disabled>Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Add more products as needed -->
    </div>
  </div>
</div>

<!-- Fixed Cart Summary -->
<div class="cart-summary-wrapper">
  <button class="cart-summary-btn" id="checkoutBar">
    <span id="total-items"><i class="bi bi-cart-fill"></i> 0 Items</span>
    <div id="total-amount">Total: ₱ 0</div>
  </button>
</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">
  <i class="bi bi-grid-3x3-gap active"></i>
  <i class="bi bi-star"></i>
  <i class="bi bi-clipboard-check"></i>
</div>
@endsection

@section('js')

<script>
  // Corrected Category Dropdown JavaScript
document.addEventListener('DOMContentLoaded', function() {
  const categoryDropdown = document.getElementById('categoryDropdown');
  const categoryDropdownMenu = document.getElementById('categoryDropdownMenu');
  const selectedCategorySpan = document.getElementById('selectedCategory');
  const categoryFilters = document.querySelectorAll('.category-filter');
  const productsContainer = document.querySelector('.products-container .row');

  function determineCategory(productName) {
    const name = productName.toLowerCase();
    if (name.includes('stove')) return 'stove';
    if (name.includes('cylinder') || name.includes('tank')) return 'cylinder';
    return 'stove';
  }

  function buildProductsArray() {
    const products = [];
    const productContainers = document.querySelectorAll('[id^="container-"]');
    
    productContainers.forEach(container => {
      const productCard = container.querySelector('.product-card');
      if (productCard) {
        const nameElement = productCard.querySelector('.product-name');
        const priceElement = productCard.querySelector('.product-price');
        const imageElement = productCard.querySelector('img');
        
        if (nameElement && priceElement) {
          const productName = nameElement.textContent.trim();
          const productPrice = priceElement.textContent.trim();
          const productImage = imageElement ? imageElement.src : '';
          
          products.push({
            id: container.id.replace('container-', ''),
            name: productName,
            price: productPrice,
            image: productImage,
            element: container.closest('.col-6'),
            category: determineCategory(productName)
          });
        }
      }
    });
    
    console.log('Products found:', products);
    return products;
  }

  // Build the products array
  const products = buildProductsArray();

  // Toggle dropdown
  categoryDropdown.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    console.log('Dropdown clicked'); 
    
    const isCurrentlyOpen = categoryDropdownMenu.classList.contains('show');
    
    // Close all other dropdowns first
    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
      menu.classList.remove('show');
    });
    
    // Toggle current dropdown
    if (!isCurrentlyOpen) {
      categoryDropdownMenu.classList.add('show');
      console.log('Dropdown opened');
    } else {
      console.log('Dropdown closed');
    }
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', function(e) {
    if (!categoryDropdown.contains(e.target) && !categoryDropdownMenu.contains(e.target)) {
      categoryDropdownMenu.classList.remove('show');
    }
  });

  // Handle category filter clicks
  categoryFilters.forEach(filter => {
    filter.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const selectedCategory = this.getAttribute('data-category');
      const categoryText = this.textContent.trim();
      
      console.log('Category selected:', selectedCategory, categoryText);
      
      // Update dropdown text
      selectedCategorySpan.textContent = categoryText;
      
      // Update active state
      categoryFilters.forEach(f => f.classList.remove('active'));
      this.classList.add('active');
      
      // Close dropdown
      categoryDropdownMenu.classList.remove('show');
      
      // Filter products
      filterProducts(selectedCategory);
    });
  });

  // Filter products function
  function filterProducts(category) {
    console.log('Filtering by category:', category);
    let visibleCount = 0;
    
    products.forEach((product, index) => {
      if (product.element) {
        const shouldShow = category === 'all' || product.category === category;
        
        console.log(`Product ${index}: ${product.name}, Category: ${product.category}, Should show: ${shouldShow}`);
        
        if (shouldShow) {
          product.element.style.display = 'block';
          product.element.classList.remove('filtered-out');
          product.element.classList.add('filtered-in');
          visibleCount++;
        } else {
          product.element.style.display = 'none';
          product.element.classList.add('filtered-out');
          product.element.classList.remove('filtered-in');
        }
      } else {
        console.warn(`Product element not found for: ${product.name}`);
      }
    });

    console.log(`Visible products: ${visibleCount}`);
    
    // Show empty state if no products match
    showEmptyStateIfNeeded(visibleCount, category);
  }

  // Show empty state when no products match filter
  function showEmptyStateIfNeeded(visibleCount, category) {
    const existingEmptyState = document.querySelector('.filter-empty-state');
    if (existingEmptyState) {
      existingEmptyState.remove();
    }

    if (visibleCount === 0 && category !== 'all') {
      const emptyStateHTML = `
        <div class="col-12">
          <div class="filter-empty-state">
            <i class="bi bi-funnel"></i>
            <h3>No products found</h3>
            <p>No products match the selected category "${getCategoryDisplayName(category)}"</p>
            <button class="clear-filter-btn" onclick="clearFilter()">Show All Products</button>
          </div>
        </div>
      `;
      productsContainer.insertAdjacentHTML('beforeend', emptyStateHTML);
    }
  }

  // Get display name for category
  function getCategoryDisplayName(category) {
    const categoryMap = {
      'stove': 'Stoves',
      'cylinder': 'Gas Cylinders'
    };
    return categoryMap[category] || category;
  }

  // Global function to clear filter
  window.clearFilter = function() {
    console.log('Clearing filter');
    
    // Reset to "All Products"
    selectedCategorySpan.textContent = 'All Products';
    
    // Update active state
    categoryFilters.forEach(f => f.classList.remove('active'));
    const allProductsFilter = document.querySelector('.category-filter[data-category="all"]');
    if (allProductsFilter) {
      allProductsFilter.classList.add('active');
    }
    
    // Show all products
    filterProducts('all');
  };

  // Initialize with "All Products" selected
  const allProductsFilter = document.querySelector('.category-filter[data-category="all"]');
  if (allProductsFilter) {
    allProductsFilter.classList.add('active');
  }

  // Debug: Log dropdown elements
  console.log('Dropdown elements:', {
    dropdown: categoryDropdown,
    menu: categoryDropdownMenu,
    filters: categoryFilters.length
  });
});
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the barcode icon
    const barcodeIcon = document.querySelector('.fas.fa-barcode');
    
    if (!barcodeIcon) {
      console.warn('Barcode icon not found');
      return;
    }

    // Create the camera modal
    const cameraModalHTML = `
      <div class="camera-modal-overlay" id="cameraModal">
        <div class="camera-modal-content">
          <div class="camera-header">
            <h3><i class="fas fa-camera"></i> Camera</h3>
            <button class="camera-close" id="closeCameraModal">
              <i class="bi bi-x"></i>
            </button>
          </div>
          
          <div class="camera-container">
            <video id="cameraVideo" autoplay playsinline></video>
          </div>
          
          <div class="camera-controls">
            <div class="camera-status" id="cameraStatus">Camera is ready</div>
          </div>
        </div>
      </div>
    `;

    // Add modal to page
    document.body.insertAdjacentHTML('beforeend', cameraModalHTML);

    // Get modal elements
    const cameraModal = document.getElementById('cameraModal');
    const closeCameraModal = document.getElementById('closeCameraModal');
    const cameraVideo = document.getElementById('cameraVideo');
    const cameraStatus = document.getElementById('cameraStatus');

    let currentStream = null;

    // Open camera
    function openCamera() {
      cameraModal.style.display = 'flex';
      document.body.style.overflow = 'hidden';
      startCamera();
    }

    // Close camera
    function closeCamera() {
      cameraModal.style.display = 'none';
      document.body.style.overflow = '';
      stopCamera();
    }

    // Start camera
    async function startCamera() {
      try {
        cameraStatus.textContent = 'Starting camera...';

        const constraints = {
          video: {
            facingMode: 'environment', // Use back camera
            width: { ideal: 1280 },
            height: { ideal: 720 }
          }
        };

        currentStream = await navigator.mediaDevices.getUserMedia(constraints);
        cameraVideo.srcObject = currentStream;
        
        cameraVideo.onloadedmetadata = () => {
          cameraStatus.textContent = 'Camera is ready';
        };

      } catch (error) {
        console.error('Camera error:', error);
        cameraStatus.textContent = 'Camera access failed';
      }
    }

    // Stop camera
    function stopCamera() {
      if (currentStream) {
        currentStream.getTracks().forEach(track => track.stop());
        currentStream = null;
      }
    }

    // Event listeners
    barcodeIcon.addEventListener('click', openCamera);
    closeCameraModal.addEventListener('click', closeCamera);

    // Close modal when clicking outside
    cameraModal.addEventListener('click', function(e) {
      if (e.target === cameraModal) {
        closeCamera();
      }
    });

    // Close on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && cameraModal.style.display === 'flex') {
        closeCamera();
      }
    });
  });
</script>

<script>
  // Dynamic JavaScript for floating modal expansion - Only creates modals for stove products
document.addEventListener('DOMContentLoaded', function() {
  const addButtons = document.querySelectorAll('.add-btn');
  const totalItems = document.getElementById('total-items');
  const totalAmount = document.getElementById('total-amount');
  
  // Create overlay if it doesn't exist
  let expansionOverlay = document.getElementById('expansionOverlay');
  if (!expansionOverlay) {
    expansionOverlay = document.createElement('div');
    expansionOverlay.className = 'expansion-overlay';
    expansionOverlay.id = 'expansionOverlay';
    document.body.appendChild(expansionOverlay);
  }

  let cart = {
    items: 0,
    amount: 0,
    products: []
  };

  let currentExpansion = null;
  const availableColors = ['yellow', 'blue', 'red', 'white', 'choco', 'green'];

  // Add button functionality
  addButtons.forEach(button => {
    button.addEventListener('click', function() {
      const price = parseFloat(this.getAttribute('data-price'));
      const productName = this.getAttribute('data-name');
      const productImage = this.getAttribute('data-image');
      const containerId = this.getAttribute('data-container');

      // Check if product name contains "stove" or "Stove"
      if (productName.toLowerCase().includes('stove')) {
        // Close any currently open expansion
        if (currentExpansion) {
          closeExpansion();
        }
        
        // Create and show floating modal expansion
        showDynamicExpansion(containerId, productName, price, productImage);
      } else {
        // Add directly to cart without color selection
        const product = {
          name: productName,
          price: price,
          image: productImage
        };
        addToCart(product, null, 1);
      }

      // Visual feedback for button click
      this.style.transform = 'scale(0.9)';
      setTimeout(() => {
        this.style.transform = 'scale(1)';
      }, 150);
    });
  });

  // Create and show dynamic expansion
  function showDynamicExpansion(containerId, productName, price, productImage) {
    // Remove any existing dynamic modal
    const existingModal = document.querySelector('.dynamic-color-modal');
    if (existingModal) {
      existingModal.remove();
    }

    // Create the modal HTML
    const modalHTML = createColorModalHTML(containerId, productName, price, productImage);
    
    // Add modal to page
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Get the newly created modal
    const modal = document.querySelector('.dynamic-color-modal');
    
    // Set current expansion
    currentExpansion = modal;
    
    // Show overlay and modal
    expansionOverlay.classList.add('active');
    modal.classList.add('active');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
    
    // Setup event listeners
    setupDynamicModalListeners(modal, price);
  }

  // Create color modal HTML dynamically
  function createColorModalHTML(containerId, productName, price, productImage) {
    const colorOptionsHTML = availableColors.map(color => `
      <div class="color-option-row">
        <span class="color-label">${color.charAt(0).toUpperCase() + color.slice(1)}</span>
        <div class="color-input-wrapper">
          <input type="number" class="color-quantity-input" data-color="${color}" min="0" value="0" max="999">
        </div>
      </div>
    `).join('');

    return `
      <div class="color-selection-expansion dynamic-color-modal" data-container="${containerId}" data-product-name="${productName}" data-product-price="${price}" data-product-image="${productImage}">
        <div class="expansion-header">
          <h4 class="expansion-title">Choose Color & Quantity</h4>
          <button class="close-expansion">
            <i class="bi bi-x"></i>
          </button>
        </div>
        
        <div class="color-options">
          ${colorOptionsHTML}
        </div>
        
        <div class="expansion-total">
          <span class="expansion-total-label">Total:</span>
          <span class="expansion-total-price">₱ 0.00</span>
        </div>
        
        <button class="add-to-cart-expansion" disabled>Add to Cart</button>
      </div>
    `;
  }

  // Setup dynamic modal event listeners
  function setupDynamicModalListeners(modal, basePrice) {
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    const totalPrice = modal.querySelector('.expansion-total-price');
    const addToCartBtn = modal.querySelector('.add-to-cart-expansion');
    const closeBtn = modal.querySelector('.close-expansion');
    
    // Quantity input listeners
    quantityInputs.forEach(input => {
      input.addEventListener('input', function() {
        // Ensure minimum value is 0
        if (parseInt(this.value) < 0) {
          this.value = 0;
        }
        updateModalTotal(modal, basePrice);
      });

      // Handle manual typing - validate on blur
      input.addEventListener('blur', function() {
        if (this.value === '' || isNaN(parseInt(this.value))) {
          this.value = 0;
        }
        updateModalTotal(modal, basePrice);
      });
    });
    
    // Add to cart from modal
    addToCartBtn.addEventListener('click', function() {
      const selectedItems = getSelectedItems(modal);
      
      if (selectedItems.length > 0) {
        const product = {
          name: modal.dataset.productName,
          price: parseFloat(modal.dataset.productPrice),
          image: modal.dataset.productImage
        };
        
        // Add each selected color/quantity combination
        selectedItems.forEach(item => {
          if (item.quantity > 0) {
            addToCart(product, item.color, item.quantity);
          }
        });
        
        // Close modal
        closeExpansion();
      }
    });
    
    // Close modal
    closeBtn.addEventListener('click', function() {
      closeExpansion();
    });
  }

  // Update modal total
  function updateModalTotal(modal, basePrice) {
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    const totalPrice = modal.querySelector('.expansion-total-price');
    const addToCartBtn = modal.querySelector('.add-to-cart-expansion');
    
    let totalQuantity = 0;
    
    quantityInputs.forEach(input => {
      const quantity = parseInt(input.value) || 0;
      totalQuantity += quantity;
    });
    
    const total = basePrice * totalQuantity;
    totalPrice.textContent = `₱ ${total.toFixed(2)}`;
    
    // Enable/disable add to cart button
    addToCartBtn.disabled = totalQuantity === 0;
  }

  // Get selected items from modal
  function getSelectedItems(modal) {
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    const selectedItems = [];
    
    quantityInputs.forEach(input => {
      const quantity = parseInt(input.value) || 0;
      if (quantity > 0) {
        selectedItems.push({
          color: input.getAttribute('data-color'),
          quantity: quantity
        });
      }
    });
    
    return selectedItems;
  }

  // Close expansion function
  function closeExpansion() {
    if (currentExpansion) {
      // Hide modal
      currentExpansion.classList.remove('active');
      
      // Remove the dynamic modal after animation
      setTimeout(() => {
        if (currentExpansion && currentExpansion.classList.contains('dynamic-color-modal')) {
          currentExpansion.remove();
        }
      }, 300);
      
      currentExpansion = null;
    }
    
    // Hide overlay
    expansionOverlay.classList.remove('active');
    
    // Restore body scroll
    document.body.style.overflow = '';
  }

  // Add to cart function
  function addToCart(product, color, quantity = 1) {
    const totalPrice = product.price * quantity;
    
    cart.items += quantity;
    cart.amount += totalPrice;

    // Create product identifier including color for stoves
    const productIdentifier = color ? `${product.name} (${color})` : product.name;

    // Check if product with same color already exists in cart
    const existingProductIndex = cart.products.findIndex(p => p.name === productIdentifier);
    if (existingProductIndex !== -1) {
      // Increment quantity if product exists
      cart.products[existingProductIndex].quantity += quantity;
    } else {
      // Add new product to cart
      cart.products.push({
        id: Date.now() + Math.random(),
        name: productIdentifier,
        originalName: product.name,
        price: product.price,
        quantity: quantity,
        image: product.image,
        color: color
      });
    }

    updateCartSummary();
  }

  // Update cart summary display
  function updateCartSummary() {
    totalItems.innerHTML = `<i class="bi bi-cart-fill"></i> ${cart.items} Items`;
    totalAmount.innerText = `Total: ₱ ${cart.amount.toFixed(2)}`;
  }

  // Close expansion when clicking overlay
  expansionOverlay.addEventListener('click', function() {
    closeExpansion();
  });

  // Close expansion on escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && currentExpansion) {
      closeExpansion();
    }
  });

  // Cart button click handler
  const checkoutBar = document.getElementById('checkoutBar');
  if (checkoutBar) {
    checkoutBar.addEventListener('click', function() {
      if (cart.items === 0) {
        alert('Your cart is empty. Please add some items first.');
        return;
      }

      // Store cart data in localStorage
      localStorage.setItem('cartData', JSON.stringify(cart.products));
      localStorage.setItem('cartTotal', cart.amount.toFixed(2));
      localStorage.setItem('cartItems', cart.items.toString());
      
      // Navigate to place_order blade file via route
      // Note: This line needs to be updated with your actual route
      window.location.href = "{{ route('place-order') }}";
    });
  }
});
</script>

<script>
// Search functionality with dynamic products
document.addEventListener('DOMContentLoaded', function() {
  const searchIcon = document.querySelector('.view-controls .bi-search');
  const searchContainer = document.getElementById('searchContainer');
  const searchOverlay = document.getElementById('searchOverlay');
  const searchInput = document.getElementById('searchInput');
  const searchForm = document.getElementById('searchForm');
  const closeSearch = document.getElementById('closeSearch');
  const searchResults = document.getElementById('searchResults');
  const contentWrapper = document.getElementById('contentWrapper');

  // Build products array from blade template data
  const products = [
    @foreach($products as $product)
    {
      id: {{ $product->id }},
      name: "{{ addslashes($product->product_name) }}",
      price: "{{ number_format($product->price, 2) }}",
      image: "{{ $product->product_image ? asset('uploads/products/' . $product->product_image) : asset('images/stovewcyllinder.jpg') }}"
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ];

  // Open search
  function openSearch() {
    searchContainer.classList.add('active');
    searchOverlay.classList.add('active');
    contentWrapper.classList.add('search-active');
    document.body.style.overflow = 'hidden';
    
    // Focus on input after animation
    setTimeout(() => {
      searchInput.focus();
    }, 300);
  }

  // Close search
  function closeSearchFunction() {
    searchContainer.classList.remove('active');
    searchOverlay.classList.remove('active');
    contentWrapper.classList.remove('search-active');
    document.body.style.overflow = '';
    searchInput.value = '';
    searchResults.innerHTML = '';
    searchResults.style.display = 'none';
  }

  // Search products
  function searchProducts(query) {
    if (query.length < 2) {
      searchResults.style.display = 'none';
      return;
    }

    const filteredProducts = products.filter(product =>
      product.name.toLowerCase().includes(query.toLowerCase())
    );

    displaySearchResults(filteredProducts, query);
  }

  // Display search results
  function displaySearchResults(results, query) {
    if (results.length === 0) {
      searchResults.innerHTML = `
        <div class="no-results">
          No products found for "${query}"
        </div>
      `;
    } else {
      searchResults.innerHTML = results.map(product => `
        <div class="search-result-item" data-product-id="${product.id}">
          <img src="${product.image}" alt="${product.name}" class="search-result-image">
          <div class="search-result-info">
            <div class="search-result-name">${highlightMatch(product.name, query)}</div>
            <div class="search-result-price">₱ ${product.price}</div>
          </div>
        </div>
      `).join('');

      // Add click handlers to search results
      const resultItems = searchResults.querySelectorAll('.search-result-item');
      resultItems.forEach(item => {
        item.addEventListener('click', function() {
          const productId = this.dataset.productId;
          scrollToProduct(productId);
          closeSearchFunction();
        });
      });
    }

    searchResults.style.display = 'block';
  }

  // Highlight matching text
  function highlightMatch(text, query) {
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<mark style="background: #fff3cd; padding: 1px 2px;">$1</mark>');
  }

  // Scroll to product
  function scrollToProduct(productId) {
    const productContainer = document.getElementById(`container-${productId}`);
    if (productContainer) {
      productContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
      // Add highlight effect
      const productCard = productContainer.querySelector('.product-card');
      if (productCard) {
        productCard.style.border = '2px solid #4A90E2';
        setTimeout(() => {
          productCard.style.border = '';
        }, 2000);
      }
    }
  }

  // Event listeners
  if (searchIcon) {
    searchIcon.addEventListener('click', openSearch);
  }
  
  if (closeSearch) {
    closeSearch.addEventListener('click', closeSearchFunction);
  }
  
  if (searchOverlay) {
    searchOverlay.addEventListener('click', closeSearchFunction);
  }

  // Search input event
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      searchProducts(this.value);
    });
  }

  // Search form submit
  if (searchForm) {
    searchForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const query = searchInput.value.trim();
      if (query) {
        searchProducts(query);
      }
    });
  }

  // Close search on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && searchContainer && searchContainer.classList.contains('active')) {
      closeSearchFunction();
    }
  });

  // Close search results when clicking outside
  document.addEventListener('click', function(e) {
    if (searchContainer && !searchContainer.contains(e.target) && !e.target.classList.contains('bi-search')) {
      if (searchResults) {
        searchResults.style.display = 'none';
      }
    }
  });
});
</script>
@endsection