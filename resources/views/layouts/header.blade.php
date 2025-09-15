<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @laravelPWA --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon"  href="{{url('images/aaa.png')}}">
    <link rel="icon"  href="{{url('images/aaa.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ asset('login_css/images/loader.gif')}}") 50% 50% no-repeat white ;
            opacity: .8;
            background-size:120px 120px;
        }
      .bg-overlay {
		    background: linear-gradient(to right, #c3c3c3, #c3c3c3) !important;
    		/* opacity: .9; */
   			/* Change 5px to your desired thickness */
		}
    </style>
    <!-- LogIN CSS -->
    @yield('css')

  <style>
     body {
      margin: 0;
      background: #f8f9fa;
      font-family: Arial, sans-serif;
      padding-top: 60px; /* Top navbar space */
      padding-bottom: 70px; /* Bottom navbar space */
      overflow-x: hidden;
    }

    /* ===== Modern Top Navbar ===== */
    .top-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(33deg, #5BC2E7 0%, #5BC2E7 100%);
        color: white;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        z-index: 1050;
        box-shadow: 0 2px 20px rgba(79, 172, 254, 0.3);
        height: 70px;
    }

    .top-navbar h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        margin-left: 15px;
        position: relative;
    }

    .menu-icon {
        font-size: 24px;
        cursor: pointer;
        color: white;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .menu-icon:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    /* ===== Modern Side Navbar (Updated Design) ===== */
    .side-navbar {
        position: fixed;
        top: 0;
        left: -320px;
        height: 100%;
        width: 320px;
        background: linear-gradient(33deg, #5BC2E7 0%, #5BC2E7 100%);
        color: white;
        box-shadow: 4px 0 25px rgba(0,0,0,0.15);
        transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1100;
        padding: 0;
        overflow-y: auto;
    }

    .side-navbar.open {
        left: 0;
    }

    /* Sidebar Header */
    .sidebar-header {
        padding: 30px 25px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .user-details h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: white;
    }

    .user-details .branch-info {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 2px;
    }

    .user-status {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        font-size: 11px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 15px;
        margin-top: 8px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Navigation Menu */
    .side-navbar ul {
        list-style: none;
        padding: 20px 0;
        margin: 0;
    }

    .side-navbar ul li {
        margin: 3px 20px;
        padding: 0;
    }

    .side-navbar ul li a {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 18px 20px;
        border-radius: 15px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .side-navbar ul li a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transition: left 0.3s ease;
        z-index: -1;
    }

    .side-navbar ul li a:hover::before,
    .side-navbar ul li a.active::before {
        left: 0;
    }

    .side-navbar ul li a:hover,
    .side-navbar ul li a.active {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        transform: translateX(3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .side-navbar ul li a i {
        font-size: 20px;
        width: 24px;
        text-align: center;
        opacity: 0.9;
    }

    /* Dropdown Styles */
    .dropdown-item {
        position: relative;
        width: 90%;
    }

    .dropdown-toggle {
        cursor: pointer;
        position: relative;
        justify-content: space-between;
    }

    .dropdown-toggle .dropdown-arrow {
        font-size: 14px;
        transition: transform 0.3s ease;
        margin-left: auto;
    }

    .dropdown-toggle.expanded .dropdown-arrow {
        transform: rotate(180deg);
    } 
    
    #reportsDropdown i {
      margin-right: 17px;
    }

    .dropdown-menu-custom {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.3s ease;
      background: #ffffff;
      margin-top: 6px;
      border-radius: 12px;
      padding: 0;
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.08);
    }

    .dropdown-menu-custom.show {
      max-height: 400px;
      padding: 10px 0;
    }

    .dropdown-menu-custom a {
      display: block;
      padding: 12px 20px 12px 50px;
      font-size: 14px;
      font-weight: 500;
      color: #333 !important;
      border-radius: 8px;
      margin: 3px 12px;
      position: relative;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .dropdown-menu-custom a::before {
      content: '›';
      position: absolute;
      left: 25px;
      color: #007bff;
      font-weight: bold;
    }

    .dropdown-menu-custom a:hover {
      background: #f5f8ff;
      color: #007bff !important;
      transform: translateX(5px);
    }

    /* Footer Section */
    .sidebar-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px 25px 25px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.05);
    }

    .last-login {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 13px;
        margin-bottom: 15px;
    }

    .last-login i {
        font-size: 16px;
        opacity: 0.7;
    }

    .logout-btn {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: white !important;
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        text-decoration: none;
    }

    .logout-btn:hover {
        background: rgba(255, 255, 255, 0.2) !important;
        border-color: rgba(255, 255, 255, 0.3) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* ===== Overlay ===== */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1090;
        backdrop-filter: blur(2px);
    }

    .overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .content-area {
    padding-bottom: 100px !important;
    text-align: center;
    }

    .content-area-fix {
    margin-top: -59px;
    padding-bottom: 70px !important; 
    }

  /* Header styling - positioned within content area */
    .page-header {
      background: #fff;
      padding: 20px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: -10px !important;
      margin-bottom: 10px !important;
      position: relative;
      outline: 0.2px solid #e1e1e1ff;
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
      color: #4A90E2;
      margin: 0;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    /* ===== Modern Bottom Navigation ===== */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background: white;
        border-top: 1px solid #e9ecef;
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0 -2px 20px rgba(0,0,0,0.1);
        z-index: 1000;
        padding: 0;
    }
        
    .bottom-nav .under {
        margin-bottom: 5px;
    }
    
    .nav-item {
        flex: 1;
        display: flex !important;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #999;
        font-size: 11px;
        font-weight: 500;
        height: 100%;
        padding: 8px 2px;
        box-sizing: border-box;
        transition: all 0.3s ease;
        position: relative;
        min-width: 0;
    }

    .nav-item i {
        font-size: 20px !important;
        margin-bottom: 4px !important;
        line-height: 1 !important;
        width: 20px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

/* Active State */
.bottom-nav .nav-item.active,
.bottom-nav .nav-item:hover {
  color: #4facfe;
}

.bottom-nav .nav-item.active i,
.bottom-nav .nav-item:hover i {
  color: #4facfe;
}

.qr-icon-up {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  text-decoration: none;
  color: #5bc2e7;
  display: flex;
  flex-direction: column;
  align-items: center;
  z-index: 1100;
  cursor: pointer;
}

/* The circle around the QR icon */
.qr-icon-up .icon-wrapper {
  width: 50px;
  height: 70px;
  border: 2px solid #5bc2e7;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 6px;
  background: #fff;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15); /* Subtle shadow */
}

.qr-icon-up i {
  font-size: 22px;
  color: #5bc2e7;
}

.qr-icon-up span {
  font-size: 12px;
  font-weight: 500;
  color: #5bc2e7;
}

/* Hover effects */
.qr-icon-up:hover .icon-wrapper {
  background-color: #5bc2e7;
}

.qr-icon-up:hover i {
  color: #fff;
}

.qr-icon-up:hover span {
  color: #5bc2e7;
}

/* QR Camera Modal Styles */
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
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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

/* Mobile responsive for camera modal */
@media (max-width: 375px) {
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
</head>
<body>

  <!-- Main Content -->
   @if(Route::currentRouteName() == 'home')

  <div class="top-navbar">
    <i  class="text-white pr-5 bi bi-list menu-icon" id="menuToggle"></i>
    <h4 style='margin-left:10px;' class='ml-3'>Welcome {{auth()->user()->name}}!</h4>
    <div></div> <!-- Spacer for layout balance -->
  </div>

  <!-- ===== Modern Side Navbar (Updated) ===== -->
 <div class="side-navbar" id="sideNavbar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <div class="user-info">
            <div class="user-avatar">
                <i class="bi bi-person"></i>
            </div>
            <div class="user-details">
                <h4>{{ auth()->user()->name }}</h4>
                <div class="branch-info">Branch 1</div>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="text-white">
        <li>
            <a href="{{ route('home') }}" class="active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{route('history')}}">
                <i class="bi bi-receipt"></i> Transactions
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-clock-history"></i> Riders
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-file-text"></i> Customers
            </a>
        </li>
        <li>
            <a href="{{url('/products')}}">
                <i class="bi bi-shop"></i> Products
            </a>
        </li>
        <li class="dropdown-item">
            <a href="#" class="dropdown-toggle" id="reportsDropdown">
                <span><i class="bi bi-person-circle"></i> Reports</span>
            </a>
            <div class="dropdown-menu-custom" id="reportsSubmenu">
                <a href="#" data-report="dcc">DCC (Daily Closing Checklist)</a>
                <a href="#" data-report="dsrr">DSRR (Daily Sales Remittance Report)</a>
                <a href="#" data-report="pcv">PCV (Petty Cash Voucher)</a>
                <a href="#" data-report="pcfrr">PCFRR (Petty Cash Fund Replenishment Report)</a>
                <a href="#" data-report="alr">ALR (Accomplishment Log Report)</a>
            </div>
        </li>
    </ul>

    <!-- Footer Section -->
    <div class="sidebar-footer">
        <div class="last-login">
            <i class="bi bi-clock"></i>
            <div>
                <strong>Last login:</strong><br>
                Monday, July 1, 2026 (02:00 AM)
            </div>
        </div>
        <a href="#" onclick="logout(); show();" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

@endif

  <!-- ===== Overlay ===== -->
  <div class="overlay" id="overlay"></div>

  
                @yield('content')
    
 

  <!-- Bottom Navbar -->
  <nav class="bottom-nav">
    <a href="{{url('/home')}}" class="nav-item {{ request()->is('home') ? 'active' : '' }}">
      <i class="bi bi-house-door"></i>
      <span class="under">Home</span>
    </a>
    <a href="{{url('/products')}}" class="nav-item {{ request()->is('products') ? 'active' : '' }}">
      <i class="bi bi-cart"></i>
      <span class="under">Cart</span>
    </a>
    <!-- Updated QR Button with Camera functionality -->
    <div class="nav-item qr-icon-up" id="qrCameraButton">
        <div class="icon-wrapper">
            <i class="fas fa-barcode"></i>
        </div>
        <span>QR</span>
    </div>
    <a href="#" class="nav-item">
      <i class=""></i>
      <span style='color:white;'>QR</span>
    </a>
    <a href="{{url('/history')}}" class="nav-item {{ request()->is('history') ? 'active' : '' }}">
      <i class="bi bi-clock-history"></i>
      <span class="under">History</span>
    </a>
   
    <a href="{{url('/account')}}" class="nav-item {{ request()->is('account') ? 'active' : '' }}">
      <i class="bi bi-person"></i>
      <span class="under">Profile</span>
    </a>
  </nav>

  <!-- QR Camera Modal -->
  <div class="camera-modal-overlay" id="cameraModal">
    <div class="camera-modal-content">
      <div class="camera-header">
        <h3><i class="fas fa-camera"></i> QR Scanner</h3>
        <button class="camera-close" id="closeCameraModal">
          <i class="bi bi-x"></i>
        </button>
      </div>
      
      <div class="camera-container">
        <video id="cameraVideo" autoplay playsinline></video>
      </div>
      
      <div class="camera-controls">
        <div class="camera-status" id="cameraStatus">Camera is ready</div>

        <div class="d-flex justify-content-center gap-3 mt-2">
          <button id="switchCamera" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-camera"></i> Switch
          </button>
          <button id="toggleFlash" class="btn btn-outline-warning btn-sm">
            <i class="bi bi-lightning-charge"></i> Flash
          </button>
        </div>
      </div>

    </div>
  </div>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
            function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    
    </script>
  <script>
    const menuToggle = document.getElementById('menuToggle');
    const sideNavbar = document.getElementById('sideNavbar');
    const overlay = document.getElementById('overlay');

    // Open side navbar
    menuToggle.addEventListener('click', () => {
      sideNavbar.classList.add('open');
      overlay.classList.add('show');
    });

    // Close side navbar when clicking outside
    overlay.addEventListener('click', () => {
      sideNavbar.classList.remove('open');
      overlay.classList.remove('show');
    });

    // Dropdown functionality
    document.getElementById('reportsDropdown').addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = document.getElementById('reportsSubmenu');
        const arrow = this.querySelector('.dropdown-arrow');
        
        // Toggle the dropdown
        if (submenu.classList.contains('show')) {
            submenu.classList.remove('show');
            this.classList.remove('expanded');
        } else {
            submenu.classList.add('show');
            this.classList.add('expanded');
        }
    });

    // Handle dropdown item clicks
    document.querySelectorAll('#reportsSubmenu a').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const reportType = this.getAttribute('data-report');
            const reportName = this.textContent;
            
            // You can customize these actions based on your needs
            console.log('Selected report:', reportType, reportName);
            
            // Example: Navigate to report page
            // window.location.href = '/reports/' + reportType;
            
            // Example: Show alert (remove this in production)
            alert('You selected: ' + reportName);
            
            // Close the sidebar after selection
            sideNavbar.classList.remove('open');
            overlay.classList.remove('show');
        });
    });
  </script>

  <!-- QR Camera JavaScript -->
  <script>
