@extends('layouts.header')

@section('content')

<div class="search-overlay" id="searchOverlay"></div>

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

<div class="top-controls mt-1 d-flex justify-content-between align-items-center p-3">
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
  <div class="d-flex gap-3">
    <i class="bi bi-search text-secondary fs-5 cursor-pointer"></i>
    <i class="fas fa-barcode text-secondary fs-5 cursor-pointer mt-1"></i>
    <i class="bi bi-list-ul text-secondary fs-5 cursor-pointer"></i>
  </div>
</div>

<div class="content-area container-fluid" id="contentWrapper">
  <div class="row g-2">
    @forelse($products as $index => $product)
      
      <div class="col-6">
        <div class="product-card-container bg-white rounded-3 shadow-sm border" id="container-{{ $product->id }}">
          <div class="product-card p-3 text-center h-100">
            
            <div class="product-image-container d-flex justify-content-center align-items-center mb-3 rounded-2">
              @if($product->product_image)
                <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid">
              @else
                <img src="{{ asset('images/stovewcyllinder.jpg') }}" alt="{{ $product->product_name }}" class="img-fluid">
              @endif
            </div>
            
            <div class="product-info d-flex flex-column h-100">
              <div class="product-name mb-2">{{ $product->product_name }}</div>
              
              <div class="price-add-container d-flex justify-content-between align-items-center mt-auto">
                <div class="product-price fw-bold text-primary flex-grow-1 text-start">₱ {{ number_format($product->price, 2) }}</div>
                <div class="add-to-cart">
                  @if(stripos($product->product_name, 'stove') !== false)
                    <button class="add-btn btn btn-primary rounded-circle p-0 d-flex justify-content-center align-items-center" 
                            data-container="container-{{ $product->id }}" 
                            data-price="{{ $product->price }}" 
                            data-name="{{ $product->product_name }}" 
                            data-image="{{ $product->product_image ? asset('uploads/products/' . $product->product_image) : asset('images/stovewcyllinder.jpg') }}">
                      <i class="bi bi-plus"></i>
                    </button>
                  @else
                    <button class="add-btn btn btn-primary rounded-circle p-0 d-flex justify-content-center align-items-center" 
                            data-price="{{ $product->price }}" 
                            data-name="{{ $product->product_name }}" 
                            data-image="{{ $product->product_image ? asset('uploads/products/' . $product->product_image) : asset('images/stovewcyllinder.jpg') }}">
                      <i class="bi bi-plus"></i>
                    </button>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty

      <div class="col-12">
        <div class="text-center py-5 text-muted">
          <i class="bi bi-box display-1 mb-3 d-block text-light"></i>
          <h3 class="fs-5 mb-2">No Products Available</h3>
          <p class="fs-6">There are currently no products to display.</p>
        </div>
      </div>
    @endforelse
  </div>
</div>

<div class="cart-summary-wrapper">
  <button class="cart-summary-btn" id="checkoutBar">
    <span id="total-items"><i class="bi bi-cart-fill"></i> 0 Items</span>
    <div id="total-amount">Total: ₱ 0</div>
  </button>
</div>

@endsection

@section('css')

