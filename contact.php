<?php
$pagecat = "contact";
include 'header.php';

//check if form is posted and validated.
$error = 0;
if((isset($_POST['email'])) && (empty($_POST['email']))) {
	$error = 1;
}
if((isset($_POST['name'])) && (empty($_POST['name']))) {
	$error = 1;
}
if((isset($_POST['contact'])) && (empty($_POST['contact']))) {
	$error = 1;
}
if((isset($_POST['message'])) && (empty($_POST['message']))) {
	$error = 1;
}
if(isset($_POST['email'])) {
	if ($error == 0) {
	$to = "jack@zno-intl.com";
	$subject = "New enquiry mail from www.carone.com.sg";
	$message = "Name: ".$_POST['name']."\nContact: ".$POST['contact']."\nMessage: ".$_POST['message'];
	$from = $_POST['email'];
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	$mailsent = 1;
	}
}
?>

	
	
	<div class="main">
		
		<div id="map"></div>

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container clearfix">
			
			<div class="four columns">
				
				<div class="widget_contacts">

					<h3 class="widget-title">Locate Us</h3>			

					<ul class="our-contacts">

						<li class="address">
							<b>Address:</b>
							<p>Car One Auto Pte. Ltd.<br>210, TURF CLUB ROAD, <br>#LOT-C23, <br>Singapore(287995)</p>
						</li>
						<li class="phone">
							<b>Phone:</b>&nbsp;<span>+65 64400330</span> <br />
						</li>
						<li>
							<b>Email: <a href="mailto:joe@carone.com.sg">joe@carone.com.sg</a></b>
						</li>

					</ul><!--/ .our-contacts-->

				</div><!--/ .widget-container-->
				
			</div><!--/ .four .columns-->
			
			<div class="twelve columns">

				<div id="contact">

					<h3 class="widget-title">Contact Us</h3>

					<!-- <form method="post" action="" class="contact-form" id="contactform">-->
					<form name="contactForm" id="contactForm" method="post" action="">
						<?php
						if($mailsent == 1) {
						?>
						<p class="input-block">Thank you! Your enquiry has been sent. We will get back to you shortly!</p>
						<?php						
						}
						else
						{
						?>
						<?php
						if($error == 1) {
						?>
						<p class="input-block" style="color:#FF0000">All fields are mandatory. Please fill in all fields!</p>
						<?php						
						}
						?>
						<p class="input-block">
							<label for="name">Your Name</label>
							<input type="text" name="name" id="name" value="<?php echo $_POST['name']; ?>" />
						</p>

						<p class="input-block">
							<label for="email">Your Email</label>
							<input type="text" name="email" id="email" value="<?php echo $_POST['email']; ?>"/>
						</p>

						<p class="input-block">
							<label for="contact">Contact</label>
							<input type="text" name="contact" id="contact" value="<?php echo $_POST['contact']; ?>"/>
						</p>

						<p class="input-block">
							<label for="message">Your Message:</label>
							<textarea name="message" id="message" cols="100" rows="5"><?php echo $_POST['message']; ?></textarea>	
						</p>
						
						<p class="input-block">
							<label>&nbsp;</label>
							<button class="button orange" type="submit" id="submit">Submit</button>
						</p>
						<?php } ?>
					</form><!--/ .contact-form-->			   

				</div><!--/ #contact-->
					
			</div><!--/ .twelve .columns-->
			


		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
	<?php include 'footer.php';?>
