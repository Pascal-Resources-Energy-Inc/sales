@extends('layouts.header')

@section('content')
<div class="account-page">
  <div class="content-area-fix">
    <!-- Header -->
    <div class="page-header-nya">
      <button class="back-btn btn btn-link p-0" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title mb-0">Account</h1>
    </div>

    <!-- Profile Section -->
    <div class="section-card">
      <div class="section-content profile-section d-flex align-items-center">
        <div class="profile-avatar flex-shrink-0">
          <div class="avatar-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person-fill"></i>
          </div>
        </div>
        <div class="profile-info flex-grow-1">
          <div class="profile-name">Arvin Santos</div>
          <div class="profile-phone">09876543245</div>
          <div class="profile-email">Owner@gmail.com</div>
        </div>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="section-card">
      <div class="menu-list p-0">
        <a href="#" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-gear"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">Account Settings</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="{{ route('list_product')}}" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-bag"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">List of Product</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-clock-history"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">Subscription History</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-building"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">Business Information</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="{{route('manage_store')}}" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-shop"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">Manage Store</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item d-flex align-items-center justify-content-between text-decoration-none">
          <div class="menu-content d-flex align-items-center flex-grow-1">
            <div class="menu-icon d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-question-circle"></i>
            </div>
            <div class="menu-text flex-grow-1">
              <div class="menu-title mb-0">User Help</div>
            </div>
          </div>
          <div class="menu-arrow flex-shrink-0">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>
    </div>

    <!-- App Version -->
    <div class="version-info text-start">
      <span class="version-text">Gaz Lite V.1.0.0</span>
    </div>

    <!-- Sign Out Button -->
    <div class="signout-wrapper">
      <button class="signout-btn btn w-100 d-flex align-items-center justify-content-center" onclick="logout()" id="signout-btn">
        <i class="bi bi-box-arrow-right me-2"></i>
        Sign out
      </button>
    </div>
  </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    {{ csrf_field() }}
</form>
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
    text-decoration: none;
  }

  .back-btn:hover {
    color: #4A90E2;
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

  .page-title {
    font-size: 20px;
    font-weight: 600;
    color: #4A90E2;
    margin: 0;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }

  /* Card sections */
  .section-card {
    background: #fff;
    margin: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
  }

  .section-content {
    padding: 20px;
  }

  /* Profile Section */
  .profile-section {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 25px 20px;
  }

  .profile-avatar {
    flex-shrink: 0;
  }

  .avatar-circle {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
  }

  .profile-info {
    flex-grow: 1;
  }

  .profile-name {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 4px;
  }

  .profile-phone {
    font-size: 14px;
    color: #666;
    margin-bottom: 2px;
  }

  .profile-email {
    font-size: 14px;
    color: #666;
  }

  /* Menu List */
  .menu-list {
    padding: 0;
  }

  .menu-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 20px;
    border-bottom: 1px solid #f5f5f5;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .menu-item:last-child {
    border-bottom: none;
  }

  .menu-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
  }

  .menu-item:hover::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
    transition: all 0.3s ease;
  }

  .menu-content {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-grow: 1;
  }

  .menu-icon {
    width: 40px;
    height: 40px;
    background: #f6fbffff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #000000ff !important;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .menu-text {
    flex-grow: 1;
  }

  .menu-title {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin: 0;
  }

  .menu-arrow {
    color: #ccc;
    font-size: 14px;
    flex-shrink: 0;
    transition: all 0.3s ease;
  }

  .menu-item:hover .menu-arrow {
    color: #4A90E2;
    transform: translateX(5px);
  }

  /* Version Info */
  .version-info {
    text-align: left;
    padding: 10px 0;
    margin: 0 0 0 20px;
  }

  .version-text {
    font-size: 12px;
    color: #666;
    font-weight: 500;
  }

  /* Sign Out Button */
  .signout-wrapper {
    padding: 0 15px;
    margin: 30px 0 120px 0;
  }

  .signout-btn {
    width: 100%;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: #fff;
    border: none;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .signout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.5);
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
  }

  .signout-btn:active {
    transform: scale(0.98);
  }

  /* Custom SweetAlert2 Styling */
  .swal2-popup {
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
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4) !important;
  }
  
  .swal2-confirm:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.5) !important;
  }
  
  .swal2-cancel {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.4) !important;
  }
  
  .swal2-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(108, 117, 125, 0.5) !important;
  }
</style>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>

<script>
function logout() {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}

document.addEventListener('DOMContentLoaded', function() {
    // Handle menu items (excluding those with actual routes)
    document.querySelectorAll(".menu-item").forEach(item => {
        const href = item.getAttribute('href');
        if (href && href !== '#' && !href.includes('route')) {
            // Skip items with actual routes
            return;
        }
        
        if (href === '#') {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                const menuTitle = this.querySelector('.menu-title').textContent;
                
                // Show different messages based on menu item
                let message = 'This feature is coming soon!';
                let icon = 'info';
                
                if (menuTitle.includes('Settings')) {
                    message = 'Account settings panel will be available soon.';
                } else if (menuTitle.includes('History')) {
                    message = 'Your subscription history will be displayed here.';
                } else if (menuTitle.includes('Business')) {
                    message = 'Business information management coming soon.';
                } else if (menuTitle.includes('Help')) {
                    message = 'Help center and support will be available soon.';
                }
                
                Swal.fire({
                    title: menuTitle,
                    text: message,
                    icon: icon,
                    confirmButtonText: 'Got it!',
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        }
    });

    // Add smooth animations to menu items
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});

// Add global function for logout
window.logout = logout;
</script>
@endsection