<style>
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

  .content-area {
    padding: 15px !important;
    text-align: left !important;
  }

  .top-controls {
    background: #fff;
    margin-top: -57px !important;
    position: relative;
    outline: 0.2px solid #e1e1e1ff;
  }

  /* Dropdown styles - Keep existing */
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

  .dropdown-menu.show { display: block; }

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

  .dropdown-item:hover, .dropdown-item:focus {
    color: #1e2125;
    background-color: #e9ecef;
  }

  .dropdown-item.active {
    color: #fff;
    text-decoration: none;
    background-color: #4A90E2;
  }

  /* Filter animations */
  .product-card-container.filtered-out { display: none !important; }
  .product-card-container.filtered-in {
    display: block;
    animation: fadeInUp 0.3s ease-out;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

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

  .clear-filter-btn:hover { background: #186ed1; }

  .view-controls i.active { color: #4A90E2; }

  .product-card-container {
    transition: all 0.3s ease;
  }

  .product-card-container.expanded {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
  }

  .product-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .product-card:hover { transform: translateY(-2px); }

  .product-image-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fafafa;
    overflow: hidden;
    background-size: cover;
    background-position: center;  
    background-repeat: no-repeat;
  }

  .product-card img {
    max-width: 80%;
    max-height: 80%;
    width: auto;
    height: auto;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .product-card img:hover { transform: scale(1.05); }

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
    line-height: 1.2;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-align: left;
  }

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

  .add-to-cart {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex: 0 0 auto;
  }

  .add-to-cart button {
    background: #4A90E2;
    border: none;
    color: #fff;
    padding: 0;
    border-radius: 50%;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 4px;
    transition: all 0.2s ease;
    cursor: pointer;
    width: 32px;
    height: 32px;
    box-shadow: 0 2px 4px rgba(74, 144, 226, 0.3);
  }

  .add-to-cart button:hover {
    background: #186ed1ff;
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(74, 144, 226, 0.4);
  }

  .add-to-cart button:active { transform: scale(0.95); }
  .add-to-cart button i { font-size: 14px; }

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

  .color-options { margin-bottom: 20px; }

  .color-option-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
  }

  .color-option-row:last-child { border-bottom: none; }

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

  .color-quantity-input:focus { border-color: #4A90E2; }

  .color-quantity-input::-webkit-outer-spin-button,
  .color-quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .color-quantity-input[type=number] { -moz-appearance: textfield; }

  .color-options .color-option,
  .quantity-container { display: none; }

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

  .add-to-cart-expansion:hover { background: #186ed1; }
  .add-to-cart-expansion:disabled {
    background: #ccc;
    cursor: not-allowed;
  }

  /* Cart summary */
  .cart-summary-wrapper {
    position: fixed;
    bottom: 100px;
    left: 15px;
    right: 15px;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    pointer-events: none;
    transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
  }

  .cart-summary-wrapper.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
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

  .search-container.active { transform: translateY(0); }

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

  .search-input::placeholder { color: #999; }

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

  .search-btn:hover { background: #186ed1; }

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

  .close-search:hover { background: #f5f5f5; }

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

  .search-result-item:hover { background: #f8f9fa; }
  .search-result-item:last-child { border-bottom: none; }

  .search-result-image {
    width: 40px;
    height: 40px;
    object-fit: contain;
    border-radius: 6px;
    background: #f5f5f5;
  }

  .search-result-info { flex: 1; }

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

  /* Mobile responsive */
  @media (max-width: 375px) {
    .product-name {
      font-size: 12px;
      min-height: 30px;
    }
    .product-price { font-size: 15px; }
    .add-to-cart button {
      width: 28px;
      height: 28px;
    }
    .add-to-cart button i { font-size: 12px; }
    .color-selection-expansion {
      width: 95%;
      max-height: 75vh;
    }
    .color-selection-expansion.active { padding: 15px; }
    .color-quantity-input {
      width: 50px;
      padding: 5px 6px;
      font-size: 13px;
    }
    .expansion-title { font-size: 15px; }
    .color-label {
      font-size: 13px;
      min-width: 55px;
    }
    .search-container { padding: 12px 15px; }
    .search-input {
      padding: 10px 14px;
      font-size: 14px;
    }
    .search-btn {
      padding: 10px 16px;
      font-size: 13px;
    }
  }

  .quantity-modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border: 1px solid #e9ecef;
  border-radius: 12px;
  padding: 0;
  width: 90%;
  max-width: 400px;
  max-height: 80vh;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  z-index: 2000;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
}

.quantity-modal.active {
  opacity: 1;
  visibility: visible;
  padding: 20px;
}

/* Product info in modal */
.product-info-modal {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 15px 0;
  border-bottom: 1px solid #f0f0f0;
  margin-bottom: 20px;
}

.modal-product-image {
  width: 60px;
  height: 60px;
  object-fit: contain;
  border-radius: 8px;
  background: #f5f5f5;
  padding: 8px;
}

.modal-product-details {
  flex: 1;
}

.modal-product-name {
  font-size: 16px;
  font-weight: 600;
  color: #333;
  margin-bottom: 4px;
  line-height: 1.3;
}

.modal-product-price {
  font-size: 18px;
  font-weight: 700;
  color: #4A90E2;
}

.quantity-selection {
  margin-bottom: 20px;
}

.quantity-input-section {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.quantity-label {
  font-size: 14px;
  font-weight: 600;
  color: #333;
}

.quantity-controls {
  display: flex;
  align-items: center;
  gap: 12px;
  justify-content: center;
}

.quantity-btn {
  background: #f8f9fa;
  border: 2px solid #e9ecef;
  color: #495057;
  width: 40px;
  height: 40px;
  border-radius: 8px;
  font-size: 18px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s ease;
  user-select: none;
}

.quantity-btn:hover {
  background: #e9ecef;
  border-color: #dee2e6;
  transform: translateY(-1px);
}

.quantity-btn:active {
  transform: translateY(0) scale(0.95);
}

.quantity-btn.minus-btn {
  color: #dc3545;
  border-color: #f5c6cb;
}

.quantity-btn.minus-btn:hover {
  background: #f8d7da;
  border-color: #f1aeb5;
}

.quantity-btn.plus-btn {
  color: #28a745;
  border-color: #c3e6cb;
}

.quantity-btn.plus-btn:hover {
  background: #d4edda;
  border-color: #b8dabd;
}

.quantity-input {
  width: 80px;
  height: 40px;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  border: 2px solid #e9ecef;
  border-radius: 8px;
  outline: none;
  transition: border-color 0.2s ease;
}

.quantity-input:focus {
  border-color: #4A90E2;
  box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
}

.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.quantity-input[type=number] {
  -moz-appearance: textfield;
}

.modal-actions {
  display: flex;
  gap: 12px;
  margin-top: 20px;
  padding-top: 15px;
  border-top: 1px solid #e9ecef;
}

.modal-action-btn {
  flex: 1;
  padding: 12px 16px;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease;
  text-align: center;
}

.cancel-btn {
  background: #f8f9fa;
  color: #6c757d;
  border: 1px solid #e9ecef;
}

.cancel-btn:hover {
  background: #e9ecef;
  color: #495057;
  transform: translateY(-1px);
}

.confirm-btn {
  background: #4A90E2;
  color: #fff;
  box-shadow: 0 2px 4px rgba(74, 144, 226, 0.3);
}

.confirm-btn:hover {
  background: #186ed1;
  transform: translateY(-1px);
  box-shadow: 0 3px 6px rgba(74, 144, 226, 0.4);
}

.add-btn.has-quantity {
  background: #ca1f1f !important;
  position: relative;
  overflow: visible;
}

.add-btn.has-quantity:hover {
  background: #ca1f1f !important;
}

.add-btn.has-quantity.stove-product {
  background: #ca1f1f !important;
}

.add-btn.has-quantity.stove-product:hover {
  background: #a91717 !important;
}

.quantity-badge {
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  border-radius: 50%;
}

.add-btn {
  transition: all 0.2s ease, background-color 0.3s ease;
}

.add-btn.has-quantity {
  animation: quantityAdded 0.4s ease-out;
}

@keyframes quantityAdded {
  0% {
    transform: scale(1);
    background: #4A90E2;
  }
  50% {
    transform: scale(1.1);
    background: #28a745;
  }
  100% {
    transform: scale(1);
    background: #28a745;
  }
}

@media (max-width: 375px) {
  .quantity-modal {
    width: 95%;
    max-height: 75vh;
  }

  .quantity-modal.active {
    padding: 15px;
  }

  .modal-product-image {
    width: 50px;
    height: 50px;
  }

  .modal-product-name {
    font-size: 14px;
  }

  .modal-product-price {
    font-size: 16px;
  }

  .quantity-btn {
    width: 36px;
    height: 36px;
    font-size: 16px;
  }

  .quantity-input {
    width: 70px;
    height: 36px;
    font-size: 14px;
  }

  .modal-action-btn {
    padding: 10px 14px;
    font-size: 13px;
  }

  .quantity-badge {
    font-size: 12px;
  }
}

.add-btn.loading {
  pointer-events: none;
  opacity: 0.7;
}

.add-btn.loading::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 16px;
  height: 16px;
  border: 2px solid #fff;
  border-top: 2px solid transparent;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: translate(-50%, -50%) rotate(0deg); }
  100% { transform: translate(-50%, -50%) rotate(360deg); }
}

.quantity-btn:focus,
.modal-action-btn:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.3);
}

.quantity-toast {
  position: fixed;
  bottom: 120px;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  padding: 8px 16px;
  border-radius: 20px;
  font-size: 13px;
  font-weight: 500;
  z-index: 3000;
  opacity: 0;
  transition: opacity 0.3s ease;
  pointer-events: none;
}

.quantity-toast.show {
  opacity: 1;
}
</style>
@endsection

<!-- products blade -->
@section('js')
<script>
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

  const products = buildProductsArray();

  categoryDropdown.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    console.log('Dropdown clicked'); 
    
    const isCurrentlyOpen = categoryDropdownMenu.classList.contains('show');
    
    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
      menu.classList.remove('show');
    });
    
    if (!isCurrentlyOpen) {
      categoryDropdownMenu.classList.add('show');
      console.log('Dropdown opened');
    } else {
      console.log('Dropdown closed');
    }
  });

  document.addEventListener('click', function(e) {
    if (!categoryDropdown.contains(e.target) && !categoryDropdownMenu.contains(e.target)) {
      categoryDropdownMenu.classList.remove('show');
    }
  });

  categoryFilters.forEach(filter => {
    filter.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const selectedCategory = this.getAttribute('data-category');
      const categoryText = this.textContent.trim();
      
      console.log('Category selected:', selectedCategory, categoryText);
      
      selectedCategorySpan.textContent = categoryText;
      
      categoryFilters.forEach(f => f.classList.remove('active'));
      this.classList.add('active');
      
      categoryDropdownMenu.classList.remove('show');
      
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
 document.addEventListener('DOMContentLoaded', function() {
  // Get all the buttons and cart elements
  const addButtons = document.querySelectorAll('.add-btn');
  const totalItems = document.getElementById('total-items');
  const totalAmount = document.getElementById('total-amount');
  
  // Make sure overlay exists
  let expansionOverlay = document.getElementById('expansionOverlay');
  if (!expansionOverlay) {
    expansionOverlay = document.createElement('div');
    expansionOverlay.className = 'expansion-overlay';
    expansionOverlay.id = 'expansionOverlay';
    document.body.appendChild(expansionOverlay);
  }

  // Cart variables
  let cart = {
    items: 0,
    amount: 0,
    products: []
  };

  // Track button states
  const buttonQuantities = new Map();
  const buttonToProduct = new Map();
  const stoveColorQuantities = new Map();

  let currentExpansion = null;
  const availableColors = ['yellow', 'blue', 'red', 'white', 'choco', 'green'];

  // First, set up all the buttons with their product data
  addButtons.forEach((button, index) => {
    const productName = button.getAttribute('data-name');
    const productId = `btn-${index}-${Date.now()}`;
    
    buttonToProduct.set(button, {
      name: productName,
      price: parseFloat(button.getAttribute('data-price')),
      image: button.getAttribute('data-image'),
      containerId: button.getAttribute('data-container') || button.closest('[id^="container-"]')?.id || productId
    });
    
    buttonQuantities.set(button, 0);
    
    // For stove products, set up color tracking
    if (productName.toLowerCase().includes('stove')) {
      const colorMap = {};
      availableColors.forEach(color => {
        colorMap[color] = 0;
      });
      stoveColorQuantities.set(button, colorMap);
    }
    
    updateButtonDisplay(button, 0);
  });

  // Load saved cart data when page starts
  loadSavedCart();

  // Set up button click handlers
  addButtons.forEach(button => {
    button.addEventListener('click', function() {
      const productData = buttonToProduct.get(this);
      if (!productData) return;

      const { name, price, image } = productData;

      if (name.toLowerCase().includes('stove')) {
        if (currentExpansion) closeExpansion();
        showStoveModal(this, name, price, image);
      } else {
        if (currentExpansion) closeExpansion();
        showQuantityModal(this, name, price, image);
      }

      // Button click animation
      this.style.transform = 'scale(0.9)';
      setTimeout(() => {
        this.style.transform = 'scale(1)';
      }, 150);
    });
  });

  function loadSavedCart() {
      try {
          const savedProducts = localStorage.getItem('dealerCartData');
          const savedItems = localStorage.getItem('dealerCartItems');
          const savedTotal = localStorage.getItem('dealerCartTotal');
          
          if (savedProducts) {
              cart.products = JSON.parse(savedProducts);
              cart.items = parseInt(savedItems) || 0;
              cart.amount = parseFloat(savedTotal) || 0;
              
              console.log('Found saved cart:', cart);
              updateButtonsFromSavedData();
              updateCartDisplay();
              updateCartSummaryButton();
          }
      } catch (error) {
          console.error('Error loading saved cart:', error);
          cart = { items: 0, amount: 0, products: [] };
      }
  }

  // Update buttons to show quantities from saved cart
  function updateButtonsFromSavedData() {
    // Go through each button and check if we have saved data for it
    addButtons.forEach((button, buttonIndex) => {
      const productData = buttonToProduct.get(button);
      if (!productData) return;
      
      // Find products in cart that match this button
      const matchingProducts = cart.products.filter(product => {
        return (product.originalName === productData.name || product.name.includes(productData.name)) 
               && (product.buttonId === buttonIndex || !product.buttonId);
      });
      
      if (matchingProducts.length > 0) {
        let totalQuantity = 0;
        
        // Handle stove products differently
        if (productData.name.toLowerCase().includes('stove')) {
          const colorMap = {};
          availableColors.forEach(color => colorMap[color] = 0);
          
          // Add up quantities by color
          matchingProducts.forEach(product => {
            if (product.color) {
              colorMap[product.color] = (colorMap[product.color] || 0) + product.quantity;
              totalQuantity += product.quantity;
            } else {
              totalQuantity += product.quantity;
            }
          });
          
          stoveColorQuantities.set(button, colorMap);
        } else {
          // Regular products - just add up all quantities
          totalQuantity = matchingProducts.reduce((sum, product) => sum + product.quantity, 0);
        }
        
        buttonQuantities.set(button, totalQuantity);
        updateButtonDisplay(button, totalQuantity);
      }
    });
  }

  // Show quantity modal for regular products
  function showQuantityModal(button, productName, price, productImage) {
    const currentQuantity = buttonQuantities.get(button) || 0;
    
    // Remove any existing modal
    const existingModal = document.querySelector('.quantity-modal');
    if (existingModal) {
      existingModal.remove();
    }

    const modalHTML = `
      <div class="color-selection-expansion quantity-modal" data-product-name="${productName}" data-product-price="${price}" data-product-image="${productImage}">
        <div class="expansion-header">
          <h4 class="expansion-title">Select Quantity</h4>
          <button class="close-expansion">
            <i class="bi bi-x"></i>
          </button>
        </div>
        
        <div class="quantity-selection">
          <div class="product-info-modal">
            <img src="${productImage}" alt="${productName}" class="modal-product-image" 
                 onerror="this.src='{{ asset('images/stovewcyllinder.jpg') }}'">
            <div class="modal-product-details">
              <div class="modal-product-name">${productName}</div>
              <div class="modal-product-price">₱ ${price.toFixed(2)}</div>
            </div>
          </div>
          
          <div class="quantity-input-section">
            <label class="quantity-label">Quantity:</label>
            <div class="current_cart_qty" style="font-size: 12px; color: #666; margin-bottom: 10px;">
                Currently in cart: ${currentQuantity}
            </div>
            <div class="quantity-controls">
              <button type="button" class="quantity-btn minus-btn" data-action="decrease">-</button>
              <input type="number" class="quantity-input" placeholder="0" min="0" max="999">
              <button type="button" class="quantity-btn plus-btn" data-action="increase">+</button>
            </div>
          </div>
        </div>
        
        <div class="expansion-total">
          <span class="expansion-total-label">Total:</span>
          <span class="expansion-total-price">₱ ${(price * currentQuantity).toFixed(2)}</span>
        </div>
        
        <div class="modal-actions">
          <button class="modal-action-btn cancel-btn">Cancel</button>
          <button class="modal-action-btn confirm-btn">Confirm</button>
        </div>
      </div>
    `;

    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    const modal = document.querySelector('.quantity-modal');
    currentExpansion = modal;
    
    expansionOverlay.classList.add('active');
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    setupQuantityModalEvents(modal, price, button);
  }

  // Set up events for quantity modal
  function setupQuantityModalEvents(modal, basePrice, button) {
    const quantityInput = modal.querySelector('.quantity-input');
    const totalPrice = modal.querySelector('.expansion-total-price');
    const confirmBtn = modal.querySelector('.confirm-btn');
    const cancelBtn = modal.querySelector('.cancel-btn');
    const closeBtn = modal.querySelector('.close-expansion');
    const plusBtn = modal.querySelector('.plus-btn');
    const minusBtn = modal.querySelector('.minus-btn');

    // Update total when quantity changes
    function updateTotal() {
      const quantity = parseInt(quantityInput.value) || 0;
      const total = basePrice * quantity;
      totalPrice.textContent = `₱ ${total.toFixed(2)}`;
    }

    // Plus button
    plusBtn.addEventListener('click', () => {
      const currentValue = parseInt(quantityInput.value) || 0;
      quantityInput.value = Math.min(currentValue + 1, 999);
      updateTotal();
    });

    // Minus button
    minusBtn.addEventListener('click', () => {
      const currentValue = parseInt(quantityInput.value) || 0;
      quantityInput.value = Math.max(currentValue - 1, 0);
      updateTotal();
    });

    // Input change
    quantityInput.addEventListener('input', () => {
      let value = parseInt(quantityInput.value) || 0;
      value = Math.max(0, Math.min(value, 999));
      quantityInput.value = value;
      updateTotal();
    });

    // Confirm button
    confirmBtn.addEventListener('click', () => {
      const addedQuantity = parseInt(quantityInput.value) || 0;
      const productData = buttonToProduct.get(button);
      if (!productData) return;

      const oldQuantity = buttonQuantities.get(button) || 0;
      const newQuantity = oldQuantity + addedQuantity;

      buttonQuantities.set(button, newQuantity);

      updateRegularProductCart(productData, button, oldQuantity, newQuantity);
      updateButtonDisplay(button, newQuantity);

      
      closeExpansion();
    });

    // Cancel and close buttons
    cancelBtn.addEventListener('click', closeExpansion);
    closeBtn.addEventListener('click', closeExpansion);
  }

  // Show stove modal with color options
  function showStoveModal(button, productName, price, productImage) {
    // Remove any existing modal
    const existingModal = document.querySelector('.dynamic-color-modal');
    if (existingModal) {
      existingModal.remove();
    }

    const colorOptionsHTML = availableColors.map(color => `
      <div class="color-option-row">
        <span class="color-label">${color.charAt(0).toUpperCase() + color.slice(1)}</span>
        <div class="color-input-wrapper">
          <span class="qty-stock text-mute">0</span>
          <input type="number" class="color-quantity-input" data-color="${color}" min="0" value="0" max="999">
        </div>
      </div>
    `).join('');

    const modalHTML = `
      <div class="color-selection-expansion dynamic-color-modal" data-product-name="${productName}" data-product-price="${price}" data-product-image="${productImage}">
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
        
        <button class="add-to-cart-expansion" disabled>Confirm</button>
      </div>
    `;

    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    const modal = document.querySelector('.dynamic-color-modal');
    currentExpansion = modal;
    
    // Load existing color quantities for this button
    loadColorQuantitiesInModal(modal, button);
    
    expansionOverlay.classList.add('active');
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    setupStoveModalEvents(modal, price, button);
  }

  // Load saved color quantities into the modal
  function loadColorQuantitiesInModal(modal, button) {
    const colorQuantities = stoveColorQuantities.get(button) || {};
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    
    quantityInputs.forEach(input => {
      const color = input.getAttribute('data-color');
      const existingQuantity = colorQuantities[color] || 0;
      input.value = existingQuantity;
    });
    
    const price = parseFloat(modal.dataset.productPrice);
    updateStoveModalTotal(modal, price);
  }

  // Set up events for stove modal
  function setupStoveModalEvents(modal, basePrice, button) {
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    const addToCartBtn = modal.querySelector('.add-to-cart-expansion');
    const closeBtn = modal.querySelector('.close-expansion');
    
    // Handle input changes
    quantityInputs.forEach(input => {
      input.addEventListener('input', function() {
        if (parseInt(this.value) < 0) {
          this.value = 0;
        }
        updateStoveModalTotal(modal, basePrice);
      });

      input.addEventListener('blur', function() {
        if (this.value === '' || isNaN(parseInt(this.value))) {
          this.value = 0;
        }
        updateStoveModalTotal(modal, basePrice);
      });
    });
    
    // Confirm button
    addToCartBtn.addEventListener('click', function() {
      const productData = buttonToProduct.get(button);
      if (!productData) return;
      
      // Save the color quantities
      saveColorQuantitiesFromModal(modal, button);
      
      // Calculate totals
      const colorQuantities = stoveColorQuantities.get(button) || {};
      const newTotalQuantity = Object.values(colorQuantities).reduce((sum, qty) => sum + qty, 0);
      const oldTotalQuantity = buttonQuantities.get(button) || 0;
      
      // Update button quantity
      buttonQuantities.set(button, newTotalQuantity);
      
      // Update the cart
      updateStoveProductCart(productData, button, oldTotalQuantity, newTotalQuantity, colorQuantities);
      
      // Update button display
      updateButtonDisplay(button, newTotalQuantity);
      
      closeExpansion();
    });
    
    // Close button
    closeBtn.addEventListener('click', () => {
      saveColorQuantitiesFromModal(modal, button);
      
      // Update button display when closing
      const colorQuantities = stoveColorQuantities.get(button) || {};
      const totalQuantity = Object.values(colorQuantities).reduce((sum, qty) => sum + qty, 0);
      buttonQuantities.set(button, totalQuantity);
      updateButtonDisplay(button, totalQuantity);
      
      closeExpansion();
    });
  }

  // Save color quantities from modal inputs
  function saveColorQuantitiesFromModal(modal, button) {
    const quantityInputs = modal.querySelectorAll('.color-quantity-input');
    const colorQuantities = stoveColorQuantities.get(button) || {};
    
    quantityInputs.forEach(input => {
      const color = input.getAttribute('data-color');
      const quantity = parseInt(input.value) || 0;
      colorQuantities[color] = quantity;
    });
    
    stoveColorQuantities.set(button, colorQuantities);
  }

  // Update stove modal total
  function updateStoveModalTotal(modal, basePrice) {
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
    addToCartBtn.disabled = totalQuantity === 0;
  }

  // Update cart for regular products
  function updateRegularProductCart(productData, button, oldQuantity, newQuantity) {
    const quantityDiff = newQuantity - oldQuantity;
    const priceDiff = productData.price * quantityDiff;
    
    cart.items += quantityDiff;
    cart.amount += priceDiff;
    
    const buttonId = Array.from(addButtons).indexOf(button);
    
    // Find existing product in cart
    const existingProductIndex = cart.products.findIndex(p => 
      p.name === productData.name && p.buttonId === buttonId
    );
    
    if (newQuantity === 0) {
      // Remove from cart if quantity is 0
      if (existingProductIndex !== -1) {
        cart.products.splice(existingProductIndex, 1);
      }
    } else if (existingProductIndex !== -1) {
      // Update existing product
      cart.products[existingProductIndex].quantity = newQuantity;
    } else {
      // Add new product
      cart.products.push({
        id: Date.now() + Math.random(),
        name: productData.name,
        price: productData.price,
        quantity: newQuantity,
        image: productData.image,
        buttonId: buttonId
      });
    }
    
    updateCartDisplay();
    saveCartToLocalStorage();
  }

  // Update cart for stove products
  function updateStoveProductCart(productData, button, oldTotalQuantity, newTotalQuantity, colorQuantities) {
    const buttonId = Array.from(addButtons).indexOf(button);
    
    // Remove all existing stove products for this button
    cart.products = cart.products.filter(p => 
      !(p.originalName === productData.name && p.buttonId === buttonId)
    );
    
    // Update totals
    cart.items -= oldTotalQuantity;
    cart.amount -= (productData.price * oldTotalQuantity);
    
    // Add new color products
    Object.entries(colorQuantities).forEach(([color, quantity]) => {
      if (quantity > 0) {
        const productIdentifier = `${productData.name} (${color})`;
        cart.products.push({
          id: Date.now() + Math.random(),
          name: productIdentifier,
          originalName: productData.name,
          price: productData.price,
          quantity: quantity,
          image: productData.image,
          color: color,
          buttonId: buttonId
        });
        
        cart.items += quantity;
        cart.amount += (productData.price * quantity);
      }
    });
    
    updateCartDisplay();
    saveCartToLocalStorage();
  }

  // Update button appearance
  function updateButtonDisplay(button, quantity) {
    const productData = buttonToProduct.get(button);
    const isStove = productData && productData.name.toLowerCase().includes('stove');
    
    if (quantity > 0) {
      button.innerHTML = `<span class="quantity-badge">${quantity}</span>`;
      button.classList.add('has-quantity');
      
      if (isStove) {
        button.classList.add('stove-product');
      }
    } else {
      button.innerHTML = `<i class="bi bi-plus"></i>`;
      button.classList.remove('has-quantity', 'stove-product');
    }
  }

  // Update cart display
  function updateCartDisplay() {
    totalItems.innerHTML = `<i class="bi bi-cart-fill"></i> ${cart.items} Items`;
    totalAmount.innerText = `Total: ₱ ${cart.amount.toFixed(2)}`;
    updateCartSummaryButton();
  }

  // Save cart to localStorage
  function saveCartToLocalStorage() {
    try {
      localStorage.setItem('dealerCartData', JSON.stringify(cart.products));
      localStorage.setItem('dealerCartTotal', cart.amount.toFixed(2));
      localStorage.setItem('dealerCartItems', cart.items.toString());
      
      localStorage.setItem('cartData', JSON.stringify(cart.products));
      localStorage.setItem('cartTotal', cart.amount.toFixed(2));
      localStorage.setItem('cartItems', cart.items.toString());

      updateCartSummaryButton();
      console.log('Cart saved to localStorage');
    } catch (error) {
      console.error('Error saving cart:', error);
    }
  }

  // Close modal
  function closeExpansion() {
    if (currentExpansion) {
      currentExpansion.classList.remove('active');
      
      setTimeout(() => {
        if (currentExpansion && (
          currentExpansion.classList.contains('dynamic-color-modal') ||
          currentExpansion.classList.contains('quantity-modal')
        )) {
          currentExpansion.remove();
        }
      }, 300);
      
      currentExpansion = null;
    }
    
    expansionOverlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  // Event listeners
  expansionOverlay.addEventListener('click', closeExpansion);
  
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && currentExpansion) {
      closeExpansion();
    }
  });

  // Checkout button
  const checkoutBar = document.getElementById('checkoutBar');
  if (checkoutBar) {
    checkoutBar.addEventListener('click', function() {
      if (cart.items === 0) {
        alert('Your cart is empty. Please add some items first.');
        return;
      }

      // Prepare data for checkout
      const dealerCartData = cart.products.map((product, index) => ({
        id: product.id || `product-${index}-${Date.now()}`,
        name: product.name,
        originalName: product.originalName || product.name,
        price: parseFloat(product.price),
        quantity: parseInt(product.quantity),
        image: product.image,
        color: product.color || null,
        buttonId: product.buttonId || null
      }));

      // Save checkout data
      localStorage.setItem('dealerCartData', JSON.stringify(dealerCartData));
      localStorage.setItem('dealerCartTotal', cart.amount.toFixed(2));
      localStorage.setItem('dealerCartItems', cart.items.toString());
      
      localStorage.setItem('cartData', JSON.stringify(cart.products));
      localStorage.setItem('cartTotal', cart.amount.toFixed(2));
      localStorage.setItem('cartItems', cart.items.toString());
      
      console.log('Going to checkout with:', dealerCartData);
      
      // Go to place order page
      window.location.href = "{{ route('place-order') }}";
    });
  }
});

