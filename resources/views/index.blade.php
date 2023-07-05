@extends('layout')
@section('content')

<!-- Home -->

<div class="home">
		
	<!-- Home Slider -->

	<div class="home_slider_container">
		
		<div class="owl-carousel owl-theme home_slider">

			<!-- Slider Item -->
			<div class="owl-item home_slider_item">
				<!-- Image by https://unsplash.com/@anikindimitry -->
				<div class="home_slider_background" style="background-image:url(images/img1.jpg)"></div>

				<div class="home_slider_content text-center">
					<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
						<h1>Sistem Informasi Wisata</h1>
						<h1>Kabupaten Gianyar</h1>
						<div class="button home_slider_button"><div class="button_bcg"></div><a href="/destinasi">explore now<span></span><span></span><span></span></a></div>
					</div>
				</div>
			</div>

			<!-- Slider Item -->
			<div class="owl-item home_slider_item">
				<div class="home_slider_background" style="background-image:url(images/img2.jpg)"></div>

				<div class="home_slider_content text-center">
					<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
						<h1>discover</h1>
						<h1>Bali Island</h1>
						<div class="button home_slider_button"><div class="button_bcg"></div><a href="/destinasi">explore now<span></span><span></span><span></span></a></div>
					</div>
				</div>
			</div>

			<!-- Slider Item -->
			<div class="owl-item home_slider_item">
				<div class="home_slider_background" style="background-image:url(images/img3.jpg)"></div>

				<div class="home_slider_content text-center">
					<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
						<h1>discover</h1>
						<h1>Bali Island</h1>
						<div class="button home_slider_button"><div class="button_bcg"></div><a href="destinasi">explore now<span></span><span></span><span></span></a></div>
					</div>
				</div>
			</div>

		</div>
		
		<!-- Home Slider Nav - Prev -->
		<div class="home_slider_nav home_slider_prev">
			<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
				<defs>
					<linearGradient id='home_grad_prev'>
						<stop offset='0%' stop-color='#fa9e1b'/>
						<stop offset='100%' stop-color='#8d4fff'/>
					</linearGradient>
				</defs>
				<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z"/>
				<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
				11.042,18.219 "/>
			</svg>
		</div>
		
		<!-- Home Slider Nav - Next -->
		<div class="home_slider_nav home_slider_next">
			<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
				<defs>
					<linearGradient id='home_grad_next'>
						<stop offset='0%' stop-color='#fa9e1b'/>
						<stop offset='100%' stop-color='#8d4fff'/>
					</linearGradient>
				</defs>
			<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
			M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
			C22.545,2,26,5.541,26,9.909V23.091z"/>
			<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
			17.046,15.554 "/>
			</svg>
		</div>

		<!-- Home Slider Dots -->

		<div class="home_slider_dots">
			<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
				<li class="home_slider_custom_dot active"><div></div>01.</li>
				<li class="home_slider_custom_dot"><div></div>02.</li>
				<li class="home_slider_custom_dot"><div></div>03.</li>
			</ul>
		</div>
		
	</div>

</div>

<!-- Search -->



<!-- Intro -->

<div class="intro">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="intro_title text-center">We have the best Destination</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="intro_text text-center">
					<p>gianyargo.id adalah Portal Informasi Pariwisata Daerah Istimewa Gianyar</p>
				</div>
			</div>
		</div>
		
		<div class="row intro_items">

			<!-- Intro Item -->

			@yield('konten')
			

		</div>
		<div class="row intro_items">

			<!-- Intro Item -->
			@foreach ($destinasi as $d)
			<div class="col-lg-4 intro_col">
				<div class="intro_item">
					<div class="intro_item_overlay"></div>
					<a href="{{ route('main.destinasi.detail', $d->slug) }}"><div class="intro_item_background" style="background-image:url(/assets/images/destinasi/{{ $d->foto }})"></div></a>
					<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
						<div class="intro_date">{{ $d->judul }}</div>
						<div class="button intro_button"><div class="button_bcg"></div><a href="{{ route('main.destinasi.detail', $d->slug) }}">see more<span></span><span></span><span></span></a></div>
						<div class="intro_center text-center">
							<h1>{{ $d->kategori->nama }}</h1>
							<div class="intro_price">{{ $d->created_at->format('j-F-Y') }}</div>
							
						</div>
					</div>
				</div>
			</div>
			@endforeach
			

		</div>
		<div class="row intro_items">

			
		</div>
	</div>
</div>

<!-- CTA -->

<div class="cta">
	<!-- Image by https://unsplash.com/@thanni -->
	<div class="cta_background" style="background-image:url(images/cta.jpg)"></div>
	
	<div class="container">
		<div class="col">
			<h2 class="intro_title text-center">Review Pengguna</h2>
		</div>
		<div class="row">
			
			<div class="col">

				<!-- CTA Slider -->

				<div class="cta_slider_container">
					<div class="owl-carousel owl-theme cta_slider">
					@foreach ($review as $r)
						<!-- CTA Slider Item -->
						<div class="owl-item cta_item text-center">
							<div class="cta_title">{{ $r->nama }}</div>
							<p class="offers_text" style="font-weight:bold;">{{ $r->email }}</p>
							<p class="cta_text">{{ $r->subject }} </p>
							<p class="cta_text">{{ $r->komentar }} </p>
							<div class="button cta_button"></div>
						</div>
					@endforeach

						
					</div>

					<!-- CTA Slider Nav - Prev -->
					<div class="cta_slider_nav cta_slider_prev">
						<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
							<defs>
								<linearGradient id='cta_grad_prev'>
									<stop offset='0%' stop-color='#fa9e1b'/>
									<stop offset='100%' stop-color='#8d4fff'/>
								</linearGradient>
							</defs>
							<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z"/>
							<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
							11.042,18.219 "/>
						</svg>
					</div>
					
					<!-- CTA Slider Nav - Next -->
					<div class="cta_slider_nav cta_slider_next">
						<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
							<defs>
								<linearGradient id='cta_grad_next'>
									<stop offset='0%' stop-color='#fa9e1b'/>
									<stop offset='100%' stop-color='#8d4fff'/>
								</linearGradient>
							</defs>
						<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
						M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
						C22.545,2,26,5.541,26,9.909V23.091z"/>
						<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
						17.046,15.554 "/>
						</svg>
					</div>

				</div>

			</div>
		</div>
	</div>
				
</div>

<!-- Offers -->

<div class="offers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h2 class="section_title">the hot news</h2>
			</div>
			<div></div>
		</div>
		<div class="row offers_items">
			@foreach ($berita as $b)
			<!-- Offers Item -->
			<div class="col-lg-6 offers_col">
				<div class="offers_item">
					<div class="row">
						<div class="col-lg-6">
							<div class="offers_image_container">
								
								<div class="offers_image_background" style="background-image:url(/assets/images/berita/{{ $b->foto }})"></div>
								<div class="offer_name"><a href="{{ route('main.berita.detail', $b->slug) }}">{{ $b->kategori->nama }}</a></div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="offers_content">
								<div class="offers_price"><span>{{ $b->created_at->format('j-F-Y') }}</span></div>
								
								<p class="offers_text" style="font-weight:bold;">{{ $b->judul }}</p>
								
								<div class="offers_link"><a href="{{ route('main.berita.detail', $b->slug) }}">read more</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			

		</div>
	</div>
</div>

@endsection
