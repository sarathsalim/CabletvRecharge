<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('Admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/vendors/css/vendor.bundle.base.css')}}">
      <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('Admin/css/vertical-layout-light/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('Admin/images/favicon.png')}}"/>
  </head>
  @if(!session()->has('loginid'))
 <script>
   window.location.href = "{{ route('AdminLogin')}}";
 </script>
@endif
  <body>
    <div class="row" id="proBanner">
      <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <a href="{{route('adminlogout')}}" target="_blank" class="btn download-button purchase-button ml-auto">Logout</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div>
    </div>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="#">
              
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="#">
                
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="#">
                
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex  mr-2">
              <a class="nav-link" href="#">
                
              </a>
            </li>
            <li class="nav-item dropdown d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-message-typing"></i>
                <span class="count bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header"></p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                  <img src="{{asset('Admin/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                     
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                  <img src="{{asset('Admin/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                    
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                  <img src="{{asset('Admin/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"> 
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell mr-0"></i>
                <span class="count bg-danger">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header"></p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-info-large mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal"></h6>
                    <p class="font-weight-light small-text mb-0">
                     
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-cog mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal"></h6>
                    <p class="font-weight-light small-text mb-0">
                    
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="typcn typcn-user-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal"></h6>
                    <p class="font-weight-light small-text mb-0">
                
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                <i class="typcn typcn-cog text-primary"></i>
                
                </a>
                <a class="dropdown-item">
                <i class="typcn typcn-power text-primary"></i>
                
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <!-- <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div> -->
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading"></p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
             
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
             
            </div>
            <p class="settings-heading mt-2"></p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  Admin
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
           
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adminhome')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard <span class="badge badge-primary ml-3">New</span></span>
            </a>
          </li>
          <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#channels-menu" aria-expanded="false" aria-controls="channels-menu">
    <i class="typcn typcn-film menu-icon"></i>
    <span class="menu-title">Channels</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="channels-menu">
    <ul class="nav flex-column sub-menu">
    <li class="nav-item">
  <a class="nav-link" href="{{ route('addchannel') }}">Channel Insert</a>
</li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#packages-menu" aria-expanded="false" aria-controls="packages-menu">
    <i class="typcn typcn-briefcase menu-icon"></i>
    <span class="menu-title">Package</span>
    <i class="typcn typcn-chevron-right menu-arrow"></i>
  </a>
  <div class="collapse" id="packages-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{route('packages.insert')}}">Insert</a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('packages.index')}}">View Packages</a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('packagechannel_create')}}">Assign Channels</a></li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#recharges-menu" aria-expanded="false" aria-controls="recharges-menu">
    <i class="typcn typcn-film menu-icon"></i>
    <span class="menu-title">Recharges</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="recharges-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{route('Admin.rechargeview')}}">View Recharges</a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('Admin.rechargesearch')}}">Search Recharges</a></li>
    </ul>
  </div>
</li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Payments</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('payments.view')}}"> payment view </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Complaints and Enquiry </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('complaints.view')}}"> complaints</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('contacts.view')}}"> Enquiries</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
        <i class="typcn typcn-chart-line menu-icon"></i>
        <span class="menu-title">Reports</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="reports">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('packageCustomerReport') }}">Package Count</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dateRangeReport') }}">Date Range Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('revenueReport') }}">Revenue Report</a>
            </li>
        </ul>
    </div>
</li>


          
      </nav>
         <!-- partial -->
         <div class="main-panel">
          <div class="content-wrapper">
            @yield('content') <!-- This is where your form will be rendered -->
          </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('Admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('Admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('Admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('Admin/js/template.js')}}"></script>
    <script src="{{asset('Admin/js/settings.js')}}"></script>
    <script src="{{asset('Admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('Admin/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>