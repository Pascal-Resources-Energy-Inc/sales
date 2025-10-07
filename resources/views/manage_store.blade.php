@extends('layouts.header')

@section('content')
<div class="manage-store-page">
  <div class="content-area-fix">
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-chevron-left"></i>
      </button>
      <h1 class="page-title">Manage Store</h1>
    </div>
    
    <!-- Search Section -->
    <div class="search-section">
      <div class="search-box">
        <input type="text" class="search-input" placeholder="Search customer, payment, or product">
        <i class="bi bi-search search-icon"></i>
      </div>
    </div>

    <!-- Menu Sections -->
    <div class="menu-sections">
      
      <!-- Set Product Section -->
      <div class="menu-section">
        <h2 class="section-title">Set Product</h2>
        
        <a href="{{url('/products')}}" class="menu-item">
          <span class="menu-label">Product</span>
          <div class="menu-right">
            <span class="menu-count">12 Items</span>
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/product-categories" class="menu-item">
          <span class="menu-label">Product Category</span>
          <div class="menu-right">
            <span class="menu-count">0 Categories</span>
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/discounts" class="menu-item">
          <span class="menu-label">Discount</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/order-types" class="menu-item">
          <span class="menu-label">Order Type</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>

      <!-- Cashier & Payment Section -->
      <div class="menu-section">
        <h2 class="section-title">Cashier & Payment</h2>
        
        <a href="/payment-methods" class="menu-item">
          <span class="menu-label">Payment Method</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/tax-service-fees" class="menu-item">
          <span class="menu-label">Tax & Service Fees</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>

      <!-- Set Printer & Receipt Section -->
      <div class="menu-section">
        <h2 class="section-title">Set Printer & Receipt</h2>
        
        <a href="/printers" class="menu-item">
          <span class="menu-label">Printer</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/receipts" class="menu-item">
          <span class="menu-label">Receipt</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>

      <!-- Set Branch & Employee Section -->
      <div class="menu-section">
        <h2 class="section-title">Set Branch & Employee</h2>
        
        <a href="/branches" class="menu-item">
          <span class="menu-label">Branch List</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/employees" class="menu-item">
          <span class="menu-label">Employee List</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
        
        <a href="/clients" class="menu-item">
          <span class="menu-label">Clients</span>
          <div class="menu-right">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>

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
    font-size: 20px;
    font-weight: 600;
    color: #4A90E2;
    margin: 0;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }

  .search-section {
    background: #fff;
    padding: 20px;
    border-bottom: 1px solid #f0f0f0;
  }

  .search-box {
    position: relative;
  }

  .search-input {
    width: 100%;
    padding: 12px 40px 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    background-color: #f8f9fa;
    color: #333;
    box-sizing: border-box;
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

  .menu-sections {
    background: #f8f9fa;
    padding: 0;
  }

  .menu-section {
    margin-bottom: 20px;
    background: #fff;
  }

  .section-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin: 0;
    padding: 20px 20px 10px 20px;
    background: #fff;
  }

  .menu-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    text-decoration: none;
    color: #333;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
  }

  .menu-item:hover {
    background-color: #f8f9fa;
    text-decoration: none;
    color: #333;
  }

  .menu-item:last-child {
    border-bottom: none;
  }

  .menu-label {
    font-size: 15px;
    font-weight: 400;
  }

  .menu-right {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .menu-count {
    font-size: 14px;
    color: #666;
  }

  .menu-right i {
    color: #999;
    font-size: 14px;
  }

  /* Mobile responsiveness */
  @media (max-width: 480px) {
    .content-area-fix {
      padding-bottom: -20px !important;
      margin-bottom: -50% !important;
    }

    .page-header-nya {
      padding: 15px;
    }
    
    .search-section {
      padding: 15px;
    }
    
    .section-title {
      padding: 15px 15px 8px 15px;
      font-size: 15px;
    }

    .menu-item {
      padding: 14px 15px;
    }

    .menu-label {
      font-size: 14px;
    }

    .menu-count {
      font-size: 13px;
    }
  }
 
</style>
@endsection

@section('js')
<script>
// Add any JavaScript functionality here if needed
</script>
@endsection