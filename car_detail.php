<?php 

include("include/eg.inc.php");
$eg = new eg();
$car_id = $eg->getParameter("car_id");
$table = $eg->getParameter("table");
//include 'header.php';

if($table=='local'){
$sql="select * from C_car_detail where id_car='$car_id' ";
//echo $sql;
$rs_result=$eg->get_data($sql);
}
if($table=='export'){
	$sql="select * from C_export where id_car='$car_id' ";
	//echo $sql;
	$rs_result=$eg->get_data($sql);
}

//check if contact form is posted and validated.
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
<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Car Dealer | One Products</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="shortcut" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen" />
	<link rel="stylesheet" href="css/galleriffic.css" media="screen" />
	<link rel="stylesheet" href="css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="fancybox/jquery.fancybox.css" media="screen" />

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
</head>
<body class="menu-1 h-style-1 text-1">

<div class="wrap">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header" class="clearfix">
		
		<a href="home.php" id="logo"><img src="images/caronebanner.png" width="660" alt="" / style="margin-top:-60px" alt="Car Dealer"></a>
		
		<div class="widget-container widget_search">			
			<span class="call"><span>+65 6440 0330</span></span><br />
			
			<span class="adds">Car Mall @ The Granstand<br>210, Turf Club Road, Lot-C23,<br>Singapore(287995)</span>		 

		</div><!--/ .widget-container-->	
		
		<nav id="navigation" class="navigation">
			
			<ul>
			<?php if($pagecat == 'home') { ?>
				<li class="current-menu-item"><span class="icon_home"><a  href="home.php">&nbsp Home &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }else{?>
				<li ><span class="icon_home"><a href="home.php">&nbsp Home &nbsp&nbsp&nbsp&nbsp</a></span></li>
				
				<?php }?>
				<li><span class="icon_about"><a href="about.php">&nbsp&nbsp About Us &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<li><span class="icon_service"><a href="services.php">&nbsp&nbsp Services &nbsp&nbsp&nbsp</a></span></li> 
				
				</li>
				<?php if($pagecat == 'export') { ?>
				<li class="current-menu-item"><span class="icon_export"><a href="export.php">&nbsp&nbsp Export &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }else{?>
				<li><span class="icon_export"><a href="export.php">&nbsp&nbsp Export &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }?>
				<?php if($pagecat == 'local') { ?>
				<li class="current-menu-item"><span class="icon_local"><a href="local.php">&nbsp&nbsp Local Pre-Owned &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }else{?>
				<li><span class="icon_local"><a href="local.php">&nbsp&nbsp Local Pre-Owned &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }?>
				<?php if($pagecat == 'contact') { ?>
				<li class="current-menu-item"><span class="icon_contact"><a href="contact.php">&nbsp&nbsp Contacts &nbsp&nbsp</a></span></li>
				<?php }else { ?>
				<li><span class="icon_contact"><a href="contact.php">&nbsp&nbsp Contacts &nbsp&nbsp</a></span></li>
				<?php }?>
			</ul>
			<div class="menu_search" style="margin-top:-10px;">
			  <?php
			  /*
			  <form method="post" action="local.php?search=1">
	
				<p>
					<input type="text"  name="n1"  value=<?=$search_head?> >
					
					<button type="submit" name="search" id="searchsubmit"></button>
				</p>

			</form><!--/ #searchform-->
			*/ ?>
			<a href="http://time.is/Singapore" id="time_is_link" style="font-size:18px; color:#fff; pointer-events:none; font-family: 'Yanone Kaffeesatz', sans-serif;">Singapore Time:</a>
