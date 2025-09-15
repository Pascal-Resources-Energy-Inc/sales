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
    /* Reset */
 body {
      margin: 0;
      background: #f8f9fa;
      font-family: Arial, sans-serif;
      padding-top: 60px; /* Top navbar space */
      padding-bottom: 70px; /* Bottom navbar space */
      overflow-x: hidden;
    }

    /* ===== Top Navbar ===== */
    .top-navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #ffffffff;
      color: #5bc2e7;
      display: flex;
      align-items: center;
      padding: 12px 15px;
      z-index: 1050;
      outline: 0.2px solid #cacacaa6;
    }

    .top-navbar h4 {
      margin: 0;
      font-size: 18px;
      font-weight: 500;
    }

    .menu-icon {
      font-size: 26px;
      cursor: pointer;
      color: #fff;
    }

    /* ===== Side Navbar (Drawer) ===== */
    .side-navbar {
      position: fixed;
      top: 0;
      left: -250px;
      height: 100%;
      width: 250px;
      background: #5bc2e7;
      color: #ffffff;
      box-shadow: 2px 0 8px rgba(0,0,0,0.2);
      transition: left 0.3s ease;
      z-index: 1100;
      padding-top: 60px; /* Same height as top navbar */
    }

    .side-navbar.open {
      left: 0;
    }

    .side-navbar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .side-navbar ul li {
      padding: 15px 20px;
      /* border-bottom: 1px solid #eee; */
    }

    .side-navbar ul li a {
      text-decoration: none;
      color: #ffffff;
      font-size: 16px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .side-navbar ul li a i {
      font-size: 18px;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease;
      z-index: 1090;
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


    .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px; /* FIXED HEIGHT - CRITICAL */
            background: #ffffff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
            z-index: 1000;
            box-sizing: border-box; /* Include padding/border in height */
            padding: 0; /* Remove default padding */
        }
        
    .bottom-nav .under {
            margin-bottom: 5px;
        }
    
    
      .nav-item {
            flex: 1; /* Equal width distribution */
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #777;
            font-size: 11px; /* Fixed font size */
            height: 100%; /* Full height of bottom nav */
            padding: 8px 2px; /* Fixed padding */
            box-sizing: border-box;
            transition: all 0.3s ease;
            position: relative;
            min-width: 0; /* Prevent flex item overflow */
        }

        .nav-item i {
            font-size: 20px !important;
            margin-bottom: 2px !important;
            line-height: 1 !important;
            width: 20px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

/* Active State */
.bottom-nav .nav-item.active,
.bottom-nav .nav-item:hover {
  color: #007bff;
}

.bottom-nav .nav-item.active i,
.bottom-nav .nav-item:hover i {
  color: #007bff;
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
  height: 50px;
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
  background: linear-gradient(135deg, #5bc2e7 0%, #4A90E2 100%);
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
    <i  class="text-info pr-5 bi bi-list menu-icon" id="menuToggle"></i>
    <h4 style='margin-left:10px;' class='ml-3'>Welcome {{auth()->user()->name}}!</h4>
    <div></div> <!-- Spacer for layout balance -->
  </div>

  <!-- ===== Side Navbar (Drawer) ===== -->
 <div class="side-navbar d-flex flex-column  p-2" id="sideNavbar">
    <h4 class="m-4">Welcome {{ auth()->user()->name }}!</h4>

    <!-- Navigation Menu -->
    <ul class="text-white">
        <li>
            <a href="{{ route('home') }}" class="active">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-credit-card"></i> Transactions
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-bicycle"></i> Riders
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-people"></i> Customers
            </a>
        </li>
        <li>
            <a href="{{ route('popular') }}">
                <i class="bi bi-box-seam"></i> Products
            </a>
        </li>
        <li>
            <a href="{{ route('reports') }}">
                <i class="bi bi-gear"></i> Reports
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-gear"></i> Settings
            </a>
        </li>
    </ul>

    <!-- Logout Button at Bottom -->
    <div class="mt-auto">
        <a href="#" onclick="logout(); show();" class="btn btn-outline w-100 bg-white text-danger">
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
    <a href="{{route('home')}}" class="nav-item">
      <i class="bi bi-house-door"></i>
      <span class="under">Home</span>
    </a>
    <a href="{{url('/products')}}" class="nav-item">
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
    <a href="#" class="nav-item">
      <i class="bi bi-clock-history"></i>
      <span class="under">History</span>
    </a>
   
    <a href="#" class="nav-item">
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
  </script>

  <!-- QR Camera JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get the QR button and modal elements
      const qrCameraButton = document.getElementById('qrCameraButton');
      const cameraModal = document.getElementById('cameraModal');
      const closeCameraModal = document.getElementById('closeCameraModal');
      const cameraVideo = document.getElementById('cameraVideo');
      const cameraStatus = document.getElementById('cameraStatus');

      if (!qrCameraButton) {
        console.warn('QR Camera button not found');
        return;
      }

      let currentStream = null;

      // Open camera function
      function openCamera() {
        cameraModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        startCamera();
      }

      // Close camera function
      function closeCamera() {
        cameraModal.style.display = 'none';
        document.body.style.overflow = '';
        stopCamera();
      }

      // Start camera function
      async function startCamera() {
        try {
          cameraStatus.textContent = 'Starting camera...';

          const constraints = {
            video: {
              facingMode: 'environment', // Use back camera for QR scanning
              width: { ideal: 1280 },
              height: { ideal: 720 }
            }
          };

          currentStream = await navigator.mediaDevices.getUserMedia(constraints);
          cameraVideo.srcObject = currentStream;
          
          cameraVideo.onloadedmetadata = () => {
            cameraStatus.textContent = 'Point camera at QR code to scan';
          };

        } catch (error) {
          console.error('Camera error:', error);
          cameraStatus.textContent = 'Camera access failed. Please allow camera permission.';
        }
      }

      // Stop camera function
      function stopCamera() {
        if (currentStream) {
          currentStream.getTracks().forEach(track => track.stop());
          currentStream = null;
        }
      }

      // Event listeners
      qrCameraButton.addEventListener('click', function(e) {
        e.preventDefault();
        openCamera();
      });

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

    @yield('js')
</body>
</html>