@extends('layouts.front')

@section('content')
<style>

</style>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bowlingtours__style-css-contact.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact-responsive.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<div class="notIndexContainer" style="padding: 10px;">
<div class="banner_inner ni-img">
<div class="about_caption">
<h1>Contact Us (Call / Email)</h1>
</div>
<div class="static_banner"><img src=""></div>
</div>
<div class="body_container">
	 @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
<div class="location_add">
<div class="location_add_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/add-pic.png">
<h4>Address</h4>
<p>Sir Henry Darvill House, 8-10 William Street, <br> Windsor, Berkshire, England, SL4 1BA</p>
</div>
<div class="location_add_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/msg-pic.png">
<h4>Email Address</h4>

<p><a href="mailto:groups@bowlingtours.co.uk">groups@bowlingtours.co.uk</a> <br>
</p>
</div>
<div class="location_add_left location_add_left_child"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/mobile-pic.png">
<h4>Contact Information</h4>
<p>Phone: <a href="tel:+4401753863408">+44 (0) 1753 836600</a> <br>Fax: N/A</p>
</div>
<div class="clr"></div>
</div>
<div class="contact_left" style="width: 100%;margin-top: 40px;">


<p><iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2484.762536906828!2d-0.6126467842310025!3d51.48087292963075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSir+Henry+Darvill+House%2C+8-10+William+St%2C+Windsor+SL4+1BA!5e0!3m2!1sen!2sin!4v1533962834076" style="border:0" allowfullscreen="" width="100%" height="540" frameborder="0"></iframe></p>



<div class="clr"></div>
<a href="https://www.facebook.com/BowlingTours" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/facebook2.png"></a>
<!-- <a href="https://www.twitter.com" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/twitter2.png"></a>
<a href="https://www.linkedin.com" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/in2.png"></a>
<a href="https://www.plus.google.com" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/google2.png"></a> -->
<a href="https://www.instagram.com/bowlingtours/" target="_blank"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/instagram2.png"></a>
</div>
<br>
<br>
<div class="clr"></div>

<div class="contact_right" style="margin-top: 35px;">
</div>
<div class="clr"></div>

<style type="text/css">
/*h2 {
	font-family: Arial, Verdana;
	font-weight: 800;
	font-size: 2.5rem;
	color: #091f2f;
	text-transform: uppercase;
}*/

div.error{
	text-align: left !important;
}
.panel-group .panel {
    padding: 6px 6px 6px 6px;
}
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #ffffff;
    padding: 0;
    height: auto;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 3rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    /*margin-top: -18px;*/
    line-height: 15px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
.error {
  color: red;
  font-size: 0.9em;
  margin-top: 4px;
}
.success {
  color: green;
  text-align: center;
  margin-top: 15px;
}
</style>
<div class="contact_left">
	
<div class="wpcf7 js" id="wpcf7-f400-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"> <ul></ul></div>
<form action="{{route('send-mail')}}" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" id="contactForm" data-status="init">
@csrf

</div>
<h4>Send us a message
</h4>
<p>If you haven't found what you're looking for on the website please send us a message below and we will find the right solution for you.
</p>
    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
<span class="wpcf7-form-control-wrap" data-name="fullname">
	<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required contact_right_inpt" aria-required="true" re aria-invalid="false" placeholder="Full name*" value="" type="text" name="fullname" id="fullName" fdprocessedid="nuau0g" required>
	<div class="error" id="nameError"></div>
</span><br>
<span class="wpcf7-form-control-wrap" data-name="email-385">
	<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email contact_right_inpt" aria-required="true" aria-invalid="false" placeholder="Email address*" value="" type="email" name="email" id="email" fdprocessedid="z3il4" required>
	<div class="error" id="emailError"></div>
</span><br>
<span class="wpcf7-form-control-wrap" data-name="phonenumber">
	<input size="40" class="wpcf7-form-control wpcf7-text contact_right_inpt" aria-invalid="false" placeholder="Phone number" value="" type="text" name="phone" id="phone" fdprocessedid="qa6lud" required>
	<div class="error" id="phoneError"></div>
</span><br>
<span class="wpcf7-form-control-wrap" data-name="textarea-733">
	<textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required contact_right_textarea" aria-required="true" aria-invalid="false" placeholder="Message" id="message"  name="message" required></textarea>
	<div class="error" id="messageError"></div>
</span><br>


<div class="captch_btn_right">

	<h5><br>
		<input type="hidden" name="recaptcha_token" id="recaptcha_token">
<input name="newsletter" value="" class="captch_btn_right_chq" type="checkbox" style="margin:0px!important"> Subscribe to our newsletter
	</h5>
	<p><input class="wpcf7-form-control has-spinner wpcf7-submit contact_right_btn" type="submit" value="Send Message" fdprocessedid="8nlhyq" id="send_mail"><span class="wpcf7-spinner"></span>
	</p>