function updateCartSummaryButton() {
    try {
        const totalItemsElement = document.getElementById('total-items');
        const totalAmountElement = document.getElementById('total-amount');
        const cartSummaryWrapper = document.querySelector('.cart-summary-wrapper');
        
        if (!totalItemsElement || !totalAmountElement) return;

        let totalItems = 0;
        let totalAmount = 0;

        const cartData = localStorage.getItem('dealerCartData');
        if (cartData) {
            const parsedData = JSON.parse(cartData);
            if (Array.isArray(parsedData)) {
                totalItems = parsedData.reduce((sum, item) => sum + (parseInt(item.quantity) || 0), 0);
                
                totalAmount = parsedData.reduce((sum, item) => {
                    const price = parseFloat(item.price) || 0;
                    const quantity = parseInt(item.quantity) || 0;
                    return sum + (price * quantity);
                }, 0);
            }
        }

        totalItemsElement.innerHTML = `<i class="bi bi-cart-fill"></i> ${totalItems} Items`;
        totalAmountElement.textContent = `Total: ₱ ${totalAmount.toFixed(2)}`;

        // Show/hide cart summary based on items
        if (cartSummaryWrapper) {
            if (totalItems > 0) {
                cartSummaryWrapper.classList.add('show');
            } else {
                cartSummaryWrapper.classList.remove('show');
            }
        }

        console.log('Cart summary updated:', { totalItems, totalAmount });
    } catch (error) {
        console.error('Error updating cart summary:', error);
    }
}

