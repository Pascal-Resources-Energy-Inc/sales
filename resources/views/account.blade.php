@extends('layouts.header')

@section('content')
<div class="account-page">
  <div class="content-area-fix">
    <!-- Header -->
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Account</h1>
    </div>

    <!-- Profile Section -->
    <div class="section-card">
      <div class="section-content profile-section">
        <div class="profile-avatar">
          <div class="avatar-circle">
            <i class="bi bi-person-fill"></i>
          </div>
        </div>
        <div class="profile-info">
          <div class="profile-name">Arvin Santos</div>
          <div class="profile-phone">09876543245</div>
          <div class="profile-email">Owner@gmail.com</div>
        </div>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="section-card">
      <div class="menu-list">
        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-gear"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Account Settings</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-clock-history"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Subscription History</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-building"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Business Information</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="{{route('home')}}" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-speedometer2"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Dashboard</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-question-circle"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">User Help</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>

        <a href="#" class="menu-item">
          <div class="menu-content">
            <div class="menu-icon">
              <i class="bi bi-people"></i>
            </div>
            <div class="menu-text">
              <div class="menu-title">Customers</div>
            </div>
          </div>
          <div class="menu-arrow">
            <i class="bi bi-chevron-right"></i>
          </div>
        </a>
      </div>
    </div>

    <!-- App Version -->
    <div class="section-card">
      <div class="section-content">
        <div class="version-info">
          <span class="version-text">Gaz Lite V.1.0.0</span>
        </div>
      </div>
    </div>

    <!-- Sign Out Button -->
    <div class="signout-wrapper">
      <button class="signout-btn" onclick="logout()" id="signout-btn">
        <i class="bi bi-box-arrow-right"></i>
        Sign out
      </button>
    </div>
  </div>
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin: 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
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
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .profile-phone {
    font-size: 14px;
    color: #666;
    margin-bottom: 2px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .profile-email {
    font-size: 14px;
    color: #666;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
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
    transition: background-color 0.2s ease;
  }

  .menu-item:last-child {
    border-bottom: none;
  }

  .menu-item:hover {
    background-color: #f8f9fa;
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
  }

  .menu-text {
    flex-grow: 1;
  }

  .menu-title {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin: 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .menu-arrow {
    color: #ccc;
    font-size: 14px;
    flex-shrink: 0;
  }

  /* Version Info */
  .version-info {
    text-align: center;
    padding: 10px 0;
  }

  .version-text {
    font-size: 14px;
    color: #666;
    font-weight: 500;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
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
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .signout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.5);
  }

  .signout-btn:active {
    transform: scale(0.98);
  }

  /* Custom SweetAlert2 Styling */
  .swal2-popup {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
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
    font-family: 'Inter', sans-serif !important;
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
    font-family: 'Inter', sans-serif !important;
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.4) !important;
  }
  
  .swal2-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 16px rgba(108, 117, 125, 0.5) !important;
  }

  /* Responsive adjustments */
  @media (max-width: 480px) {
    .section-card {
      margin: 10px;
    }
    
    .profile-section {
      padding: 20px 15px;
    }
    
    .menu-item {
      padding: 15px;
    }
    
    .profile-name {
      font-size: 16px;
    }
    
    .profile-phone,
    .profile-email {
      font-size: 13px;
    }
    
    .menu-title {
      font-size: 14px;
    }
    
    .signout-btn {
      padding: 14px 18px;
      font-size: 15px;
    }
  }
</style>
@endsection

@section('js')
<!-- SweetAlert2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>

<script>
            function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    function performSignOut() {
        // Clear any stored data
        localStorage.clear();
        sessionStorage.clear();
        
        // Show success message
        Swal.fire({
            title: '✅ Signed Out Successfully!',
            text: 'You have been securely signed out of your account.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: true
        }).then(() => {
            // Redirect to login page
            // Replace with your actual login route
            window.location.href = "{{ route('login') }}";
        });
    }

    // Menu item click handlers (you can customize these)
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const menuTitle = this.querySelector('.menu-title').textContent;
            
            // You can add specific navigation logic here
            console.log('Clicked:', menuTitle);
            
            // Example: Show coming soon for demonstration
            Swal.fire({
                title: menuTitle,
                text: 'This feature is coming soon!',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    });
});
</script>
@endsection