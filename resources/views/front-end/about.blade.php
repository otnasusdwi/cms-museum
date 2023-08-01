@extends('../layouts.front')
@section('content')

<!-- start banner Area -->
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					About Us				
				</h1>	
				<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start service Area -->
{{-- <section class="service-area pt-100" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="single-service">
					<span class="lnr lnr-clock"></span>
					<h4>Openning Hours</h4>
					<p>
						Mon - Fri: 10.00am to 05.00pm
						Sat: 12.00pm to 03.00 pm
						Sunday Closed
					</p>
					<div class="overlay">
						<div class="text">
							<p>
								Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features.that we use in life
							</p>
							<a href="#" class="text-uppercase primary-btn">Buy ticket</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-service">
					<span class="lnr lnr-rocket"></span>
					<h4>Ongoing Exhibitions</h4>
					<p>
						Mon - Fri: 10.00am to 05.00pm
						Sat: 12.00pm to 03.00 pm
						Sunday Closed
					</p>
					<div class="overlay">
						<div class="text">
							<p>
								Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features.that we use in life
							</p>
							<a href="#" class="text-uppercase primary-btn">Buy ticket</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-service">
					<span class="lnr lnr-briefcase"></span>
					<h4>Openning Events</h4>
					<p>
						Mon - Fri: 10.00am to 05.00pm
						Sat: 12.00pm to 03.00 pm
						Sunday Closed
					</p>
					<div class="overlay">
						<div class="text">
							<p>
								Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features that we use in life Here, I focus on a range of items and features.that we use in life
							</p>
							<a href="#" class="text-uppercase primary-btn">Buy ticket</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<!-- End service Area -->


<!-- Start quote Area -->
<section class="quote-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 quote-left">
				<h1>
					<span>VISI</span>
					<br>
					MISI
				</h1>
			</div>
			<div class="col-lg-6 quote-right">
				<p>
					{{ $data->visimisi }}
				</p>
			</div>
		</div>
	</div>
</section>
<!-- End quote Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Profile</h1>
					<p>{{ $data->profile }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End blog Area -->

@endsection