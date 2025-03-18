@extends('Layouts.CustomerMaster')
@section('content')

<!-- banner section start -->
<div class="banner_section">
   <div class="container">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <!-- Dashboard Banner Slide -->
            <div class="carousel-item active">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12 text-center">
                        <!-- Updated Title and Description -->
                        <h1 class="banner_taital">Customer Dashboard</h1>
                        <p class="banner_text">
                           Access all your recharge details, manage complaints, and explore packages seamlessly.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- banner section end -->

<!-- Current Package and Expiry Information Start -->
@if($expiryMessage)
<marquee><div  style="margin: 20px 0; padding: 15px;  background-color: #e8f4fd; color: #1a73e8; font-size: 1.1em;">
   {{ $expiryMessage }} &nbsp  &nbsp   &nbsp {{ $expiryMessage }}  &nbsp   &nbsp  &nbsp {{ $expiryMessage }} &nbsp   &nbsp   &nbsp {{ $expiryMessage }} 
</div>
</marquee>
@endif
<!-- Current Package and Expiry Information End -->

<!-- service section start -->
<div class="service_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="service_taital">Our Packages</h1>
         </div>
      </div>
      <div class="service_section_2">
         <div class="row">
            @foreach($packages as $package)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
               <div class="service_box text-center p-3">
                  <h4 class="residential_text">{{ $package->packagename }}</h4>
                  <p class="service_text">Price: ₹{{ $package->amount }}</p>
                  <p class="service_text">Duration: {{ $package->days }} days</p>
                  <p class="service_text">{{ $package->description }}</p>
                  <div style="margin: 10px 0;">
                     <a class="read_bt" href="{{ route('packages.viewchannels', $package->packageid) }}" style="background-color: #FFA500; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">View Channels</a>
                  </div>
                  <div style="margin-top: 15px;">
                     <div class="read_bt">
                        <a href="{{ route('recharge.create',['packageid'=>$package->packageid])}}" class="btn btn-primary">Recharge Now</a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>

            <!-- <div class="col-md-6 padding_right0">
   <div class="map_main">
      <div class="map-responsive">
         <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Thodupuzha" 
                 width="600" height="470" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
      </div>
   </div>
</div> -->
         </div>
      </div>
   </div>
</div>
<!-- contact section end -->
<!-- service section end -->

@endsection