<span id="Singapore_z43e" style="font-size:18px; color:#fff; pointer-events:none; font-family: 'Yanone Kaffeesatz', sans-serif;"></span>
<script src="http://widget.time.is/t.js"></script>
<script>
time_is_widget.init({Singapore_z43e:{}});
</script>
			</div>
		</nav><!--/ #navigation-->
		
	</header><!--/ #header-->
	<div class="main">

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container sbl clearfix">

			<!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->		

			<section id="content" class="two-thirds column">
				
				<article class="item clearfix">
					 <?php 
					 for($i=0;$i<$rs_result["rows"];$i++)
					 {
					 	$make=$rs_result[$i]["id_car_make"];
					 	
					 	$car_make = $eg->getIdToText($make,"C_car_make","car_make_name","id_car_make");
					 ?>
					<h2 class="title"><?=$car_make?> <?=$rs_result[$i]["model"]?> </h2>
					<?php }?>
					<div id="gallery" class="gallery">

						<div class="slideshow-container">
							<div id="loading" class="loader"></div>
							<div id="slideshow" class="slideshow clearfix"></div>
						</div><!--/ .slideshow-container-->

						<div id="thumbs" class="clearfix">

							<ul class="thumbs list-image clearfix">
								 <?php 
					 				for($i=0;$i<$rs_result["rows"];$i++)
									 {
								?>
								
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic1"]?>" >
									<?php 
									if($rs_result[$i]["pic2"]!="default.jpg"){
									?>
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic1"]?>" alt="">
									<?php }?>
									</a>
								</li>
								<?php 
									 
								if($rs_result[$i]["pic2"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic2"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic2"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic3"]!="default.jpg"){
								?>
 								<li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic3"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic3"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic4"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb" href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic4"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic4"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic5"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic5"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic5"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic6"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic6"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic6"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic7"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb" href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic7"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic7"]?>" alt="">
										
									</a>
								</li>
								<?php 
									 }
								if($rs_result[$i]["pic8"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic8"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic8"]?>" alt="">
										
									</a>
								</li>
								<?php 
								}
								if($rs_result[$i]["pic9"]!="default.jpg"){
								?>
								 <li>
									<a class="thumb"  href="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic9"]?>" >
									<img style="display:block;" width="146" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_result[$i]["pic9"]?>" alt="">
										
									</a>
								</li>
								
								<?php 
									} 
								}?>
							</ul><!--/ .thumbs-->

						</div><!--/ #thumbs-->

					</div><!--/ #gallery-->
	
					 <div class="extra">
					 <?php 
					 for($i=0;$i<$rs_result["rows"];$i++)
					 {
					 
					 ?>
							
						
						<span class="cost">$<?=$rs_result[$i]["price"]?></span>
						<table >
								
								<?php if($rs_result[$i]["registation_date"]!=""){?>
								<tr height="25">
									<td style="width:60px;" ><b><label for="LoanAmount">Reg Date:</label></b></td>
									
									<td style="width:20px;text-align:left;"><?=date('d/m/y', strtotime($rs_result[$i]["registation_date"]))?></td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["milleage"]!=""){?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>Mileage: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=number_format($rs_result[$i]["milleage"],0)?>KM</td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["engine_cap"]!=""){?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>Engine: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=number_format($rs_result[$i]["engine_cap"],0)?>cc</td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["coe"]!=""){?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>COE: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=number_format($rs_result[$i]["coe"],0)?></td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["omv"]!=""){?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>OMV: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=number_format($rs_result[$i]["omv"],0)?></td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["milleage"]!=""){
								
									$type=$rs_result[$i]["id_car_type"];
									
									$car_type = $eg->getIdToText($type,"C_car_category","car_type","id_car_type");
									?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>Type: </b></label></td>
									
									<td style="width:60px;text-align:left;"><?=$car_type?></td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["transmission"]!=""){
								
									$trs=$rs_result[$i]["transmission"];
									if($trs==0){$transmission="Auto";}
									if($trs==1){$transmission="Manual";}
									?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>Trans: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=$transmission?></td>
									
								</tr>
								<?php }?>
								<?php if($rs_result[$i]["transfer_count"]!=""){?>
								<tr height="25">
									<td style="width:60px;"><label for="LoanAmount"><b>Owners: </b></label></td>
									
									<td style="width:20px;text-align:left;"><?=$rs_result[$i]["transfer_count"]+1?></td>
									
								</tr>
								<?php }?>
									
								
						</table>
							
						<?php }?>						
					</div><!--/ .extra-->					
					
					<div class="entry-item">
						 <?php 
					 for($i=0;$i<$rs_result["rows"];$i++)
					 {
					 	if($rs_result[$i]["car_feature"]!="")
					 	{
					 ?>
					 <h3 class="section-title">Feature</h3>
					 <p>
					 <?=$rs_result[$i]["car_feature"]?>
					 </p>
					 <?php 
					 	}
					 	if($rs_result[$i]["accessories"]!="")
					 	{
					 ?>
					 <h3 class="section-title">Accessories</h3>
					 <p>
					 <?=$rs_result[$i]["accessories"]?>
					 </p>
					 <?php }
						 if($rs_result[$i]["description"]!="")
						 {
					 ?>
					 <h3 class="section-title">Description</h3>
					 <p>
					 <?=$rs_result[$i]["description"]?>
					 </p>
					 <?php }
					 }?>
						
						
						
						
						<h3 class="section-title">Contact Us regarding this car</h3>
						
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
							<textarea name="message" id="message" cols="70" rows="5"><?php echo $_POST['message']; ?></textarea>	
						</p>
						
						<p class="input-block">
							<label>&nbsp;</label>
							<button class="button orange" type="submit" id="submit">Submit</button>
						</p>
						<?php } ?>
					</form><!--/ .contact-form-->			
						
					</div><!--/ .entry-item-->
					
				</article><!--/ .item-->
				
			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				
				<div class="widget-container widget_custom_search">
					
					<div class="search-heading">
							
						<h3 class="widget-title">Quick Search</h3>
						
					</div><!--/ .search-heading-->
					
					<div class="search-entry clearfix">

					<form method="post" id="boxpanel" class="form-panel" enctype="multipart/form-data" action="export.php">
				<fieldset>
					<label>Manufacturer:</label>
					<select name=manufacture style="width:240px;height:25px;"> 
							<option value='0'>Please select Car Make</option> 
					<?
					$sql="select * from C_car_make order by id_car_make";
								$rss=$eg->get_data($sql);
								//echo $sql;
								for($i=0;$i<$rss["rows"];$i++){
									if($rss[$i]["id_car_make"]=="$manufacture"){
										echo "<option value=\"".$rss[$i]["id_car_make"]."\" selected=\"selected\">".$rss[$i]["car_make_name"]."</option>";
									}
									else
									{
										echo "<option value=\"".$rss[$i]["id_car_make"]."\">".$rss[$i]["car_make_name"]."</option>";
									}
								}
					?>
							
					</select>
				</fieldset>
				<fieldset>
					<label>Model:</label>
					<input type="text"  style="width: 240px;height: 25px;" name="model" placeholder="Car Model"  >
				</fieldset>
				
				<fieldset>
					<label>Min Price:</label>
						<select name=min style="height:25px;"> 
								<option value='0'>Min Price</option> 
								<?php 
								if($min){
										echo "<option value=\"".$min."\" selected=\"selected\">".$min."</option>";
									}
									?>
							 	<option value="10001">10,001</option>
								 <option value="20001">20,001</option>
								 <option value="30001">30,001</option>
								 <option value="40001">40,001</option>
								 <option value="50001">50,001</option>
								 <option value="60001">60,001</option>
								 <option value="70001">70,001</option>
								 <option value="80001">80,001</option>
								 <option value="90001">90,001</option>
								 <option value="100001">100,001</option>
								 <option value="120001">120,001</option>
								 <option value="140001">140,001</option>
								 <option value="160001">160,001</option>
								 <option value="200001">200,001</option>
							
					</select>
				</fieldset>
				
				<fieldset>
					<label>Max Price:</label>
					
					<select name=max style="height:25px;"> 
							<option value='0'>Max Price</option> 
							<?php 
							if($max){
										echo "<option value=\"".$max."\" selected=\"selected\">".$max."</option>";
									}
									?>
						 <option value="20000">20,000</option>
						 <option value="30000">30,000</option>
						 <option value="40000">40,000</option>
						 <option value="50000">50,000</option>
						 <option value="60000">60,000</option>
						 <option value="70000">70,000</option>
						 <option value="80000">80,000</option>
						 <option value="90000">90,000</option>
						 <option value="100000">100,000</option>
						 <option value="120000">120,000</option>
						 <option value="140000">140,000</option>
						 <option value="160000">160,000</option>
						 <option value="200000">200,000</option>
							
					</select>
				</fieldset>
				
				<fieldset>
					<label>Owners:</label>
					<select name="transfer" style="height:25px;">
					<option value='0'>No. of Owners</option> 
							<?php 
							if($transfer){
										echo "<option value=\"".$transfer."\" selected=\"selected\">".$transfer."</option>";
									}
									?>
						 <option value="1">1</option>
						 <option value="2">2</option>
						 <option value="3">3</option>
						 <option value="4">4</option>
						 <option value="5">5</option>
						 <option value="6">6</option>
						 <option value="7">7</option>
						 <option value="8">8</option>
						 <option value="9">9</option>
						</select>
				</fieldset>
				
				<fieldset>
					<label>Mileage:</label>
					<select name="mileage" style="height:25px;">
					<option value='0'>Mileage (KM)</option> 
						<?php 
							if($mileage){
										echo "<option value=\"".$mileage."\" selected=\"selected\">".$mileage."</option>";
									}
									?>
						 <option value="10000">10,000</option>
						 <option value="20000">20,000</option>
						 <option value="30000">30,000</option>
						 <option value="40000">40,000</option>
						 <option value="50000">50,000</option>
						 <option value="60000">60,000</option>
						 <option value="70000">70,000</option>
						 <option value="80000">80,000</option>
						 <option value="90000">90,000</option>
						 <option value="100000">100,000</option>
						 <option value="120000">120,000</option>
						 <option value="140000">140,000</option>
						 <option value="160000">160,000</option>
						 <option value="200000">200,000</option>
						</select>
				</fieldset>
				
				<fieldset>
					<label>Body Type:</label>
							<select name=category> 
										<option value='0'>Body Type</option> 
								<?
								$sql="select * from C_car_category order by id_car_type";
											$rss=$eg->get_data($sql);
											//echo $sql;
											for($i=1;$i<$rss["rows"];$i++){
												if($rss[$i]["id_car_type"]=="$category"){
													echo "<option value=\"".$rss[$i]["id_car_type"]."\" selected=\"selected\">".$rss[$i]["car_type"]."</option>";
												}
												else
												{
													echo "<option value=\"".$rss[$i]["id_car_type"]."\">".$rss[$i]["car_type"]."</option>";
												}
											}
								?>
							
							</select>
				</fieldset>
				
				<div class="clear"></div>
				<input type="submit" name="submitSearch" id="submitSearch" value="Search" class="submit-search">
				
			</form><!--/ .form-panel-->
					</div><!--/ .search-entry-->


				</div><!--/ .widget-container-->
			<div class="widget-container widget_loan_calculator">
					
					<div class="widget-head">
						<h3 class="widget-title">Loan Calculator</h3>
					</div>
					
					<div class="entry-loan">
						
						<form action="" method="POST" name="myform" id="loan">

							<table>
								<tr>
									<td><label for="LoanAmount">Car Loan Amount</label></td>
									 <?
									 if($rs_result[0]["price"] <=20000){

									 	$loan=$rs_result[0]["price"]-0.4*$rs_result[0]["price"];
									 }
									 else{
									 	$loan=$rs_result[0]["price"]-0.5*$rs_result[0]["price"];
									 }
									
									
									 ?>
									<td><input name="LoanAmount" id="LoanAmount" type="text" value=" <?=$loan?>" /></td>
									<td>$</td>
								</tr>
								<tr>
									<td><label for="InterestRate">Annual Interest Rate</label></td>
									<td><input name="InterestRate" id="InterestRate" type="text" value="2.88" /></td>
									<td>%</td>
								</tr>
								<tr>
									<td><label for="NumberOfYears">Term of Car Loan</label></td>
									 <?
									 
									  $date=$rs_result[0]["registation_date"];
									  $newdate = strtotime ( '+10 year' , strtotime ( $date ) ) ;
									  $car_end_date = date ( 'Y-m-d' , $newdate );
									  
									  $current_date= date ( 'Y-m-d');
									 // echo $car_end_date."<br>";
									//  echo $current_date."<br>";
				
									  $date_diff=strtotime($car_end_date)-strtotime($current_date);
									  $month=floor(($date_diff)/2628000);
									  
									 if($month<="60"){
									 	$leftmonth=$month;
									 }else{
									 	$leftmonth="60";
									 }
									
		 
									 ?>
									<td><input name="NumberOfYears" id="NumberOfYears" type="text" value="<?=$leftmonth?>" /></td>
									<td>Months</td>
								</tr>
								<tr>
									<td>
										<button name="cal" class="button orange">Calculate</button>
									</td>
								</tr>
								<tr>
									<td><label for="NumberOfPayments">Number of Car Payments</label></td>
									<td><input readonly="readonly" type="text" id="NumberOfPayments" name="NumberOfPayments" /></td>
									<td></td>
								</tr>
								<tr>
									<td><label for="MonthlyPayment">Monthly Payment</label></td>
									<td><input readonly="readonly" type="text" id="MonthlyPayment" name="MonthlyPayment" /></td>
									<td>$</td>
								</tr>
							</table>					
							
						</form>
						
					</div><!--/ .entry-loan-->
				
				</div><!--/ .widget-container-->
				
				
				

			</aside><!--/ #sidebar-->
			

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->

	
<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
	
	<footer id="footer" class="container clearfix">
		
		<section class="container clearfix">
			
			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">About Us</h3>

					<div class="textwidget">

						<p class="white">
							Car One Auto focuses on transparency and trust with our customers, ensuring our commitment in providing the highest quality cars and services to our customers.
						</p>	

						<p>
							Our services ranges from Local Used Cars to Exporting cars overseas. 						</p>

					</div><!--/ .textwidget-->

					<a href="about.php" class="see">Read more</a>

				</div><!--/ .widget-container-->	

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">Our Hours</h3>

					<div class="textwidget">

						<ul class="hours">

							<li>Monday <span>10 am to 7 pm</span></li>
							<li>Tuesday <span>10 am to 7 pm</span></li>
							<li>Wednesday <span>10 am to 7 pm</span></li>
							<li>Thursday <span>10 am to 7 pm</span></li>
							<li>Friday <span>10 am to 7 pm</span></li>
							<li>Saturday <span>10 am to 7 pm</span></li>
							<li>Sunday <span>10 am to 7 pm</span></li>

						</ul><!--/ .hours-->

					</div><!--/ .textwidget-->

				</div><!--/ .widget-container-->

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_contacts">

					<h3 class="widget-title">Our Contacts</h3>			

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

			<div class="four columns">

				<div id="gMap"></div>

			</div><!--/ .four .columns-->
			
			<div class="adjective clearfix">

				<p class="copyright">Copyright &copy; 2013 Car One Auto All rights reserved</p>

				<p class="developed">Developed by <a href="http://znointernational.com" target="_blank">ZNO International</a></p>
				
			</div><!--/ .adjective-->

		</section><!--/ .container-->
		
	</footer><!--/ #footer-->
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
	
</div><!--/ .wrap-->

<div class="account-wrapper">
	

	
</div><!--/ .account-wrapper-->
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
<!--[if lt IE 9]>
	<script src="js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="js/jquery.galleriffic.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.gmap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>