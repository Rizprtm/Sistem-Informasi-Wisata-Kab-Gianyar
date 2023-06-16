@extends('layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="/styles/blog_responsive.css">

<div class="super_container">
	
	

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="/images/blog_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">Destinasi</div>
		</div>
	</div>

	<!-- Blog -->
    
	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->

				<div class="col-lg-8">
					
					<div class="blog_post_container">

						<!-- Blog Post -->
					
						<div class="blog_post">
							<div class="blog_post_image">
								<img src="/assets/images/destinasi/{{ $destinasi->foto }}">
								
							</div>
							
							<div class="blog_post_title"><a href="">{{ $destinasi->judul }}</a></div>
									
									<li class="blog_post_meta_item"><a href="">{{ $destinasi->kategori->nama }}</a></li>
							
							<div class="blog_post_text">
								<p>{!! $destinasi->deskripsi !!}</p>
							</div>
					    	
						</div>

						

					</div>
						
					
				</div>

				<!-- Blog Sidebar -->

				@include('Blog.sidebar-blog')
			</div>
		</div>
	</div>


	
	@push('scripts')
	<script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="/plugins/parallax-js-master/parallax.min.js"></script>
	<script src="/js/blog_custom.js"></script>
	@endpush


@endsection

