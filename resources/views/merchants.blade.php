@extends('layouts.header')

@section('content')
<div class="merchants-page">
  <div class="search-overlay" id="searchOverlay"></div>

  <div class="search-container-full" id="searchContainer">
    <form class="search-form" id="searchForm">
      <div class="search-input-wrapper">
        <input 
          type="text" 
          class="search-input-full" 
          id="searchInput" 
          placeholder="Search for merchants..."
          autocomplete="off"
        >
        <div class="search-results" id="searchResults"></div>
      </div>
      <button type="submit" class="search-btn-full">Search</button>
      <button type="button" class="close-search" id="closeSearch">
        <i class="bi bi-x"></i>
      </button>
    </form>
  </div>

  <div class="content-area-fix">
    <div class="page-header">
      <button class="back-btn" onclick="window.location.href='{{ route('place-order') }}'">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Merchants</h1>
    </div>

    <div class="category-section">
      <div class="category-filter-row">
        <div class="category-dropdown-container">
          <button class="category-toggle-btn" id="categoryToggleBtn" type="button">
            <span class="category-current" id="currentCategory">All Merchants</span>
            <i class="bi bi-chevron-down category-arrow" id="categoryArrow"></i>
          </button>
          
          <div class="category-dropdown" id="categoryDropdown">
            <div class="category-option active" data-category="all" data-name="All Merchants">
              <span>All Merchants</span>
              <i class="bi bi-check category-check"></i>
            </div>
            <div class="category-option" data-category="RH" data-name="RH - Store Available">
              <span>RH - Store Available</span>
              <i class="bi bi-check category-check"></i>
            </div>
            <div class="category-option" data-category="MG" data-name="MG - Store Available">
              <span>MG - Store Available</span>
              <i class="bi bi-check category-check"></i>
            </div>
            <div class="category-option" data-category="PD" data-name="PD - Store Available">
              <span>PD - Store Available</span>
              <i class="bi bi-check category-check"></i>
            </div>
          </div>
        </div>

        <div class="search-and-toggle">
          <div class="search-icon-trigger" id="searchIconTrigger">
            <i class="bi bi-search"></i>
          </div>
          
          <div class="toggle-container">
            <span class="toggle-label">Restock</span>
            <div class="toggle-switch" id="toggleSwitch">
              <div class="toggle-slider" id="toggleSlider"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="merchants-section">
      <div class="merchant-list" id="merchantList">
        <!-- Merchants will be populated by JavaScript -->
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  * {
    box-sizing: border-box;
  }

  .merchants-page {
    background: #f8f9fa;
    min-height: 100vh;
  }

  .content-area-fix {
    max-width: 100%;
    margin: 0 auto;
  }

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

  .page-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin: 0;
  }

  

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

  .search-container-full {
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

  .search-container-full.active {
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

  .search-input-full {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.2s ease;
    background: #f8f9fa;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .search-input-full:focus {
    border-color: #4A90E2;
    background: #fff;
  }

  .search-input-full::placeholder {
    color: #999;
  }

  .search-btn-full {
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
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .search-btn-full:hover {
    background: #186ed1;
  }

  .close-search {
    background: none;
    border: none;
    font-size: 24px;
    color: #666;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .close-search:hover {
    background: #f5f5f5;
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
    display: none;
  }

  .search-results.show {
    display: block;
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

  .search-result-name {
    font-size: 14px;
    font-weight: 500;
    color: #333;
  }

  .no-results {
    padding: 20px;
    text-align: center;
    color: #666;
    font-style: italic;
  }

  .category-section {
    background: #fff;
    padding: 16px 20px;
    border-bottom: 1px solid #e9ecef;
  }

  .category-filter-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }

  .category-dropdown-container {
    position: relative;
    flex-shrink: 0;
    flex: 0 0 auto;
  }

  .category-toggle-btn {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    transition: all 0.2s ease;
    min-width: 140px;
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
    left: 0;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
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
    border-radius: 0 0 8px 8px;
  }

  .category-option:first-child {
    border-radius: 8px 8px 0 0;
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

  .search-and-toggle {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 0 0 auto;
    justify-content: flex-end;
    margin-left: auto;
  }

  .search-icon-trigger {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s ease;
    border-left: 1px solid #e0e0e0;
    border-right: 1px solid #e0e0e0;
    border-radius: 0;
    padding: 0 16px;
    background: transparent;
  }

  .search-icon-trigger:hover {
    background: #f8f9fa;
  }

  .search-icon-trigger i {
    font-size: 16px;
    color: #666;
  }

  .toggle-container {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
    padding-left: 16px;
  }

  .toggle-label {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 14px;
    color: #333;
    font-weight: 400;
  }

  .toggle-switch {
    width: 44px;
    height: 24px;
    background: #e0e0e0;
    border-radius: 12px;
    position: relative;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border: none;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .toggle-switch.active {
    background: #4A90E2;
  }

  .toggle-slider {
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 2px;
    left: 2px;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  }

  .toggle-switch.active .toggle-slider {
    transform: translateX(20px);
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
    justify-content: space-between;
    padding: 16px 20px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background-color 0.2s ease;
    background: #fff;
  }

  .merchant-item:hover {
    background: #f8f9fa;
  }

  .merchant-item:active {
    background: #e3f2fd;
  }

  .merchant-item:last-child {
    border-bottom: none;
  }

  .merchant-info {
    flex-grow: 1;
    min-width: 0;
  }

  .merchant-name {
    font-size: 16px;
    font-weight: 400;
    color: #333;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    margin: 0;
  }

  .merchant-arrow {
    font-size: 16px;
    color: #999;
    flex-shrink: 0;
  }

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

  @media (max-width: 768px) {
    .category-filter-row {
      flex-direction: row;
      align-items: center;
      gap: 8px;
    }

    .search-and-toggle {
      gap: 8px;
    }

    .category-toggle-btn {
      min-width: 100px;
    }
  }

  @media (max-width: 480px) {
    .page-header {
      padding: 12px 16px;
    }
    
    .category-section {
      padding: 12px 16px;
    }
    
    .category-toggle-btn {
      min-width: 110px;
      font-size: 13px;
      padding: 6px 10px;
    }
    
    .toggle-label {
      font-size: 13px;
    }
    
    .toggle-switch {
      width: 44px;
      height: 22px;
    }
    
    .toggle-slider {
      width: 18px;
      height: 18px;
    }
    
    .toggle-switch.active .toggle-slider {
      transform: translateX(22px);
    }
    
    .merchant-item {
      padding: 14px 16px;
    }
    
    .merchant-name {
      font-size: 15px;
    }

    .search-icon-trigger {
      width: 32px;
      height: 32px;
    }

    .search-icon-trigger i {
      font-size: 14px;
    }

    .search-container-full {
      padding: 10px 12px;
    }

    .search-input-full {
      padding: 10px 14px;
      font-size: 14px;
    }

    .search-btn-full {
      padding: 10px 14px;
      font-size: 13px;
    }
  }
</style>
@endsection

@section('js')
<script>
const merchants = [
  { id: 'Merchants', name: 'Merchants', category: 'all' },
  { id: 'MJ', name: 'MJ', category: 'all' },
  { id: 'Andrea', name: 'Andrea', category: 'all' },
  { id: 'John', name: 'John', category: 'RH' },
  { id: 'Sarah', name: 'Sarah', category: 'MG' },
  { id: 'Mike', name: 'Mike', category: 'PD' },
  { id: 'Emma', name: 'Emma', category: 'RH' },
  { id: 'David', name: 'David', category: 'MG' },
  { id: 'Lisa', name: 'Lisa', category: 'PD' },
];

let currentFilter = 'all';
let searchQuery = '';
let restockMode = false;

document.addEventListener('DOMContentLoaded', function() {
  initializeSearch();
  initializeCategoryDropdown();
  initializeToggle();
  
  filterMerchants();
});

// ============= SEARCH FUNCTIONALITY =============
function initializeSearch() {
  const searchContainer = document.getElementById('searchContainer');
  const searchOverlay = document.getElementById('searchOverlay');
  const searchInput = document.getElementById('searchInput');
  const searchResults = document.getElementById('searchResults');
  const searchForm = document.getElementById('searchForm');
  const closeSearchBtn = document.getElementById('closeSearch');
  const searchIconTrigger = document.getElementById('searchIconTrigger');
  
  if (!searchContainer || !searchOverlay || !searchInput || !searchResults) {
    console.error('Search elements not found');
    return;
  }

  function showSearch() {
    searchContainer.classList.add('active');
    searchOverlay.classList.add('active');
    setTimeout(() => {
      searchInput.focus();
    }, 300);
    document.body.style.overflow = 'hidden';
  }

  function hideSearch() {
    searchContainer.classList.remove('active');
    searchOverlay.classList.remove('active');
    searchInput.value = '';
    searchResults.innerHTML = '';
    searchResults.classList.remove('show');
    document.body.style.overflow = '';
  }

  function performSearch(query) {
    if (!query.trim()) {
      searchResults.innerHTML = '';
      searchResults.classList.remove('show');
      return;
    }

    const filtered = merchants.filter(merchant => 
      merchant.name.toLowerCase().includes(query.toLowerCase())
    );

    if (filtered.length === 0) {
      searchResults.innerHTML = '<div class="no-results">No merchants found</div>';
      searchResults.classList.add('show');
      return;
    }

    const resultsHTML = filtered.map(merchant => `
      <div class="search-result-item" data-merchant-id="${merchant.id}" data-merchant-name="${merchant.name}" data-merchant-category="${merchant.category}">
        <div class="search-result-name">${merchant.name}</div>
      </div>
    `).join('');

    searchResults.innerHTML = resultsHTML;
    searchResults.classList.add('show');
  }

  if (searchIconTrigger) {
    searchIconTrigger.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      showSearch();
    });
  }

  if (closeSearchBtn) {
    closeSearchBtn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      hideSearch();
    });
  }

  if (searchOverlay) {
    searchOverlay.addEventListener('click', function(e) {
      hideSearch();
    });
  }

  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      performSearch(e.target.value);
    });
  }

  if (searchForm) {
    searchForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const query = searchInput.value.trim();
      if (query) {
        searchQuery = query;
        filterMerchants();
        hideSearch();
      }
    });
  }

  if (searchResults) {
    searchResults.addEventListener('click', function(e) {
      const resultItem = e.target.closest('.search-result-item');
      if (resultItem) {
        const merchantId = resultItem.dataset.merchantId;
        const merchantName = resultItem.dataset.merchantName;
        const merchantCategory = resultItem.dataset.merchantCategory;
        selectMerchant(merchantId, merchantName, merchantCategory);
        hideSearch();
      }
    });
  }

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && searchContainer.classList.contains('active')) {
      hideSearch();
    }
  });
}

