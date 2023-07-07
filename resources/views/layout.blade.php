<!DOCTYPE html>
<html lang="en">
<head>
<title>Gianyar</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
<link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="/Admin/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" type="text/css" href="/Admin/css/mdb.min.css">
<style>
	.pageTitleEveryPage{
		padding: 50px;
			padding-top: 50px;
		padding-top: 100px;
	}
	.loader {
		width: 100%;
		height: 100%;
		position: fixed;
		padding-top: 19%;
		background: rgb(174, 13, 16);
		padding-left: 48%;
		margin: auto;
		z-index: 99999;
	}
</style>
	
</head>

<body>
	<div class="loader">
		<img src="/loader/svg-loaders/bars.svg"/>
	</div>

<div class="super_container">
	
	<!-- Header -->

	

	<header class="header">

		<!-- Top Bar -->
	
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="phone">+45 345 3324 56789</div>
						<div class="social">
							<ul class="social_list">
								<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="user_box ml-auto">
							
							
						</div>
					</div>
				</div>
			</div>		
		</div>
	
		<!-- Main Navigation -->
	
		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="images/gyr3.png" alt=""></a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="/">home</a></li>
								<li class="main_nav_item"><a href="/destinasi">destinasi</a></li>
								<li class="main_nav_item"><a href="/berita">berita</a></li>
								<li class="main_nav_item"><a href="/review">review</a></li>
								<li class="main_nav_item"><a href="/login">|  login</a></li>
								
							</ul>
						</div>
						
	
						<form id="search_form" class="search_form bez_1">
							<input type="search" class="search_content_input bez_1">
						</form>
						
						<div class="hamburger">
							<i class="fa fa-bars trans_200"></i>
						</div>
					</div>
				</div>
			</div>	
		</nav>
	
	</header>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="/">home</a></li>
				<li class="menu_item"><a href="/destinasi">destinasi</a></li>
				<li class="menu_item"><a href="/berita">berita</a></li>
				<li class="menu_item"><a href="/review">review</a></li>
				<li class="main_nav_item"><a href="/login">|  login</a></li>
				
			</ul>
		</div>
	</div>

    <!-- Isi -->
	@yield('content')
	@yield('konten')

	<!-- Footer -->

	
<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- Footer Column -->
            <div class="col-lg-3 footer_column">
                <div class="footer_col">
                    <div class="footer_content footer_about">
                        <div class="logo_container footer_logo">
                            <div class="logo"><a href="#"><img src="images/logo.png" alt="">Gianyar</a></div>
                        </div>
                        <p class="footer_about_text">Gianyar (Bali: aksara Bali: ᬕ᭄ᬬᬜᬃ, translit. Gyanyar) adalah sebuah wilayah kabupaten yang terletak di Provinsi Bali, Indonesia. Ibu kotanya adalah Kecamatan Gianyar. Daerah ini merupakan pusat budaya ukiran di Bali.</p>
                        <ul class="footer_social_list">
                            <li class="footer_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li class="footer_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-3 footer_column">
                <div class="footer_col">
                    <div class="footer_title">blog posts</div>
                    <div class="footer_content footer_blog">
                        
                        <!-- Footer blog item -->
                        <div class="footer_blog_item clearfix">
                            <div class="footer_blog_image"><img src="images/footer_blog_1.jpg" alt="https://unsplash.com/@avidenov"></div>
                            <div class="footer_blog_content">
                                <div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
                                <div class="footer_blog_date">Nov 29, 2017</div>
                            </div>
                        </div>
                        
                        <!-- Footer blog item -->
                        <div class="footer_blog_item clearfix">
                            <div class="footer_blog_image"><img src="images/footer_blog_2.jpg" alt="https://unsplash.com/@deannaritchie"></div>
                            <div class="footer_blog_content">
                                <div class="footer_blog_title"><a href="blog.html">New destinations for you</a></div>
                                <div class="footer_blog_date">Nov 29, 2017</div>
                            </div>
                        </div>

                        <!-- Footer blog item -->
                        <div class="footer_blog_item clearfix">
                            <div class="footer_blog_image"><img src="images/footer_blog_3.jpg" alt="https://unsplash.com/@bergeryap87"></div>
                            <div class="footer_blog_content">
                                <div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
                                <div class="footer_blog_date">Nov 29, 2017</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-3 footer_column">
                <div class="footer_col">
                    <div class="footer_title">tags</div>
                    <div class="footer_content footer_tags">
                        <ul class="tags_list clearfix">
                            <li class="tag_item"><a href="#">design</a></li>
                            <li class="tag_item"><a href="#">fashion</a></li>
                            <li class="tag_item"><a href="#">music</a></li>
                            <li class="tag_item"><a href="#">video</a></li>
                            <li class="tag_item"><a href="#">party</a></li>
                            <li class="tag_item"><a href="#">photography</a></li>
                            <li class="tag_item"><a href="#">adventure</a></li>
                            <li class="tag_item"><a href="#">travel</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Column -->
            <div class="col-lg-3 footer_column">
                <div class="footer_col">
                    <div class="footer_title">contact info</div>
                    <div class="footer_content footer_contact">
                        <ul class="contact_info_list">
                            <li class="contact_info_item d-flex flex-row">
                                <div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
                                <div class="contact_info_text">Cendrawasih Street Kelod Kauh Beng</div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
                                <div class="contact_info_text">+62 895410962726</div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
                                <div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">pratamarizky258@gmail.com</a></div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
                                <div class="contact_info_text"><a href="https://colorlib.com">gianyaradventure.com</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>


	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
				<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="/">home</a></li>
								<li class="footer_nav_item"><a href="about.html">about us</a></li>
								<li class="footer_nav_item"><a href="offers.html">offers</a></li>
								<li class="footer_nav_item"><a href="Blog">news</a></li>
								<li class="footer_nav_item"><a href="contact.html">contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>

@stack('scripts')

<script>
	$(function(){
		setTimeout(() => {
			$(".loader").fadeOut(300);
		},1500)
	})
</script>

</body>

</html>