document.addEventListener('DOMContentLoaded', function() {
  const qrCameraButton = document.getElementById('qrCameraButton');
  const cameraModal = document.getElementById('cameraModal');
  const closeCameraModal = document.getElementById('closeCameraModal');
  const cameraVideo = document.getElementById('cameraVideo');
  const cameraStatus = document.getElementById('cameraStatus');

  let currentStream = null;
  let usingFrontCamera = false;
  let currentTrack = null;

  // === CAMERA FUNCTIONS ===
  async function startCamera() {
    try {
      cameraStatus.textContent = 'Starting camera...';

      const constraints = {
        video: {
          facingMode: usingFrontCamera ? 'user' : 'environment',
          width: { ideal: 1280 },
          height: { ideal: 720 }
        }
      };

      currentStream = await navigator.mediaDevices.getUserMedia(constraints);
      cameraVideo.srcObject = currentStream;
      currentTrack = currentStream.getVideoTracks()[0];

      cameraVideo.onloadedmetadata = () => {
        cameraStatus.textContent = 'Point camera at QR code to scan';
      };
    } catch (error) {
      console.error('Camera error:', error);
      cameraStatus.textContent = 'Camera access failed. Please allow camera permission.';
    }
  }

  function stopCamera() {
    if (currentStream) {
      currentStream.getTracks().forEach(track => track.stop());
      currentStream = null;
      currentTrack = null;
    }
  }

  function openCamera() {
    cameraModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    startCamera();
  }

  function closeCamera() {
    cameraModal.style.display = 'none';
    document.body.style.overflow = '';
    stopCamera();
  }

  // === BUTTON HANDLERS ===
  document.getElementById('switchCamera').addEventListener('click', async () => {
    usingFrontCamera = !usingFrontCamera;
    stopCamera();
    await startCamera();
  });

  document.getElementById('toggleFlash').addEventListener('click', async () => {
    if (!currentTrack) return;

    const capabilities = currentTrack.getCapabilities();
    if (!capabilities.torch) {
      alert("Flash not supported on this device");
      return;
    }

    // flip the torch state
    const settings = currentTrack.getSettings();
    const torchOn = settings.torch === true;

    try {
      await currentTrack.applyConstraints({
        advanced: [{ torch: !torchOn }]
      });
    } catch (err) {
      console.error('Flash toggle failed:', err);
    }
  });

  // === MODAL EVENTS ===
  qrCameraButton.addEventListener('click', e => {
    e.preventDefault();
    openCamera();
  });

  closeCameraModal.addEventListener('click', closeCamera);

  cameraModal.addEventListener('click', e => {
    if (e.target === cameraModal) {
      closeCamera();
    }
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && cameraModal.style.display === 'flex') {
      closeCamera();
    }
  });
});
</script>


    @yield('js')
</body>
</html>