// ============= CATEGORY DROPDOWN FUNCTIONALITY =============
function initializeCategoryDropdown() {
  const categoryToggleBtn = document.getElementById('categoryToggleBtn');
  const categoryDropdown = document.getElementById('categoryDropdown');
  const categoryOptions = document.querySelectorAll('.category-option');
  
  if (!categoryToggleBtn || !categoryDropdown) {
    console.error('Category elements not found');
    return;
  }

  categoryToggleBtn.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const isActive = categoryDropdown.classList.contains('show');
    
    if (isActive) {
      categoryDropdown.classList.remove('show');
      categoryToggleBtn.classList.remove('active');
    } else {
      categoryDropdown.classList.add('show');
      categoryToggleBtn.classList.add('active');
    }
  });

  categoryOptions.forEach(option => {
    option.addEventListener('click', function(e) {
      e.stopPropagation();
      
      const categoryId = this.dataset.category;
      const categoryName = this.dataset.name;
      
      currentFilter = categoryId;
      
      const currentCategoryElement = document.getElementById('currentCategory');
      if (currentCategoryElement) {
        currentCategoryElement.textContent = categoryName;
      }
      
      categoryOptions.forEach(opt => opt.classList.remove('active'));
      this.classList.add('active');
      
      categoryDropdown.classList.remove('show');
      categoryToggleBtn.classList.remove('active');
      
      filterMerchants();
    });
  });

  document.addEventListener('click', function(e) {
    if (!categoryToggleBtn.contains(e.target) && !categoryDropdown.contains(e.target)) {
      categoryDropdown.classList.remove('show');
      categoryToggleBtn.classList.remove('active');
    }
  });
}

