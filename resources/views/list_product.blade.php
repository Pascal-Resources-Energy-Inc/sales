@extends('layouts.header')

@section('content')
<div class="transaction-history-page">
  <div class="content-area-fix">
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-chevron-left"></i>
      </button>
      <h1 class="page-title">List of Product</h1>
    </div>
    
    <!-- Search and Filter Section -->
    <div class="search-filter-section">
      <div class="search-box">
        <input type="text" class="search-input" placeholder="Search Product">
        <i class="bi bi-search search-icon"></i>
      </div>
      <span class="filter-label"><small>Choose a Branch:</small></span>
      <div class="filter-dropdown-container">
        <div class="filter-dropdown">
          <div class="filter-text">
            
            <span class="filter-value">All Branches</span>
          </div>
          <i class="bi bi-chevron-down"></i>
        </div>
      </div>
    </div>

    <!-- Product List -->
    <div class="product-list-container">
      <div class="product-item">
        <div class="product-info">
          <div class="product-name">330g Gaz Lite Stove Kit 2</div>
          <div class="product-category">All Branches</div>
        </div>
        <div class="product-price">₱ 527.99</div>
      </div>

      <div class="product-item">
        <div class="product-info">
          <div class="product-name">230g Gaz Lite Stove Kit 2</div>
          <div class="product-category">All Branches</div>
        </div>
        <div class="product-price">₱ 920.99</div>
      </div>

      <div class="product-item">
        <div class="product-info">
          <div class="product-name">230g Gaz Lite Cylinder</div>
          <div class="product-category">All Branches</div>
        </div>
        <div class="product-price">₱ 77.99</div>
      </div>

      <div class="product-item">
        <div class="product-info">
          <div class="product-name">230g Gaz Lite Cylinder</div>
          <div class="product-category">All Branches</div>
        </div>
        <div class="product-price">₱ 110.99</div>
      </div>
    </div>

    <!-- Add Product Button -->
    <div class="add-product-section">
      <button class="add-product-btn" onclick="window.location='{{ route('add_product') }}'">
        Add New Product
      </button>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  .back-btn {
    background: none;
    border: none;
    color: #4A90E2;
    font-size: 20px;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s ease;
    display: flex;
    align-items: center;
  }

  .back-btn:hover {
    color: #2980B9;
  }

  .page-header-nya {
    background: #fff;
    padding: 20px 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 0 !important;
    position: relative;
    border-bottom: 1px solid #e1e1e1;
  }

  .page-title {
    font-size: 18px;
    font-weight: 600;
    color: #4A90E2;
    margin: 0;
  }

  .search-filter-section {
    background: #fff;
    padding: 20px;
    border-bottom: 1px solid #f0f0f0;
  }

  .search-box {
    position: relative;
    margin-bottom: 15px;
  }

  .search-input {
    width: 100%;
    padding: 12px 40px 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    background-color: #f8f9fa;
    color: #333;
  }

  .search-input::placeholder {
    color: #999;
  }

  .search-input:focus {
    outline: none;
    border-color: #5DADE2;
    background-color: #fff;
  }

  .search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
    font-size: 16px;
  }

  .filter-dropdown-container {
    width: 100%;
  }

  .filter-dropdown {
    width: 100%;
    padding: 12px 15px;
    border: none;
    border-radius: 20px;
    background-color: #5DADE2;
    color: white;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: background-color 0.2s ease;
  }

  .filter-dropdown:hover {
    background-color: #4A90E2;
  }

  .filter-text {
    display: flex;
    gap: 8px;
  }

  .filter-label {
  }

  .filter-value {
    font-weight: 500;
  }

  .product-list-container {
    background: #f8f9fa;
    padding: 15px;
  }

  .product-item {
    background: #fff;
    padding: 16px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    border: 1px solid #f0f0f0;
    transition: box-shadow 0.2s ease;
  }

  .product-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
  }

  .product-item:last-child {
    margin-bottom: 0;
  }

  .product-info {
    flex: 1;
  }

  .product-name {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
    line-height: 1.3;
  }

  .product-category {
    font-size: 13px;
    color: #666;
  }

  .product-price {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    margin-left: 20px;
    text-align: right;
  }

  .add-product-section {
    margin-left: 50%;
    margin-top: 20px;
    bottom: 30px;
    transform: translateX(-50%);
    width: calc(100% - 40px);
    max-width: 360px;
    z-index: 100;
  }

  .add-product-btn {
    width: 100%;
    background-color: #5DADE2;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 16px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(93, 173, 226, 0.3);
  }

  .add-product-btn:hover {
    background-color: #4A90E2;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(93, 173, 226, 0.4);
  }

  .add-product-btn:active {
    transform: translateY(0);
  }

  /* Mobile responsiveness */
  @media (max-width: 480px) {
    .page-header-nya {
      padding: 15px;
    }
    
    .search-filter-section {
      padding: 15px;
    }
    
    .product-list-container {
      padding: 15px;
    }
    
    .add-product-section {
      width: calc(100% - 30px);
    }

    .product-item {
      padding: 14px;
    }

    .product-name {
      font-size: 15px;
    }

    .product-price {
      font-size: 15px;
    }
  }

  /* Content area adjustments */
  .content-area-fix {
    padding-bottom: 100px; /* Space for fixed button */
  }

</style>
@endsection

@section('js')

@endsection