</div>
<div class="clr">
</div><div class="wpcf7-response-output" aria-hidden="true"></div>
</form>
</div>
</div>
<div class="contact_right">
	<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
	  	<div class="container_" style="padding-right: 5%;padding-left: 5%;">

		  <h4 style="color: #6ac0ec;text-align: center;">Frequently Asked Questions </h4>

		  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  						<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading0">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						What’s included in the cost of a bowls tour?					  </a>
					</h3>
				  </div>
				  <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
					<div class="panel-body px-3 mb-4">
					  <p>It includes hotel accommodation (Dinner, Bed and Breakfast), fixtures with rink fees,<br>
 refreshments for bowlers &amp; non-bowlers, and return coach transfers within the destination that the group visits. </p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading1">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						Can I visit the hotel before I make the decision to book a tour?					  </a>
					</h3>
				  </div>
				  <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
					<div class="panel-body px-3 mb-4">
					  <p>Contact us to arrange a ‘Familiarisation Visit’, providing you with an opportunity to<br>
 experience the hotel's quality.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading2">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						How much is my deposit and when do I have to pay it?					  </a>
					</h3>
				  </div>
				  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
					<div class="panel-body px-3 mb-4">
					  <p>Regardless of group size, a £500 non-refundable deposit (which is later deducted in the final<br>
 invoice), covering the entire group is required. Deposit is generally requested 3 months post<br>
 booking but can be negotiated if required.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading3">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						Will my price change after I have booked my tour?					  </a>
					</h3>
				  </div>
				  <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
					<div class="panel-body px-3 mb-4">
					  <p>The final price remains unchanged unless you add extras such as lunches, upgraded rooms, extra fixtures or local attractions. </p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading4">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						I have mobility and dietary requests – should I contact the hotel to help me with these?					  </a>
					</h3>
				  </div>
				  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
					<div class="panel-body px-3 mb-4">
					  <p>We would gladly help you with all your requests.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading5">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						I am struggling to make my minimum numbers – do I have to cancel my tour?					  </a>
					</h3>
				  </div>
				  <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
					<div class="panel-body px-3 mb-4">
					  <p>Don't Worry! We can help you get more guests interested! Or cancel without charge 8 weeks (56 Days) before the tour departure.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading6">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						Are you covered by ABTA/ATOL?					  </a>
					</h3>
				  </div>
				  <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
					<div class="panel-body px-3 mb-4">
					  <p>Bowling Tours, with over 10 years of experience, ensures continuous funding for bowls tours through a dedicated HSBC deposit account. Our excellent credit score should provide you with peace of mind.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading7">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						Do I need Travel Insurance?					  </a>
					</h3>
				  </div>
				  <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
					<div class="panel-body px-3 mb-4">
					  <p>We always encourage touring members to take out personal travel insurance. We can<br>
 provide travel insurance, please contact us for more details. </p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading8">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						What time can I check in at the hotel?					  </a>
					</h3>
				  </div>
				  <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
					<div class="panel-body px-3 mb-4">
					  <p>Check-in times are dependent on hotel policy; however, our hotel partners would be happy  to assist you should you arrive early.</p>

					</div>
				  </div>
				</div>

								<div class="panel panel-default">
				  <div class="panel-heading " role="tab" id="heading9">
					<h3 class="panel-title" style="margin-top: 5px;margin-bottom: 5px;">
					  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapse9" style="font-size: 15px; color: #656565; text-decoration: none;font-style: normal;">
						 How can I leave feedback about my bowls tour?					  </a>
					</h3>
				  </div>
				  <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
					<div class="panel-body px-3 mb-4">
					  <p>You can write a google review or contact us through our website.</p>

					</div>
				  </div>
				</div>

						  	</div>

	  </div>
	</section>
</div>
<div class="clr"></div>


</div>
<style type="text/css">
/*h2 {
	font-family: Arial, Verdana;
	font-weight: 800;
	font-size: 2.5rem;
	color: #091f2f;
	text-transform: uppercase;
}*/
.panel-group .panel {
    padding: 6px 6px 6px 6px;
}
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #ffffff;
    padding: 0;
    height: auto;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 3rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    /*margin-top: -18px;*/
    line-height: 15px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
</style>

<div class="clr"></div>




<div class="home_body">

    <div class="community_box">
        <div class="community_box_left">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/balb-pic.png"></div>
            <div class="community_right">
                <h4>Care</h4>
                <p>Expert-picked hotels &amp; modern coaches for your comfort</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/admin-pic.png" style="margin:4px 0px 0px;"></div>
            <div class="community_right">
                <h4>Community</h4>
                <p>Supporting local clubs, making a difference together</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="community_box_left community_box_bdr">
            <div class="community_left"><img src="https://bowlingtours-staging-co-uk.stackstaging.com/wp-content/themes/bowlingtours/assets/images/icon-choice.png"></div>
            <div class="community_right">
                <h4>Choice</h4>
                <p>Discover vibrant, stunning destinations for your club</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
  <div class="clr"></div>
</div>
<div class="clr"></div>
</div>
</div>
</div>
<style type="text/css">
	.TxtStatus {
	display: none;
}
</style>
  <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'contact' })
                .then(function (token) {
                    document.getElementById('recaptcha_token').value = token;
                });
        });
    </script>

<script type="text/javascript">
document.getElementById("contactForm").addEventListener("submit", function(e) {
	 e.preventDefault();
  var fullName = $('#fullName').val();
  var email = $('#email').val();
  var phone = $('#phone').val();
  var message = $('#message').val();

  // Clear previous errors
  // Clear previous error messages
	$("#nameError").text("");
	$("#emailError").text("");
	$("#phoneError").text("");
	$("#messageError").text("");
	$("#formSuccess").text("");

	let isValid = true;

	if (fullName === '') {
	 
	  $("#nameError").text("Full name is required.");
	  isValid = false;
	}

	if (email === '') {
	  $("#emailError").text("Email is required.");
	  isValid = false;
	} else if (!validateEmail(email)) {
	  $("#emailError").text("Invalid email format.");
	  isValid = false;
	}

	if (phone === '') {
	  $("#phoneError").text("Phone number is required.");
	  isValid = false;
	}

	if (message === '') {
	  $("#messageError").text("Message is required.");
	  isValid = false;
	}

	if (!isValid) {
	  e.preventDefault(); // Prevent form submission
	}
	else
	{
		$('#contactForm').submit();
	}
});

function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email.toLowerCase());
}
</script>
<script>
	jQuery('.wp-google-url').remove();
</script>
@endsection