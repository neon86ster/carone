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
		
		<a href="home.php" id="logo"><img src="images/logo.png" width="100" alt="" / style="margin-top:-50px" alt="Car Dealer"></a>
		
		<div class="widget-container widget_search">
			
			<span class="call"><span>+65 6440 0330</span></span><br />
			
			<span class="adds">210, TURF CLUB ROAD<br>#LOT-C23, S(287995)</span>

			   <form method="post" action="local.php?search=1">
	
				<p>
					<input type="text"  name="n1"  value=<?=$search_head?> >
					
					<button type="submit" name="search" id="searchsubmit"></button>
				</p>

			</form><!--/ #searchform-->

		</div><!--/ .widget-container-->		
		
		<nav id="navigation" class="navigation">
			
			<ul>
			<?php if($pagecat == 'home') { ?>
				<li class="current-menu-item"><a href="home.php">Home</a></li>
				<?php }else{?>
				<li ><a href="home.php">Home</a></li>
				
				<?php }?>

				<?php if($pagecat == 'about') { ?> <li class="current-menu-item"><a href="about.php">About Us</a></li> <?php }
				else{ ?> <li><a href="about.php">About Us</a></li> <?php } ?>
				 <?php if($pagecat == 'services') { ?> <li class="current-menu-item"><a href="services">Services</a></li> <?php }
				 else{ ?> <li><a href="services.php">Services</a></li> <?php } ?> 
				<?php if($pagecat == 'export') { ?>
				<li class="current-menu-item"><a href="export.php">Export</a></li>
				<?php }else{?>
					<li><a href="export.php">Export</a></li>
				<?php }?>
				<?php if($pagecat == 'local') { ?>
				<li class="current-menu-item"><a href="local.php">Local Pre-Owned</a></li>
				<?php }else{?>
				<li><a href="local.php">Local Pre-Owned</a></li>
				<?php }?>
				<?php if($pagecat == 'contact') { ?>
				<li class="current-menu-item"><a href="contact.php">Contacts</a></li>
				<?php }else { ?>
				<li><a href="contact.php">Contacts</a></li>
				<?php }?>
			</ul>
			
		</nav><!--/ #navigation-->
		
	</header><!--/ #header-->
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	