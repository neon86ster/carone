<?php


//include("/include/eg.inc.php");
//$eg = new eg();
//$search = $eg->getParameter("search");
?>
<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Car Dealer | Home</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="shortcut" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen" />
	<link rel="stylesheet" href="css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="sliders/flexslider/flexslider.css" media="screen" />
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

				<?php if($pagecat == 'about') { ?> 
				<li class="current-menu-item"><span class="icon_about"><a href="about.php">&nbsp&nbsp About Us &nbsp&nbsp&nbsp&nbsp</a></span></li>
				 <?php }
				else{ ?> 
				<li><span class="icon_about"><a href="about.php">&nbsp&nbsp About Us &nbsp&nbsp&nbsp&nbsp</a></span></li> 
				<?php } ?>
				 <?php if($pagecat == 'services') { ?> 
				 <li class="current-menu-item"><span class="icon_service"><a href="services.php">&nbsp Services &nbsp&nbsp&nbsp</a></span></li>
				  <?php }
				 else{ ?> <li><span class="icon_service"><a href="services.php">&nbsp Services &nbsp&nbsp&nbsp</a></span></li> 
				 <?php } ?> 
				<?php if($pagecat == 'export') { ?>
				<li class="current-menu-item"><span class="icon_export"><a href="export.php">&nbsp&nbsp&nbsp Export &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }else{?>
					<li><span class="icon_export"><a href="export.php">&nbsp&nbsp&nbsp Export &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }?>
				<?php if($pagecat == 'local') { ?>
				<li class="current-menu-item"><span class="icon_local"><a href="local.php">&nbsp Local Pre-Owned &nbsp&nbsp&nbsp&nbsp</a></span></li>
				<?php }else{?>
				<li><span class="icon_local"><a href="local.php">&nbsp Local Pre-Owned &nbsp&nbsp&nbsp&nbsp</a></span></li>
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
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	