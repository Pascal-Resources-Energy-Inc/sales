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
      /* background: #007bff; */
      color: #5bc2e7;
      display: flex;
      align-items: center;
      /* justify-content: space-between; */
      padding: 12px 15px;
      z-index: 1050;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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

    /* ===== Overlay when side menu is open ===== */
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
/* Content Area */
.content-area {
  padding: 20px;
  text-align: center;
}

/* Bottom Navbar */
.bottom-nav {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: #ffffff;
  border-top: 1px solid #ddd;
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 8px 0;
  box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
  z-index: 1000;
}

/* Nav Item */
.bottom-nav .nav-item {
  text-decoration: none;
  color: #777;
  font-size: 12px;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: all 0.3s ease;
}

.bottom-nav .nav-item i {
  font-size: 22px;
  margin-bottom: 3px;
  transition: color 0.3s ease;
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
  position: absolute; /* Take it out of the navbar flow */
  bottom: 20px; /* Raise above the navbar */
  left: 50%;
  transform: translateX(-50%); /* Center horizontally */
  text-align: center;
  text-decoration: none;
  color: #5bc2e7;
  display: flex;
  flex-direction: column;
  align-items: center;
  z-index: 1100; /* Keep it above other navbar items */
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

    </style>
</head>
<body>

  <!-- Main Content -->
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
        <li class="">
            <a href="#" class="active">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#" >
                <i class="bi bi-person"></i> Profile
            </a>
        </li>
        <li >
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


  <!-- ===== Overlay ===== -->
  <div class="overlay" id="overlay"></div>

  
                @yield('content')
    
 

  <!-- Bottom Navbar -->
  <nav class="bottom-nav">
    <a href="#" class="nav-item active">
      <i class="bi bi-speedometer2"></i>
      <span>Home</span>
    </a>
    <a href="#" class="nav-item">
      <i class="bi bi-cart"></i>
      <span>Cart</span>
    </a>
    <a href="#" class="nav-item qr-icon-up">
        <div class="icon-wrapper">
            <i class="bi bi-qr-code"></i>
        </div>
        <span>QR</span>
    </a>
    <a href="#" class="nav-item">
      <i class=""></i>
      <span style='color:white;'>QR</span>
    </a>
    <a href="#" class="nav-item">
      <i class="bi bi-clock-history"></i>
      <span>History</span>
    </a>
   
    <a href="#" class="nav-item">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </nav>
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

    @yield('js')
</body>
</html>