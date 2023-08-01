@extends('../layouts.front')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">    
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Berita               
				</h1>   
				<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-single.html"> Berita</a></p>
			</div>                                          
		</div>
	</div>
</section>
<!-- End banner Area -->   
<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">{{ $data->judul }}</h1>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> --}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="single-post">
				{{-- <img class="img-fluid text-center" src="/foto/news/{{ $data->photo }}" style="width: 150px;"> --}}
				<img src="/foto/news/{{ $data->photo }}" alt="" width="120" style="float: left; margin-right: 10px; width: 200px;">
				<p style="text-align: justify;">
					{{ $data->keterangan }}
				</p>
			</div>
		</div>
	</div>
</section>
<!-- End blog Area -->
@endsection