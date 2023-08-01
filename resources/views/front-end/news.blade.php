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
					<h1 class="mb-10">Berita</h1>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> --}}
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($data as $row)
			<div class="col-lg-3 col-md-6 single-blog">
				<div class="thumb">
					<img class="img-fluid" src="/foto/news/{{ $row->photo }}">
				</div>
				<p class="date" style="width: 70%;">{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y') }}</p>
				<a href="{{ url('news/detail', $row->id) }}"><h4>{{ $row->judul }}</h4></a>
				<p>
					{{ \Illuminate\Support\Str::limit($row->keterangan, 50, $end='...') }}
				</p>
				<a href="{{ url('news/detail', $row->id) }}"><h6>Baca Selengkapnya</h6></a>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- End blog Area -->
@endsection