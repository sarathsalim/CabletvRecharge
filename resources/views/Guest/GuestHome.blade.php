@extends('Layouts.GuestMaster')
@section('content')
<!-- header section end -->
<div class="banner_section">
   <div class="container">
      <div id="main_slider" class="carousel slide" data-ride="carousel" data-interval="3000">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1 class="banner_taital">EaseCharge</h1>
                        <p class="banner_text">Recharge your DTH plans quickly and securely with EaseCharge. Enjoy hassle-free recharges and stay connected to your favorite channels.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1 class="banner_taital">EaseCharge</h1>
                        <p class="banner_text">Simplify your DTH recharges with instant payments. Keep track of your subscriptions and never miss a renewal again.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1 class="banner_taital">EaseCharge</h1>
                        <p class="banner_text">EaseCharge provides a user-friendly interface for all your DTH recharge needs. Experience the fastest and easiest way to recharge!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- banner section end -->
<div class="news-marquee" style="background-color: #f9b116; padding: 10px;">
    <marquee behavior="scroll" direction="left" scrollamount="5">
        <strong>Exciting News! Recharge your DTH package now and get the best plans at the lowest prices available! Hurry, limited time offer!</strong>
    </marquee>
</div>

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
            @foreach( $packages as $package)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
               <div class="service_box text-center p-3">
                  <h4 class="residential_text">{{ $package->packagename }}</h4>
                  <p class="service_text">Price: ₹{{ $package->amount }}</p>
                  <p class="service_text">Duration: {{ $package->days }} days</p>
                  <p class="service_text">{{ $package->description }}</p>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>


      <!-- service section end -->
      <!-- about section start -->
      <div  id="about" class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="about_taital">EaseCharge - Your DTH Recharge Partner</h1>
            </div>
        </div>
    </div>
</div>
<div class="about_section_2 layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_taital_main">
                    <p class="lorem_text" style="text-align: justify;">EaseCharge is designed to provide an effortless and secure platform for all your DTH recharge needs. We aim to make your recharge experience as seamless and straightforward as possible. With a range of affordable recharge packages and a user-friendly interface, EaseCharge is your trusted partner for all your DTH needs. Our platform is committed to offering flexibility and convenience, ensuring you never miss your favorite channels. Whether you're recharging for a single day or choosing a long-term package, EaseCharge offers a variety of options to suit your preferences and budget.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about_img"><img src="{{asset('Guest/images/dth.webp')}}"></div>
            </div>
        </div>
    </div>
</div>


      <!-- about section end -->
      
      <!-- shop section start -->
<div class="shop_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="shop_taital text-center" style="font-size: 36px; font-weight: bold;">Do you need help with <span style="color: #f9b116;">channel recharging?</span></h1>
            <p class="shop_text text-center" style="font-size: 18px; color: #555;">We provide a simple step-by-step guide to help you recharge your channels quickly and efficiently.</p>
            <div class="text-center mt-4">
               <a href="#" id="help_button" class="btn btn-warning" style="padding: 12px 25px; font-size: 16px; border-radius: 30px;">Get Help</a>
            </div>
         </div>
      </div>
      <!-- Recharge Steps (Initially Hidden) -->
      <div id="recharge_steps" style="display: none; margin-top: 30px; background-color: #fff3cd; padding: 25px; border: 1px solid #ffeeba; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
         <h3 style="color: #856404; font-size: 24px; font-weight: bold;">Steps for Recharging:</h3>
         <ol style="color: #6c757d; font-size: 16px; line-height: 1.8;">
            <li>Login to your EaseCharge account.</li>
            <li>Select the channel or package you want to recharge.</li>
            <li>Enter your smartcard number or registered details.</li>
            <li>Choose your preferred payment method.</li>
            <li>Click on "Recharge Now" and complete the payment.</li>
            <li>Enjoy uninterrupted access to your favorite channels!</li>
         </ol>
      </div>
   </div>
</div>
<!-- shop section end -->

<!-- JavaScript for Showing Recharge Steps -->
<script>
   document.getElementById('help_button').addEventListener('click', function (event) {
      event.preventDefault();
      var stepsDiv = document.getElementById('recharge_steps');
      if (stepsDiv.style.display === "none" || stepsDiv.style.display === "") {
         stepsDiv.style.display = "block";
      } else {
         stepsDiv.style.display = "none";
      }
   });
</script>


     <!-- contact section start -->
<div  id="contact" class="contact_section layout_padding">
    <div class="container-fluid">
        <div class="contact_section_2">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="contact_taital">Get In Touch</h1>

                    <!-- Success message display -->
                    @if (session('success'))
                        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mail_section_1">
                            <input type="text" class="mail_text" placeholder="Name" name="name" required>
                            <input type="text" class="mail_text" placeholder="Phone Number" name="phone_number" required> 
                            <input type="email" class="mail_text" placeholder="Email" name="email" required>
                            <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message" required></textarea>
                            <div class="send_bt">
    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; border: none;">SEND</button>
</div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 padding_right0">
                    <div class="map_main">
                        <div class="map-responsive">
                            <!-- Google Maps iframe with Thodupuzha location -->
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Thodupuzha, Kerala, India" width="600" height="470" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact section end -->

      @endsection