// ============= TOGGLE FUNCTIONALITY =============
function initializeToggle() {
  const toggleSwitch = document.getElementById('toggleSwitch');

  if (!toggleSwitch) {
    console.error('Toggle switch not found');
    return;
  }

  // Load saved state from localStorage
  const savedRestock = localStorage.getItem('restockMode');
  restockMode = savedRestock === 'true';
  if (restockMode) {
    toggleSwitch.classList.add('active');
  }

  toggleSwitch.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    restockMode = !restockMode;
    localStorage.setItem('restockMode', restockMode); // save state

    if (restockMode) {
      toggleSwitch.classList.add('active');
    } else {
      toggleSwitch.classList.remove('active');
    }

    console.log('Restock mode:', restockMode ? 'ON' : 'OFF');
  });
}

// ============= FILTER AND RENDER MERCHANTS =============
function filterMerchants() {
  const merchantList = document.getElementById('merchantList');
  
  if (!merchantList) {
    console.error('Merchant list element not found');
    return;
  }
  
  let filteredMerchants = [...merchants];
  
  if (currentFilter !== 'all') {
    filteredMerchants = filteredMerchants.filter(merchant => 
      merchant.category === currentFilter || merchant.category === 'all'
    );
  }
  
  if (searchQuery) {
    filteredMerchants = filteredMerchants.filter(merchant =>
      merchant.name.toLowerCase().includes(searchQuery.toLowerCase())
    );
  }
  
  if (filteredMerchants.length === 0) {
    merchantList.innerHTML = `
      <div class="empty-state">
        <i class="bi bi-people"></i>
        <h3>No merchants found</h3>
        <p>Try adjusting your search or filter criteria</p>
      </div>
    `;
  } else {
    merchantList.innerHTML = filteredMerchants.map(merchant => `
      <div class="merchant-item" data-merchant-id="${merchant.id}" data-merchant-name="${merchant.name}" data-merchant-category="${merchant.category}">
        <div class="merchant-info">
          <div class="merchant-name">${merchant.name}</div>
        </div>
        <i class="bi bi-chevron-right merchant-arrow"></i>
      </div>
    `).join('');
    
    const merchantItems = merchantList.querySelectorAll('.merchant-item');
    merchantItems.forEach(item => {
      item.addEventListener('click', function() {
        const merchantId = this.dataset.merchantId;
        const merchantName = this.dataset.merchantName;
        const merchantCategory = this.dataset.merchantCategory;
        selectMerchant(merchantId, merchantName, merchantCategory);
      });
    });
  }
}

