<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>EaseCharge</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Customer/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Customer/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('Customer/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('Customer/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('Customer/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   @if(!session()->has('customerid'))
 <script>
   window.location.href = "{{ route('customerlogin')}}";
 </script>
@endif
   <body>
   
     <!-- header section start -->
<div class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href=""></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('Customer.customerhome') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('recharge.history') }}">Recharge History</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('complaint.create') }}">Complaints</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}">Logout</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
<!-- header section end -->

      
     
            @yield('content') <!-- This is where your form will be rendered -->
      <!-- footer section start -->
      <div class="footer_section">
         <div class="container">
            <div class="footer_sectio_2">
               
                  </div>
                  
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
         <p class="copyright_text">2024 All Rights Reserved. Designed and Developed by <a href="#">Sarath</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
       
      <script src="{{asset('Customer/js/jquery.min.js')}}"></script>
      <script src="{{asset('Customer/js/popper.min.js')}}"></script>
      <script src="{{asset('Customer/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('Customer/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('Customer/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('Customer/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('Customer/js/custom.js')}}"></script>
   </body>
</html>