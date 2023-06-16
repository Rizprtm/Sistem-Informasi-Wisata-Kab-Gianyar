@extends('layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
    <link href="/assets/front/vendor/animate.css/animate.min.css" rel="stylesheet">
<section id="review" class="review">       
    <div class="super_container">
        
 	<!-- Home -->

     <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/contact_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">Review</div>
		</div>
	</div>
	

	<!-- Contact -->

	<div class="contact_form_section">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Contact Form -->
					<div class="contact_form_container">
						<div class="contact_title text-center">Review</div>
						<form method="POST" action="{{ route('store.review') }}" id="contact_form" class="contact_form text-center">
							@csrf
							<input type="text" name="nama" id="contact_form_name" class="contact_form_name input_field" placeholder="Name" required="required" data-error="Name is required.">
							<input type="email" name="email" id="contact_form_email" class="contact_form_email input_field" placeholder="E-mail" required="required" data-error="Email is required.">
							<input type="text" name="subject" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Subject" required="required" data-error="Subject is required.">
							<textarea name="komentar" id="contact_form_message" class="text_field contact_form_message"  rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							<button type="submit" name="submit" id="form_submit_button" class="form_submit_button button trans_200">send message<span></span><span></span><span></span></button>
						</form>
					</div>
	
				</div>
			</div>
		</div>
	</div>

	<!-- About -->
	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					
					<!-- About - Image -->

					

				</div>

				

			</div>
		</div>
	</div>

	<!-- Google Map -->
		
	<div class="travelix_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>       



</section>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="js/blog_custom.js"></script>

@push('scripts')
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });
</script>
@endpush   
    


@endsection