// ============= SELECT MERCHANT =============
function selectMerchant(merchantId, merchantName, merchantCategory) {
  const merchantData = {
    id: merchantId,
    name: merchantName,
    category: merchantCategory,
    selectedAt: new Date().toISOString()
  };
  
  localStorage.setItem('selectedMerchant', JSON.stringify(merchantData));

  console.log('Selected merchant:', merchantData);
  
  showMerchantSelectedNotification(merchantName);

  setTimeout(() => {
    const returnToCart = localStorage.getItem('returnToCart');
    if (returnToCart === 'true') {
      localStorage.removeItem('returnToCart');
      window.location.href = '{{ route("place-order") }}';
    } else {
      window.location.href = '{{ route("place-order") }}';
    }
  }, 800);
}

function showMerchantSelectedNotification(merchantName) {
  const toast = document.createElement('div');
  toast.style.cssText = `
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: #4A90E2;
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    z-index: 9999;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    animation: slideDown 0.3s ease;
  `;
  toast.textContent = `Merchant "${merchantName}" selected`;
  
  document.body.appendChild(toast);
  
  setTimeout(() => {
    toast.style.animation = 'slideUp 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, 2000);
}

const style = document.createElement('style');
style.textContent = `
  @keyframes slideDown {
    from { transform: translate(-50%, -100%); opacity: 0; }
    to { transform: translate(-50%, 0); opacity: 1; }
  }
  @keyframes slideUp {
    from { transform: translate(-50%, 0); opacity: 1; }
    to { transform: translate(-50%, -100%); opacity: 0; }
  }
`;
document.head.appendChild(style);
</script>
@endsection