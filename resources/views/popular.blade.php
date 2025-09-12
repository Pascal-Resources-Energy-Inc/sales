@extends('layouts.header')
@section('css')
<style>
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

 
  .section-header {
    padding: 15px 20px;
    border-bottom: 1px solid #f0f0f0;
  }

  .section-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin: 0;
  }

  .popular-products {
    margin-top: 20px !important;
    padding: 15px;
  }

  .product-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    align-items: flex-start;
  }

  .product-row:last-child {
    margin-bottom: 0;
  }

  /* Product Card */
  .popular-product-card {
    flex: 1;
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 12px;
    text-align: center;
    position: relative;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .popular-product-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
  }

  /* Close button (X) */
  .product-close-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: #ff4757;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    cursor: pointer;
    transition: background 0.2s ease;
    box-shadow: 0 2px 4px rgba(255, 71, 87, 0.3);
  } 

  .product-close-btn:hover {
    background: #ff3838;
  }

  /* Product Image */
  .popular-product-image {
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    background: #fafafa;
    border-radius: 8px;
    overflow: hidden;
  }

  .popular-product-image img {
    max-width: 70%;
    max-height: 70%;
    width: auto;
    height: auto;
    object-fit: contain;
  }

  /* Product Info */
  .popular-product-name {
    font-size: 13px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.2;
    min-height: 32px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .popular-product-price {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 0;
  }

  .current-price {
    font-size: 14px;
    font-weight: 700;
    color: #4A90E2;
  }

  .original-price {
    font-size: 12px;
    color: #999;
    text-decoration: line-through;
  }

  /* Add Item Card */
  .add-item-card {
    flex: 1;
    background: #fff;
    border: 2px dashed #4A90E2;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
    min-height: 140px;
  }

  .add-item-card:hover {
    background: #f8fbff;
    border-color: #357abd;
    transform: translateY(-2px);
  }

  .add-item-icon {
    width: 40px;
    height: 40px;
    background: #4A90E2;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-bottom: 8px;
    transition: background 0.2s ease;
  }

  .add-item-card:hover .add-item-icon {
    background: #357abd;
  }

  .add-item-text {
    font-size: 14px;
    font-weight: 500;
    color: #4A90E2;
    margin: 0;
  }

  /* Modal Styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    animation: fadeIn 0.3s ease;
  }

  .modal-content {
    background-color: #fff;
    margin: 20% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    animation: slideIn 0.3s ease;
    max-height: 80vh;
    overflow-y: auto;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes slideIn {
    from { 
      opacity: 0;
      transform: translateY(-50px);
    }
    to { 
      opacity: 1;
      transform: translateY(0);
    }
  }

  .modal-header {
    padding: 20px 25px 15px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .modal-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin: 0;
  }

  .close {
    background: none;
    border: none;
    font-size: 28px;
    color: #999;
    cursor: pointer;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s ease;
  }

  .close:hover {
    background: #f5f5f5;
    color: #666;
  }

  .modal-body {
    padding: 20px 25px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
  }

  .form-label-optional {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #666;
    margin-bottom: 8px;
  }

  .required-asterisk {
    color: #e74c3c;
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box;
  }

  .form-control:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
  }

  .file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    width: 100%;
  }

  .file-input {
    position: absolute;
    left: -9999px;
    opacity: 0;
  }

  .file-input-button {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 30px 20px;
    border: 2px dashed #4A90E2;
    border-radius: 8px;
    background: #f8fbff;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: center;
    gap: 10px;
  }

  .file-input-button:hover {
    border-color: #357abd;
    background: #f0f8ff;
  }

  .file-input-button span:first-child {
    font-size: 24px;
  }

  .file-input-button span:last-child {
    font-size: 14px;
    color: #4A90E2;
    font-weight: 500;
  }

  .image-preview {
    width: 100%;
    max-width: 200px;
    height: auto;
    border-radius: 8px;
    margin-top: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .modal-footer {
    padding: 15px 25px 20px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
  }

  .btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    min-width: 100px;
  }

  .btn-cancel {
    background-color: #f8d7da;
    color: #842029;
    border: 1px solid #f5c2c7;
  }

  .btn-cancel:hover {
    background-color: #f5c2c7;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .btn-submit {
    background-color: #cff4fc;
    color: #055160;
    border: 1px solid #b8daff;
  }

  .btn-submit:hover {
    background-color: #b8daff;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid transparent;
  }

  .alert-danger {
    background-color: #f8d7da;
    border-color: #f5c2c7;
    color: #842029;
  }

  .error-list {
    margin: 0;
    padding-left: 20px;
  }

  .error-list li {
    margin-bottom: 5px;
  }

  /* Success message */
  .alert-success {
    background-color: #d1edff;
    border-color: #bee5eb;
    color: #0c5460;
    padding: 15px;
    margin: 15px;
    border-radius: 8px;
    font-weight: 500;
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

  /* Responsive Design */
  @media (max-width: 375px) {
    .popular-section {
      margin: 10px;
    }

    .product-row {
      gap: 10px;
    }

    .popular-product-card {
      padding: 10px;
    }

    .popular-product-image {
      height: 70px;
    }

    .popular-product-name {
      font-size: 12px;
      min-height: 30px;
    }

    .current-price {
      font-size: 13px;
    }

    .add-item-card {
      padding: 15px;
      min-height: 120px;
    }

    .add-item-icon {
      width: 35px;
      height: 35px;
      font-size: 18px;
    }

    .add-item-text {
      font-size: 13px;
    }

    .modal-content {
      width: 95%;
      margin: 10% auto;
    }

    .modal-header,
    .modal-body,
    .modal-footer {
      padding-left: 20px;
      padding-right: 20px;
    }
  }
  .page-header-nya {
      background: #fff;
      padding: 20px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: -59px;
      margin-bottom: 10px !important;
      position: relative;
      outline: 0.2px solid #e1e1e1ff;
    }
</style>
@endsection

@section('content')


<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Error Message -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Popular Products Section -->
<div class="content-area">
  <!-- <div class="section-header">
    <h2 class="section-title">Products</h2>
  </div> -->

  <!-- Page Header -->
<div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Place Order</h1>
      <div class="header-icons">
      </div>
    </div>
  
  <div class="popular-products">
    @php
        $products = App\Product::orderBy('created_at', 'desc')->get();
        $productChunks = $products->chunk(2);
    @endphp

    @if($products->count() > 0)
        @foreach($productChunks as $chunk)
            <div class="product-row">
                @foreach($chunk as $product)
                    <div class="popular-product-card">
                        <button class="product-close-btn" onclick="deleteProduct({{ $product->id }})">
                            <i class="bi bi-x"></i>
                        </button>
                        <div class="popular-product-image">
                            @if($product->product_image)
                                <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                            @else
                                <img src="{{ asset('images/stovewcyllinder.jpg') }}" alt="{{ $product->product_name }}">
                            @endif
                        </div>
                        <div class="popular-product-name">{{ $product->product_name }}</div>
                        <div class="popular-product-price">
                            <span class="current-price">₱{{ number_format($product->price, 2) }}</span>
                            <!-- @if($product->deposit)
                                <span class="original-price">₱{{ number_format($product->deposit, 2) }}</span>
                            @endif -->
                        </div>
                    </div>
                @endforeach
                
                @if($chunk->count() < 2)
                    <div style="flex: 1;"></div>
                @endif
            </div>
        @endforeach
    @endif

    <!-- Add Item Card Row -->
    <div class="product-row">
      <div class="add-item-card" onclick="showAddItemModal()">
        <div class="add-item-icon">
          <i class="bi bi-plus"></i>
        </div>
        <p class="add-item-text">Add Item</p>
      </div>
      <div style="flex: 1;"></div>
    </div>
  </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add New Product</h2>
            <button class="close" onclick="closeModal()">&times;</button>
        </div>
        
        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="product_name" class="form-label">Product Name <span class="required-asterisk">*</span></label>
                    <input type="text" id="product_name" name="product_name" class="form-control" 
                           value="{{ old('product_name') }}" required placeholder="Enter product name">
                </div>

                <div class="form-group">
                    <label for="price" class="form-label">Price (₱) <span class="required-asterisk">*</span></label>
                    <input type="number" id="price" name="price" class="form-control" 
                           value="{{ old('price') }}" step="0.01" min="0" required placeholder="0.00">
                </div>

                <div class="form-group">
                    <label for="deposit" class="form-label-optional">Deposit (₱)</label>
                    <input type="number" id="deposit" name="deposit" class="form-control" 
                           value="{{ old('deposit') }}" step="0.01" min="0" placeholder="0.00">
                </div>

                <div class="form-group">
                    <label for="product_image" class="form-label">Product Image <span class="required-asterisk">*</span></label>
                    <div class="file-input-wrapper">
                        <input type="file" id="product_image" name="product_image" class="file-input" 
                               accept="image/jpeg,image/png,image/jpg,image/gif" required>
                        <div class="file-input-button" id="file-button">
                            <span>📷</span>
                            <span>Click to upload image</span>
                        </div>
                    </div>
                    <div id="image-preview" style="display: none;">
                        <img id="preview-img" src="" alt="Preview" class="image-preview">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-submit">Add Product</button>
            </div>
        </form>
    </div>
</div>

<div class="bottom-nav">
  <i class="bi bi-grid-3x3-gap"></i>
  <i class="bi bi-star active"></i>
  <i class="bi bi-clipboard-check"></i>
</div>

<script>
function showAddItemModal() {
    console.log('Opening modal...');
    document.getElementById('addProductModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    console.log('Closing modal...');
    document.getElementById('addProductModal').style.display = 'none';
    document.body.style.overflow = 'auto';
    
    document.getElementById('productForm').reset();
    document.getElementById('image-preview').style.display = 'none';
    document.getElementById('file-button').innerHTML = '<span>📷</span><span>Click to upload image</span>';
}

window.onclick = function(event) {
    const modal = document.getElementById('addProductModal');
    if (event.target == modal) {
        closeModal();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('product_image');
    const fileButton = document.getElementById('file-button');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    fileButton.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('File button clicked');
        fileInput.click();
    });
    
    // Handle file selection
    fileInput.addEventListener('change', function(e) {
        console.log('File selected:', e.target.files[0]);
        const file = e.target.files[0];
        
        if (file) {
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Please select a valid image file (JPEG, PNG, JPG, GIF)');
                fileInput.value = '';
                return;
            }
            
            // Validate file size (max 2MB)
            if (file.size > 2048 * 1024) {
                alert('File size must be less than 2MB');
                fileInput.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
                fileButton.innerHTML = '<span>📷</span><span>Change image</span>';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
            fileButton.innerHTML = '<span>📷</span><span>Click to upload image</span>';
        }
    });
    
    // Form submission handling
    const form = document.getElementById('productForm');
    form.addEventListener('submit', function(e) {
        console.log('Form submitted');
        
        // Basic validation
        const productName = document.getElementById('product_name').value.trim();
        const price = document.getElementById('price').value;
        const productImage = document.getElementById('product_image').files[0];
        
        if (!productName) {
            alert('Please enter a product name');
            e.preventDefault();
            return;
        }
        
        if (!price || price <= 0) {
            alert('Please enter a valid price');
            e.preventDefault();
            return;
        }
        
        if (!productImage) {
            alert('Please select a product image');
            e.preventDefault();
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Adding...';
        submitBtn.disabled = true;
        
        // Re-enable button after 5 seconds (in case of error)
        setTimeout(() => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
});

// Delete product function
function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        // Create a form to submit DELETE request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/products/' + productId;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Keep modal open if there are validation errors
@if ($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        showAddItemModal();
    });
@endif

// Escape key to close modal
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});

console.log('JavaScript loaded successfully');
</script>
@endsection