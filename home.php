<?php
$pagecat = "home";
include("include/eg.inc.php");
$eg = new eg();

include 'header.php';
$manufacture = $eg->getParameter("manufacture");
$min = $eg->getParameter("min");
$model = $eg->getParameter("model");
$max = $eg->getParameter("max");
$transfer = $eg->getParameter("transfer");
$mileage = $eg->getParameter("mileage");
$category = $eg->getParameter("category");
$submitSearch = $eg->getParameter("submitSearch");
$type = $eg->getParameter("type");
if($submitSearch){
	if($type==1){
		

		$sql2="select C_export.id_car,C_export.transfer_count,C_export.id_car_make,C_export.model,C_export.manufature_year,C_export.price,C_export.pic1,C_export.milleage from C_export ";
		$sql2.="where C_export.availability='1' and C_export.approval='1' ";
		if($manufacture){$sql2 .= "and C_export.id_car_make=".$manufacture." ";}
		if($min){$sql2 .= "and C_export.price>=".$min." ";}
		if($max){$sql2 .= "and C_export.price<=".$max." ";}
		if($transfer){$sql2 .= "and C_export.transfer_count<=".$transfer." ";}
		if($mileage){$sql2 .= "and C_export.milleage<=".$mileage." ";}
		if($category){$sql2 .= "and C_export.id_car_make=".$category." ";}
		if($model){$sql2 .= "and (C_export.model LIKE '%$model%' ) ";}
		$sql2.=" order by C_export.id_car DESC  LIMIT 5";
		$rs_search=$eg->get_data($sql2);
		?><META HTTP-EQUIV="Refresh" Content="0; URL=export.php?manufacture=<?=$manufacture?>&category=<?=$category?>&min=<?=$min?>&max=<?=$max?>&transfer=<?=$transfer?>&mileage=<?=$mileage?>"><?
		
	}else{

		$sql1="select C_car_detail.id_car,C_car_detail.transfer_count,C_car_detail.id_car_make,C_car_detail.model,C_car_detail.manufature_year,C_car_detail.price,C_car_detail.pic1,C_car_detail.milleage from C_car_detail ";
		$sql1.="where C_car_detail.availability='1' and C_car_detail.approval='1' ";
		if($manufacture){$sql1 .= "and C_car_detail.id_car_make=".$manufacture." ";}
		if($min){$sql1 .= "and C_car_detail.price>=".$min." ";}
		if($max){$sql1 .= "and C_car_detail.price<=".$max." ";}
		if($transfer){$sql1 .= "and C_car_detail.transfer_count<=".$transfer." ";}
		if($mileage){$sql1 .= "and C_car_detail.milleage<=".$mileage." ";}
		if($category){$sql1 .= "and C_car_detail.id_car_make=".$category." ";}
		if($model){$sql1 .= "and (C_car_detail.model LIKE '%$model%' ) ";}
		$sql1.=" order by C_car_detail.id_car DESC  LIMIT 5";

		$rs_search=$eg->get_data($sql2);
		?><META HTTP-EQUIV="Refresh" Content="0; URL=local.php?manufacture=<?=$manufacture?>&category=<?=$category?>&min=<?=$min?>&max=<?=$max?>&transfer=<?=$transfer?>&mileage=<?=$mileage?>"><?
				
	}


}

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


	
	
	<!-- - - - - - - - - - - - - - Top Panel - - - - - - - - - - - - - - - - -->	
	
	<div class="top-panel clearfix">
		
		<!-- - - - - - - - - - - Slider - - - - - - - - - - - - - -->	

		<div id="slider" class="flexslider clearfix">

			<ul class="slides">
			<?php 
			
			$sql1="select C_car_detail.id_car,C_car_detail.id_car_type,C_car_detail.tb_name,C_car_detail.id_car_make,C_car_detail.model,C_car_detail.manufature_year,C_car_detail.price,C_car_detail.pic1,C_car_detail.milleage from C_car_detail where C_car_detail.mark_feature='1' AND C_car_detail.availability='1' AND C_car_detail.approval='1' ORDER BY C_car_detail.id_car DESC  ";
			$sql = "($sql1)";
			//echo $sql;
			$rs=$eg->get_data($sql);
			for($i=0;$i<$rs["rows"];$i++){
			?>
				<li>
					<img style="display:block;height:400px!importance;width:660px;"  src="http://caronedev.hatchd.sg/uploaded/<?=$rs[$i]["pic1"]?>" alt="" />

					<div class="caption">
						<div class="caption-entry">

							<dl class="auto-detailed clearfix">
							<?php 
							$type=$rs[$i]["id_car_make"];
							
							$car_mk = $eg->getIdToText($type,"C_car_make","car_make_name","id_car_make");
							?>
								<dt><span class="model"> <?=$car_mk?> <?=$rs[$i]["model"]?></span></dt>
								<dd class="media-hidden"><b><?=$rs[$i]["milleage"]?> KM</b></dd>
								<dd class="media-hidden"><b><?=$rs[$i]["manufature_year"]?></b></dd>
								
								<dd><span class="heading" style="color:#0765C5;">$<?=$rs[$i]["price"]?></span></dd>
							</dl><!--/ .auto-detailed-->
							<input type=hidden name=n value="<?=$car_id=$rs[$i]["id_car"]?>">
							<input type=hidden name=n value="<?=$table=$rs[$i]["tb_name"]?>">
							<a href="car_detail.php?car_id=<?=$car_id?>&table=<?=$table?>" class="button orange">Details &raquo;</a>

						</div><!--/ .caption-entry-->
					</div><!--/ .caption-->
				</li>
			
				
			<?php }?>

			</ul><!--/ .slides-->

		</div><!--/ #slider-->

		<!-- - - - - - - - - - - end Slider - - - - - - - - - - - - - -->
		
		<!-- - - - - - - - - - - Search Panel - - - - - - - - - - - - - -->
		
		<div class="widget_custom_search">
			
			<h3 class="widget-title">Quick Search</h3>
			
			
				<form method="post"  id="boxpanel" class="form-panel" enctype="multipart/form-data" action="<?php echo $_SERVER['$PHP_SELF'];?>">
				<fieldset>
					<label>Manufacturer:</label>
					<select name="manufacture" style="width:240px; height:25px;"> 
							<option value='0'>Please select Car Make</option> 
					<?
					$sql="select * from C_car_make order by car_make_name";
								$rss=$eg->get_data($sql);
								//echo $sql;
								for($i=0;$i<$rss["rows"];$i++){
									if($rss[$i]["id_car_make"]=="0"){
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
					<input type="text"  style="width: 240px;height: 25px;" name="model" placeholder="Car Model" >
				</fieldset>
				<fieldset>
					<label>Min Price:</label>
						<select name="min" style="height:25px;"> 
								<option value='0'>Min Price</option> 
								
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
					
					<select name="max" style="height:25px;"> 
							<option value='0'>Max Price</option> 
					
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
							<select name="category" style="height:25px;"> 
										<option value='0'>Body Type</option> 
								<?
								$sql="select * from C_car_category order by id_car_type";
											$rss=$eg->get_data($sql);
											//echo $sql;
											for($i=1;$i<$rss["rows"];$i++){
												if($rss[$i]["id_car_type"]=="0"){
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
					<fieldset>
					<label>Local Or Export:</label>
					<select name="type" style="height:25px;">
					<option value='0'>Local</option> 
					<option value="1">Export</option>
						 
						</select>
				</fieldset>
				
				<div class="clear"></div>
				
				<input type="submit" name="submitSearch" id="submitSearch" value="Search" class="submit-search">
			</form><!--/ .form-panel-->
			
		</div><!--/ .main-search-panel-->
		
		<!-- - - - - - - - - - end Search Panel - - - - - - - - - - - - -->
		
	</div><!--/ .top-panel-->
	
	<!-- - - - - - - - - - - - - end Top Panel - - - - - - - - - - - - - - - -->	
	
	<div class="main">

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container sbr clearfix">

			<!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->		

			<section id="content" class="two-thirds column">

				<h3 class="widget-title">Recent Automobiles</h3>
				<?php 
				
				

				?>
				<section id="change-items" class="item-grid">
				<?php 
				$sql1="select C_car_detail.id_car,C_car_detail.car_colour,C_car_detail.transfer_count,C_car_detail.tb_name,C_car_detail.id_car_make,C_car_detail.model,C_car_detail.manufature_year,C_car_detail.price,C_car_detail.pic1,C_car_detail.milleage from C_car_detail ";
				$sql1.="WHERE C_car_detail.availability='1' AND C_car_detail.approval='1'";
				$sql1.=" order by C_car_detail.id_car DESC  LIMIT 6";
				
				$sql = "($sql1)";
				$rs_recent=$eg->get_data($sql);
				
				//echo $sql1;
				for($i=0;$i<$rs_recent["rows"];$i++)
				{
				?>
					<article>
						
						<a href="car_detail.php?car_id=<?=$rs_recent[$i]["id_car"]?>&table=<?=$rs_recent[$i]["tb_name"]?>" class="single-image picture video">
							<img style="display:block;" width="420" height="156" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_recent[$i]["pic1"]?>" alt="">
						</a>

						<div class="detailed">
							
							<h6 class="title-item" style="font-size:13px;">
							<?php 
							$mk=$rs_recent[$i]["id_car_make"];
							
							
							$car_make = $eg->getIdToText($mk,"C_car_make","car_make_name","id_car_make");
							?>
								<a href="one-products.html"><?=$car_make?> <?=$rs_recent[$i]["model"]?> </a>
							</h6>
							
							<span class="price" style="font-size:14px;">$<?=$rs_recent[$i]["price"]?></span>

							<a href="car_detail.php?car_id=<?=$rs_recent[$i]["id_car"]?>&table=<?=$rs_recent[$i]["tb_name"]?>" class="button orange">Details</a>
							
						</div><!--/ .detailed-->
						
					</article>
					<?php }?>
					
				</section><!--/ .item-grid-->
				
			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				<div class="widget-container widget_loan_calculator">
					
					<div class="widget-head">
						<h3 class="widget-title">Loan Calculator</h3>
					</div>
					
					<div class="entry-loan">
						
						<form action="" method="POST" name="myform" id="loan">

							<table>
								<tr>
									<td><label for="LoanAmount">Car Loan Amount</label></td>
									<td><input name="LoanAmount" id="LoanAmount" type="text" value="50000" /></td>
									<td>$</td>
								</tr>
								<tr>
									<td><label for="InterestRate">Annual Interest Rate</label></td>
									<td><input name="InterestRate" id="InterestRate" type="text" value="2.88" /></td>
									<td>%</td>
								</tr>
								<tr>
									<td><label for="NumberOfYears">Term of Car Loan</label></td>
									<td><input name="NumberOfYears" id="NumberOfYears" type="text" value="60" /></td>
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
				<div class="widget-container widget_loan_calculator">
					
					<div class="widget-head">
					
						<h3 style="margin-bottom: 0;padding: 5px 0 5px 30px;border: none;background: url(images/icons/email_contact.png) no-repeat left center;"><span style="color:#0765C5">Contact</span> Us</h3>
					</div>
					
					<div class="entry-loan">
								  
					
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
							<table>
								<tr>
									<td><label for="LoanAmount">Your Name</label></td>
									<td><input style="width:200px;"  placeholder="name"type="text" name="name" id="name" value="<?php echo $_POST['name']; ?>" /></td>
									
								</tr>
								<tr>
									<td><label for="InterestRate">Your Email</label></td>
									<td><input style="width:200px;" placeholder="Exe: joe@carone.com.sg"  type="text" name="email" id="email" value="<?php echo $_POST['email']; ?>"/></td>
									
								</tr>
								<tr>
									<td><label for="NumberOfYears">Contact</label></td>
									<td><input style="width:200px;" type="text"   name="contact" id="contact" value="<?php echo $_POST['contact']; ?>"/></td>
									
								</tr>
							
								<tr>
									<td style="text-align:left;line-height:22px;vertical-align: top;"><label for="NumberOfPayments">Your Message</label></td>
									<td>&nbsp&nbsp<textarea name="message" style="text-align:left;line-height:22px;vertical-align: top;"  id="message" cols="30" rows="5"><?php echo $_POST['message']; ?></textarea>	</td>
									
								</tr>
								
							</table>	
							<?php } ?>
							<br>				
							<button name="cal" class="button orange">Send</button>
							
						</form>
						
					</div><!--/ .entry-loan-->
				
				</div><!--/ .widget-container-->
				
				 <!-- recent new <div class="widget-container widget_recent_entries">
					
					<h3 class="widget-title">Recent News</h3>
					
					<ul>
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing</a></li>
						<li><a href="#">Ipsum dolor sit amet, consectetur adipisicing</a></li>
						<li><a href="#">Set magna ipsum dolor sit amet, consectetur adipisicing</a></li>
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div>--><!--/ .widget-container-->

			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->

<?php include 'footer.php';?>