// Listen for storage changes
window.addEventListener('storage', function(e) {
    if (e.key === 'dealerCartData' || e.key === 'dealerCartItems') {
        updateCartSummaryButton();
    }
});
</script>

<script>
// Optimized Search functionality
document.addEventListener('DOMContentLoaded', function() {
  // Cache DOM elements
  const elements = {
    searchIcon: document.querySelector('.bi-search'),
    searchContainer: document.getElementById('searchContainer'),
    searchOverlay: document.getElementById('searchOverlay'),
    searchInput: document.getElementById('searchInput'),
    searchForm: document.getElementById('searchForm'),
    closeSearch: document.getElementById('closeSearch'),
    searchResults: document.getElementById('searchResults'),
    contentWrapper: document.getElementById('contentWrapper')
  };

  // Early return if critical elements missing
  if (!elements.searchIcon || !elements.searchContainer || !elements.searchInput) {
    console.warn('Search: Critical elements missing');
    return;
  }

  // Build products array once
  const products = (() => {
    const productList = [];
    document.querySelectorAll('[id^="container-"]').forEach(container => {
      const name = container.querySelector('.product-name')?.textContent.trim();
      const price = container.querySelector('.product-price')?.textContent.trim();
      const image = container.querySelector('img')?.src;
      
      if (name && price) {
        productList.push({
          id: container.id.replace('container-', ''),
          name,
          price,
          image: image || ''
        });
      }
    });
    return productList;
  })();

  // Search state
  let isSearchOpen = false;

  // Utility functions
  const utils = {
    escapeRegex: str => str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'),
    
    highlightMatch: (text, query) => {
      const regex = new RegExp(`(${utils.escapeRegex(query)})`, 'gi');
      return text.replace(regex, '<mark style="background: #fff3cd; padding: 1px 2px;">$1</mark>');
    },

    debounce: (func, delay) => {
      let timeoutId;
      return (...args) => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => func.apply(null, args), delay);
      };
    }
  };

  // Core functions
  const search = {
    open() {
      if (isSearchOpen) return;
      
      elements.searchContainer.classList.add('active');
      elements.searchOverlay?.classList.add('active');
      elements.contentWrapper?.classList.add('search-active');
      document.body.style.overflow = 'hidden';
      isSearchOpen = true;
      
      setTimeout(() => elements.searchInput.focus(), 300);
    },

    close() {
      if (!isSearchOpen) return;
      
      elements.searchContainer.classList.remove('active');
      elements.searchOverlay?.classList.remove('active');
      elements.contentWrapper?.classList.remove('search-active');
      document.body.style.overflow = '';
      
      elements.searchInput.value = '';
      if (elements.searchResults) {
        elements.searchResults.innerHTML = '';
        elements.searchResults.style.display = 'none';
      }
      isSearchOpen = false;
    },

    perform: utils.debounce((query) => {
      if (!elements.searchResults || query.length < 2) {
        if (elements.searchResults) elements.searchResults.style.display = 'none';
        return;
      }

      const results = products.filter(product =>
        product.name.toLowerCase().includes(query.toLowerCase())
      );

      search.displayResults(results, query);
    }, 200),

    displayResults(results, query) {
      const html = results.length === 0 
        ? `<div class="no-results">No products found for "${query}"</div>`
        : results.map(product => `
            <div class="search-result-item" data-product-id="${product.id}">
              <img src="${product.image}" alt="${product.name}" class="search-result-image" 
                   onerror="this.src='{{ asset('images/stovewcyllinder.jpg') }}'">
              <div class="search-result-info">
                <div class="search-result-name">${utils.highlightMatch(product.name, query)}</div>
                <div class="search-result-price">${product.price}</div>
              </div>
            </div>
          `).join('');

      elements.searchResults.innerHTML = html;
      elements.searchResults.style.display = 'block';

      // Add click handlers
      elements.searchResults.querySelectorAll('.search-result-item').forEach(item => {
        item.addEventListener('click', () => {
          search.scrollToProduct(item.dataset.productId);
          search.close();
        });
      });
    },

    scrollToProduct(productId) {
      const container = document.getElementById(`container-${productId}`);
      if (!container) return;

      container.scrollIntoView({ behavior: 'smooth', block: 'center' });
      
      // Highlight effect
      const card = container.querySelector('.product-card-container');
      if (card) {
        const originalShadow = card.style.boxShadow;
        card.style.boxShadow = '0 0 0 3px #4A90E2';
        setTimeout(() => card.style.boxShadow = originalShadow, 2000);
      }
    }
  };

  // Event listeners
  elements.searchIcon.addEventListener('click', e => {
    e.preventDefault();
    search.open();
  });

  elements.closeSearch?.addEventListener('click', e => {
    e.preventDefault();
    search.close();
  });

  elements.searchOverlay?.addEventListener('click', search.close);

  elements.searchInput.addEventListener('input', e => 
    search.perform(e.target.value.trim())
  );

  elements.searchForm?.addEventListener('submit', e => {
    e.preventDefault();
    search.perform(elements.searchInput.value.trim());
  });

  // Keyboard shortcuts
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && isSearchOpen) {
      search.close();
    } else if (e.key === '/' && !isSearchOpen && !['INPUT', 'TEXTAREA'].includes(e.target.tagName)) {
      e.preventDefault();
      search.open();
    }
  });

  // Click outside to close results
  document.addEventListener('click', e => {
    if (isSearchOpen && 
        !elements.searchContainer.contains(e.target) && 
        !e.target.closest('.bi-search')) {
      if (elements.searchResults) elements.searchResults.style.display = 'none';
    }
  });
});
</script>
@endsection