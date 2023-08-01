@extends('../layouts.front')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<div class="banner-content col-lg-8">
				<h6 class="text-white">Berita Terakhir</h6>
				<h1 class="text-white">
					{{ $news[0]->judul }}
				</h1>
				<p class="pt-20 pb-20 text-white">
					{{ \Illuminate\Support\Str::limit($news[0]->keterangan, 200, $end='...') }}
				</p>
				<a href="{{ url('news/detail', $news[0]->id) }}" class="primary-btn text-uppercase">BACA</a>
				
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
					<h1 class="mb-10">Berita Terakhir</h1>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> --}}
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($news as $row)
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

<!-- Start gallery Area -->
<section class="gallery-area section-gap" id="gallery">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10 text-white">Gallery</h1>
					{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> --}}
				</div>
			</div>
		</div>
		<div id="grid-container" class="row">
			@foreach ($data as $row)
			<a class="single-gallery" href="/foto/gallery/{{ $row->photo }}"><img class="grid-item" src="/foto/gallery/{{ $row->photo }}"></a>
			@endforeach
		</div>
	</div>
</section>
<!-- End gallery Area -->
@endsection


