<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cook well</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
  </head>
  <body class="goto-here">
    @include('layouts.header')

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Our Recipes</span>
            <h2 class="mb-4">Publised By Community</h2>
            <p>Best recipes by own users</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				@foreach ($posts as $post)
				<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="/blog/{{ $post->id }}" class="img-prod"><img class="img-fluid" src="{{asset("img/products/$post->image")}}" alt="Colorlib Template">
    						
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="/blog/{{ $post->id }}">{{ $post->course->name}}</a></h3>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				@endforeach
    		</div>
    	</div>
    </section>
    @include('layouts.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('front/js/jquery.min.js')}}"></script>
  <script src="{{asset('front/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('front/js/popper.min.js')}}"></script>
  <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('front/js/aos.js')}}"></script>
  <script src="{{asset('front/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('front/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('front/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('front/js/google-map.js')}}"></script>
  <script src="{{asset('front/js/main.js')}}"></script>
    
  </body>
</html>