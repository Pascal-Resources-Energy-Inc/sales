@extends('layouts.header')

@section('content')
<div class="add-product-page">
  <div class="content-area-fix">
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-chevron-left"></i>
      </button>
      <h1 class="page-title">List of Product</h1>
    </div>
    
    <div class="form-container">
      <!-- Deals Product Section -->
      <div class="section-header">
        <h2>Deals Product</h2>
      </div>

      <!-- Product Name -->
      <div class="form-group">
        <label class="form-label">Product name</label>
        <input type="text" class="form-input" placeholder="Product name">
      </div>

      <!-- Selling Price -->
      <div class="form-group">
        <label class="form-label">Selling price</label>
        <input type="text" class="form-input" placeholder="0">
      </div>

      <!-- Add a price type toggle -->
      <div class="form-group toggle-group">
        <div class="toggle-label-container">
          <label class="form-label">Add a price type</label>
          <div class="toggle-switch">
            <input type="checkbox" id="priceTypeToggle" class="toggle-input">
            <label for="priceTypeToggle" class="toggle-slider"></label>
          </div>
        </div>
      </div>

    <div class="form-group">
        <div class="photo-upload-container">
            <!-- Image preview -->
            <div class="photo-placeholder" id="photoPreview">
            <i class="bi bi-image photo-icon"></i>
            </div>

            <!-- File name display (inside card) -->
            <div class="file-info" id="fileNameDisplay">No file chosen</div>

            <!-- Hidden file input -->
            <input type="file" id="photoInput" class="file-input" accept="image/*" hidden>

            <!-- Button -->
            <button type="button" class="choose-photo-btn" onclick="document.getElementById('photoInput').click()">
            Choose a Photo
            </button>
        </div>
     </div>

      <!-- Updated Categories with Filterable Dropdown -->
      <div class="form-group">
        <label class="form-label">Categories</label>
        <div class="filterable-select-wrapper">
          <input type="text" 
                 class="filterable-select-input" 
                 id="categoryInput"
                 name="category"
                 placeholder="Choose or search for a category"
                 readonly>
          <input type="hidden" id="categoryValue" name="category_value">
          <i class="bi bi-chevron-down select-arrows" id="selectArrow"></i>
          <div class="dropdown-list" id="dropdownList">
            <div class="dropdown-item" data-value="bbq_grill">BBQ Grill</div>
            <div class="dropdown-item" data-value="eazy_kalan">Eazy Kalan</div>
            <div class="dropdown-item" data-value="cylinder">Cylinder</div>
            <div class="dropdown-item" data-value="torch">Torch</div>
            <div class="dropdown-item" data-value="gas_stove">Gas Stove</div>
            <div class="dropdown-item" data-value="burner">Burner</div>
            <div class="dropdown-item" data-value="regulator">Regulator</div>
            <div class="dropdown-item" data-value="hose">Gas Hose</div>
          </div>
        </div>
      </div>

      <!-- Capital Price -->
      <div class="form-group">
        <label class="form-label">Capital price</label>
        <input type="text" class="form-input" placeholder="0">
      </div>

      <!-- SKU Stock Keeping Unit -->
      <div class="form-group">
        <label class="form-label">(SKU) Stock Keeping Unit</label>
        <div class="select-input">
          <span class="select-placeholder">per kilogram</span>
          <i class="bi bi-chevron-right select-arrow"></i>
        </div>
      </div>

      <!-- Branches -->
      <div class="form-group">
        <label class="form-label">Branches</label>
        <div class="select-input">
          <span class="select-placeholder">All branches</span>
          <i class="bi bi-chevron-right select-arrow"></i>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <button class="new-product-btn">
        New product
      </button>
      <button class="delete-product-btn">
        <i class="bi bi-trash"></i>
        Delete this product
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

  .form-container {
    background: #fff;
    padding: 20px;
  }

  .section-header {
    margin-bottom: 20px;
  }

  .section-header h2 {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin: 0;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .custom-select-wrapper {
    position: relative;
    width: 100%;   /* ensures full width */
    max-width: 100%;
  }

  .custom-select {
    width: 100%;
    max-width: 100%;
    padding: 12px 40px 12px 15px;
    border: none;
    border-radius: 8px;
    background-color: #f5f5f5;
    font-size: 14px;
    color: #333;
    appearance: none;
    cursor: pointer;
    box-sizing: border-box;
  }

  .custom-select:focus {
    outline: none;
    background-color: #fff;
    box-shadow: 0 0 0 2px #5DADE2;
  }

  .custom-select option {
    padding: 10px;
  }

  .select-arrows {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #666;
    pointer-events: none;
    transition: transform 0.2s ease;
  }

  .select-arrows.open {
    transform: translateY(-50%) rotate(180deg);
  }

  .dropdown-list {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    max-height: 200px;
    overflow-y: auto;
    display: none;
  }

  .dropdown-list.show {
    display: block;
  }

  .dropdown-item {
    padding: 12px 15px;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
  }

  .dropdown-item:last-child {
    border-bottom: none;
  }

  .dropdown-item:hover {
    background-color: #f8f9fa;
  }

  .dropdown-item.selected {
    background-color: #e3f2fd;
    color: #1976d2;
  }

  .dropdown-item.hidden {
    display: none;
  }

  .no-results {
    padding: 12px 15px;
    font-size: 14px;
    color: #999;
    text-align: center;
    font-style: italic;
  }

  /* Filterable Dropdown Styles */
  .filterable-select-wrapper {
    position: relative;
    width: 100%;
  }

  .filterable-select-input {
    width: 100%;
    padding: 12px 40px 12px 15px;
    border: none;
    border-radius: 8px;
    background-color: #f5f5f5;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    box-sizing: border-box;
    transition: all 0.2s ease;
  }

  .filterable-select-input:focus {
    outline: none;
    background-color: #fff;
    box-shadow: 0 0 0 2px #5DADE2;
    cursor: text;
  }

  .filterable-select-input::placeholder {
    color: #999;
  }

  .dropdown-list {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    max-height: 200px;
    overflow-y: auto;
    display: none;
  }

  .dropdown-list.show {
    display: block;
  }

  .dropdown-item {
    padding: 12px 15px;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
  }

  .dropdown-item:last-child {
    border-bottom: none;
  }

  .dropdown-item:hover {
    background-color: #f8f9fa;
  }

  .dropdown-item.selected {
    background-color: #e3f2fd;
    color: #1976d2;
  }

  .dropdown-item.hidden {
    display: none;
  }

  .no-results {
    padding: 12px 15px;
    font-size: 14px;
    color: #999;
    text-align: center;
    font-style: italic;
  }

  .form-label {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 8px;
    font-weight: 500;
  }

  .form-input {
    width: 100%;
    padding: 12px 15px;
    border: none;
    border-radius: 8px;
    background-color: #f5f5f5;
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
  }

  .form-input:focus {
    outline: none;
    background-color: #fff;
    box-shadow: 0 0 0 2px #5DADE2;
  }

  .form-input::placeholder {
    color: #999;
  }

  .toggle-group {
    margin-bottom: 30px;
  }

  .toggle-label-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .toggle-switch {
    position: relative;
  }

  .toggle-input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .toggle-slider {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 28px;
    background-color: #5DADE2;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .toggle-slider:before {
    content: "";
    position: absolute;
    height: 22px;
    width: 22px;
    right: 3px;
    top: 3px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.3s;
  }

  .toggle-input:not(:checked) + .toggle-slider {
    background-color: #ccc;
  }

  .toggle-input:not(:checked) + .toggle-slider:before {
    transform: translateX(-22px);
  }

  .photo-upload-container {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 15px;
    background-color: #f5f5f5;
    border-radius: 8px;
    }

    .photo-placeholder {
    width: 40px;
    height: 40px;
    background-color: #e0e0e0;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    }

    .photo-placeholder img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
    }

    .file-info {
    flex: 1;
    font-size: 13px;
    color: #555;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    }

  .choose-photo-btn {
    right: 0 !important;
    background-color: #4A4A4A;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  .choose-photo-btn:hover {
    background-color: #333;
  }

  .select-input {
    width: 100%;
    padding: 12px 15px;
    border: none;
    border-radius: 8px;
    background-color: #f5f5f5;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    box-sizing: border-box;
  }

  .select-input:hover {
    background-color: #eeeeee;
  }

  .select-placeholder {
    font-size: 14px;
    color: #999;
  }

  .action-buttons {
    margin-left: 50%;
    margin-top: 20px;
    transform: translateX(-50%);
    width: calc(100% - 40px);
    max-width: 360px;
    z-index: 100;
  }

  .new-product-btn {
    width: 100%;
    background-color: #5DADE2;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 16px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 12px;
    transition: background-color 0.2s ease;
  }

  .new-product-btn:hover {
    background-color: #4A90E2;
  }

  .delete-product-btn {
    width: 100%;
    background-color: transparent;
    color: #ff4757;
    border: none;
    border-radius: 8px;
    padding: 12px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background-color 0.2s ease;
  }

  .delete-product-btn:hover {
    background-color: #fff5f5;
  }

  /* Mobile responsiveness */
  @media (max-width: 480px) {
    .page-header-nya {
      padding: 15px;
    }
    
    .form-container {
      padding: 15px;
    }
    
    .action-buttons {
      width: calc(100% - 30px);
    }

    .photo-upload-container {
      padding: 15px;
    }
  }

</style>
@endsection

@section('js')
<script>
  // Photo upload functionality
  const photoInput = document.getElementById('photoInput');
  const photoPreview = document.getElementById('photoPreview');
  const fileNameDisplay = document.getElementById('fileNameDisplay');

  photoInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
      const file = this.files[0];

      const reader = new FileReader();
      reader.onload = function(e) {
        photoPreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
      };
      reader.readAsDataURL(file);

      fileNameDisplay.textContent = file.name;
    }
  });

  // Filterable Dropdown functionality
  class FilterableDropdown {
    constructor(inputId) {
      this.input = document.getElementById(inputId);
      this.hiddenInput = document.getElementById('categoryValue');
      this.arrow = document.getElementById('selectArrow');
      this.dropdownList = document.getElementById('dropdownList');
      this.items = this.dropdownList.querySelectorAll('.dropdown-item');
      this.selectedValue = '';
      this.selectedText = '';
      this.isOpen = false;
      
      this.init();
    }
    
    init() {
      // Click on input to toggle dropdown
      this.input.addEventListener('click', (e) => {
        e.stopPropagation();
        this.toggleDropdown();
      });
      
      // Input typing for filtering
      this.input.addEventListener('input', (e) => {
        this.filterItems(e.target.value);
      });
      
      // Keyboard navigation
      this.input.addEventListener('keydown', (e) => {
        this.handleKeyNavigation(e);
      });
      
      // Click on dropdown items
      this.items.forEach(item => {
        item.addEventListener('click', (e) => {
          e.stopPropagation();
          this.selectItem(item);
        });
      });
      
      // Close dropdown when clicking outside
      document.addEventListener('click', () => {
        this.closeDropdown();
      });
      
      // Prevent dropdown from closing when clicking inside it
      this.dropdownList.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    }
    
    toggleDropdown() {
      if (this.isOpen) {
        this.closeDropdown();
      } else {
        this.openDropdown();
      }
    }
    
    openDropdown() {
      this.isOpen = true;
      this.dropdownList.classList.add('show');
      this.arrow.classList.add('open');
      this.input.removeAttribute('readonly');
      this.input.focus();
      
      // Clear input to show all options when opening
      if (this.input.value) {
        this.input.select();
      }
    }
    
    closeDropdown() {
      this.isOpen = false;
      this.dropdownList.classList.remove('show');
      this.arrow.classList.remove('open');
      this.input.setAttribute('readonly', 'readonly');
      
      // Restore selected text or clear if no selection
      this.input.value = this.selectedText || '';
      this.clearFilter();
    }
    
    selectItem(item) {
      // Remove previous selection
      this.items.forEach(i => i.classList.remove('selected'));
      
      // Set new selection
      item.classList.add('selected');
      this.selectedValue = item.dataset.value;
      this.selectedText = item.textContent;
      this.input.value = this.selectedText;
      this.hiddenInput.value = this.selectedValue; // Store value for form submission
      
      this.closeDropdown();
    }
    
    filterItems(searchText) {
      const searchLower = searchText.toLowerCase();
      let hasVisibleItems = false;
      
      this.items.forEach(item => {
        const itemText = item.textContent.toLowerCase();
        const shouldShow = itemText.includes(searchLower);
        
        if (shouldShow) {
          item.classList.remove('hidden');
          hasVisibleItems = true;
        } else {
          item.classList.add('hidden');
        }
      });
      
      // Show/hide "no results" message
      this.toggleNoResults(!hasVisibleItems);
    }
    
    clearFilter() {
      this.items.forEach(item => {
        item.classList.remove('hidden');
      });
      this.toggleNoResults(false);
    }
    
    toggleNoResults(show) {
      let noResultsDiv = this.dropdownList.querySelector('.no-results');
      
      if (show && !noResultsDiv) {
        noResultsDiv = document.createElement('div');
        noResultsDiv.className = 'no-results';
        noResultsDiv.textContent = 'No categories found';
        this.dropdownList.appendChild(noResultsDiv);
      } else if (!show && noResultsDiv) {
        noResultsDiv.remove();
      }
    }
    
    handleKeyNavigation(e) {
      if (!this.isOpen) return;
      
      const visibleItems = Array.from(this.items).filter(item => 
        !item.classList.contains('hidden')
      );
      
      if (visibleItems.length === 0) return;
      
      const currentSelected = this.dropdownList.querySelector('.dropdown-item.selected');
      let currentIndex = visibleItems.indexOf(currentSelected);
      
      switch (e.key) {
        case 'ArrowDown':
          e.preventDefault();
          currentIndex = (currentIndex + 1) % visibleItems.length;
          this.highlightItem(visibleItems[currentIndex]);
          break;
          
        case 'ArrowUp':
          e.preventDefault();
          currentIndex = currentIndex <= 0 ? visibleItems.length - 1 : currentIndex - 1;
          this.highlightItem(visibleItems[currentIndex]);
          break;
          
        case 'Enter':
          e.preventDefault();
          if (currentSelected) {
            this.selectItem(currentSelected);
          }
          break;
          
        case 'Escape':
          e.preventDefault();
          this.closeDropdown();
          break;
      }
    }
    
    highlightItem(item) {
      this.items.forEach(i => i.classList.remove('selected'));
      item.classList.add('selected');
      item.scrollIntoView({ block: 'nearest' });
    }
  }
  
  // Initialize the filterable dropdown when DOM is loaded
  document.addEventListener('DOMContentLoaded', () => {
    new FilterableDropdown('categoryInput');
  });
</script>
@endsection