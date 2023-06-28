<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('Admin/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('Admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('Admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('Admin/css/mdb.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Admin/css/jquery-ui.css') }}">
  
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('Admin/vendors/ti-icons/css/themify-icons.css') }}"> 
  <link rel="stylesheet" type="Admin/text/css" href="{{ asset('Admin/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('Admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Admin/images/favicon.png') }}" /> 
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>>

</head>

<body>
  {{-- <div id="preloader" style="background: #fff url('/assets/images/website/{{$infoumum->preloader}}') no-repeat center;'"> --}}
  </div>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-3" href="index.html"><img src="{{ asset('/images/gyr3.png') }}" class="mr-2" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/gyr3.png" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-bell mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="ti-info-alt mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Application Error</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="ti-settings mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="ti-user mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">New user registration</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="images/faces/face28.jpg" alt="profile"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="ti-settings text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      

      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
            
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ Request::is('/dashboard') ? 'active':''}}" >
      <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="Admin/pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="Admin/pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="Admin/pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li> --}}
    <li class="nav-item" >
      <a class="nav-link {{ Request::is('/dashboard/berita') ? '':'collapsed'}}" data-toggle="collapse" href="#tables"  aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Berita</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ Request::is('/dashboard/berita') ? 'show':''}}" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.berita') }}">Berita</a></li>
          <li class="nav-item "> <a class="nav-link" href="{{ route('dashboard.kategoriberita') }}">Kategori</a></li>
        </ul>
      </div>
      
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/destinasi') ? '':'collapsed'}}" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Destinasi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ Request::is('/dashboard/destinasi') ? 'show':''}}" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/dashboard/destinasi">Destinasi</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.kategoridestinasi') }}">Kategori</a></li>
          
        </ul>
      </div>
      
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('/user') ? '':'collapsed'}}" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Pengguna</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ Request::is('/user') ? 'show':''}}" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/login/logout"> Logout </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="Admin/pages/documentation/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Log Aktifitas</span>
      </a>
    </li>
  </ul>
</nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            {{-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. PBL<a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> --}}
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Rizky Pratama</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('Admin/vendors/js/vendor.bundle.base.js') }}"></script>
 
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('Admin/vendors/chart.js/Chart.min.js') }}"></script> 
  <script src="{{ asset('Admin/vendors/datatables.net/jquery.dataTables.js') }}"></script> 
  <script src="{{ asset('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> 
  <script src="{{ asset('Admin/js/dataTables.select.min.js') }}"></script> 

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('Admin/js/off-canvas.js') }}"></script> 
  <script src="{{ asset('Admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('Admin/js/template.js') }}"></script>  
  <script src="{{ asset('Admin/js/settings.js') }}"></script> 
  <script src="{{ asset('Admin/js/todolist.js') }}"></script> 
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('Admin/js/dashboard.js') }}"></script>
  <script src="{{ asset('Admin/js/Chart.roundedBarCharts.js') }}"></script>
  <script src="{{ asset('Admin/js/new.js') }}"></script>  


  <script src="{{ asset('summernote/summernote.min.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <!-- End custom js for this page-->

  <script>
    $('#modal').on('hidden.bs.modal', function () {
        $('#modal-title').empty();
        $('#modal-body').empty();
    });
  </script>
  <script>
    $('#summernote').summernote({
        toolbar: [
            ['style', ['fontname','bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert',['picture','video','link','table','hr']],
            ['height', ['height']],
        ],
        height: 250
    });
</script>
@stack('scripts')
</body>

</html>

