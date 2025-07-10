@extends('layouts.header')

@section('content')
<div class="merchants-page">
  <div class="content-area-fix">
    <div class="page-header">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Merchants</h1>
    </div>

    <div class="search-section">
      <div class="search-container">
        <i class="bi bi-search search-icon"></i>
        <input type="text" class="search-input" placeholder="Search name" id="merchantSearchInput">
      </div>
    </div>

    <!-- Category Filter Section -->
    <div class="category-section">
      <div class="category-header">
        <span class="category-label">Categories</span>
        <button class="category-toggle-btn" id="categoryToggleBtn" onclick="toggleCategoryDropdown()">
          <span class="category-current" id="currentCategory">All Merchants</span>
          <i class="bi bi-chevron-down category-arrow" id="categoryArrow"></i>
        </button>
      </div>
      
      <div class="category-dropdown" id="categoryDropdown">
        <div class="category-option active" onclick="selectCategory('all', 'All Merchants')">
          <span>All Merchants</span>
          <i class="bi bi-check category-check"></i>
        </div>
        <div class="category-option" onclick="selectCategory('RH', 'RH - Store Available')">
          <span>RH - Store Available</span>
          <i class="bi bi-check category-check"></i>
        </div>
        <div class="category-option" onclick="selectCategory('MG', 'MG - Store Available')">
          <span>MG - Store Available</span>
          <i class="bi bi-check category-check"></i>
        </div>
        <div class="category-option" onclick="selectCategory('PD', 'PD - Store Available')">
          <span>PD - Store Available</span>
          <i class="bi bi-check category-check"></i>
        </div>
      </div>
    </div>

    <div class="merchants-section">
      <div class="merchant-list" id="merchantList">
        <!-- Merchants will be populated by JavaScript -->
      </div>
    </div>

    <div class="add-customer-section">
      <button class="add-customer-btn" onclick="handleRestockProduct()">
        Restock Product
      </button>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  .search-section {
    padding: 20px 15px;
    background: #fff;
    border-bottom: 1px solid #f0f0f0;
  }

  .search-container {
    position: relative;
  }

  .search-input {
    width: 100%;
    padding: 12px 15px 12px 45px;
    border: 2px solid #f0f0f0;
    border-radius: 12px;
    font-size: 16px;
    background: #f8f9fa;
    transition: all 0.2s ease;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .search-input:focus {
    outline: none;
    border-color: #4A90E2;
    background: #fff;
  }

  .search-input::placeholder {
    color: #999;
  }

  .search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
    font-size: 18px;
  }

  /* Category Section Styles */
  .category-section {
    background: #fff;
    padding: 15px 15px 15px;
    border-bottom: 1px solid #f0f0f0;
    position: relative;
  }

  .category-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0px;
  }

  .category-label {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .category-toggle-btn {
    background: #f8f9fa;
    border: 2px solid #f0f0f0;
    border-radius: 12px;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    transition: all 0.2s ease;
    min-width: 180px;
    justify-content: space-between;
  }

  .category-toggle-btn:hover {
    background: #e9ecef;
    border-color: #4A90E2;
  }

  .category-toggle-btn.active {
    background: #fff;
    border-color: #4A90E2;
    box-shadow: 0 2px 8px rgba(74, 144, 226, 0.15);
  }

  .category-arrow {
    font-size: 12px;
    transition: transform 0.2s ease;
    color: #666;
  }

  .category-toggle-btn.active .category-arrow {
    transform: rotate(180deg);
  }

  .category-dropdown {
    position: absolute;
    top: calc(100% + 5px);
    right: 15px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease;
    border: 1px solid #e9ecef;
  }

  .category-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .category-option {
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 14px;
    color: #333;
    transition: background-color 0.2s ease;
    border-bottom: 1px solid #f0f0f0;
  }

  .category-option:last-child {
    border-bottom: none;
  }

  .category-option:hover {
    background: #f8f9fa;
  }

  .category-option.active {
    background: #e3f2fd;
    color: #4A90E2;
    font-weight: 500;
  }

  .category-check {
    font-size: 16px;
    color: #4A90E2;
    opacity: 0;
    transition: opacity 0.2s ease;
  }

  .category-option.active .category-check {
    opacity: 1;
  }

  .merchants-section {
    background: #fff;
    margin: 0;
  }

  .merchant-list {
    padding: 0;
  }

  .merchant-item {
    display: flex;
    align-items: center;
    padding: 16px 15px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background-color 0.2s ease;
    background: #fff;
  }

  .merchant-item:hover {
    background: #f8f9fa;
  }

  .merchant-item:last-child {
    border-bottom: none;
  }

  .merchant-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4A90E2, #357abd);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 16px;
    margin-right: 15px;
    flex-shrink: 0;
  }

  .merchant-avatar.rh {
    background: linear-gradient(135deg, #FF6B6B, #ee5a52);
  }

  .merchant-avatar.mg {
    background: linear-gradient(135deg, #4ECDC4, #44b3ac);
  }

  .merchant-avatar.pd {
    background: linear-gradient(135deg, #45B7D1, #3a9bc1);
  }

  .merchant-info {
    flex-grow: 1;
    min-width: 0;
  }

  .merchant-name {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .merchant-category {
    font-size: 12px;
    color: #666;
    margin-top: 2px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .merchant-contact {
    font-size: 11px;
    color: #888;
    margin-top: 1px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .merchant-arrow {
    font-size: 16px;
    color: #666;
  }

  .add-customer-section {
    padding: 20px 15px;
    background: #fff;
    margin-top: 0px;
  }

  .add-customer-btn {
    width: 100%;
    background: linear-gradient(135deg, #5DADE2, #3498DB);
    color: #fff;
    border: none;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .add-customer-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(93, 173, 226, 0.3);
  }

  .add-customer-btn:active {
    transform: translateY(0);
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #666;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .empty-state i {
    font-size: 48px;
    color: #ddd;
    margin-bottom: 16px;
  }

  .empty-state h3 {
    font-size: 18px;
    margin-bottom: 8px;
    color: #333;
  }

  .empty-state p {
    font-size: 14px;
    color: #666;
  }

  /* Responsive Design */
  @media (max-width: 480px) {
    .page-header {
      padding: 15px;
    }
    
    .search-section {
      padding: 15px;
    }
    
    .category-section {
      padding: 15px;
    }
    
    .category-toggle-btn {
      min-width: 150px;
      font-size: 13px;
    }
    
    .category-dropdown {
      right: 15px;
      min-width: 180px;
    }
    
    .merchant-item {
      padding: 14px 15px;
    }
    
    .merchant-avatar {
      width: 36px;
      height: 36px;
      font-size: 14px;
    }
    
    .merchant-name {
      font-size: 15px;
    }

    .add-customer-section {
      padding: 15px;
    }
  }
</style>
@endsection

@section('javascript')
<script>
</script>
@endsection