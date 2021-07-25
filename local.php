<?php

$pagecat = "local";
include("include/eg.inc.php");
$eg = new eg();
include 'header.php';
$manufacture = $eg->getParameter("manufacture");
$min = $eg->getParameter("min");
$max = $eg->getParameter("max");
$transfer = $eg->getParameter("transfer");
$mileage = $eg->getParameter("mileage");
$model = $eg->getParameter("model");
$category = $eg->getParameter("category");
$search = $eg->getParameter("search");
$n1 = $eg->getParameter("n1");
///

  if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
    $sf = ($page-1) * 10;
    
///
$submitSearch = $eg->getParameter("submitSearch");

if($search==1){
	extract($_POST);


	$sql="select * from C_car_detail ";
	$sql.="where C_car_detail.availability='1' ";
	if($n1){$sql .= "and (model LIKE '%$n1%' ) ".
			"or (car_plate LIKE '%$n1%' ) ".
			"or (chassis_no LIKE '%$n1%' ) ".
			"or (engine_no LIKE '%$n1%' ) ";}


	//echo $sql;
	$rs_search=$eg->get_data($sql);

}

	$sql1="select * from C_car_detail ";
	$sql1.="where C_car_detail.availability='1' and C_car_detail.approval='1' ";
	if($manufacture){$sql1 .= "and C_car_detail.id_car_make=".$manufacture." ";}
	if($min){$sql1 .= "and C_car_detail.price>=".$min." ";}
	if($max){$sql1 .= "and C_car_detail.price<=".$max." ";}
	if($transfer){$sql1 .= "and C_car_detail.transfer_count<=".$transfer." ";}
	if($mileage){$sql1 .= "and C_car_detail.milleage<=".$mileage." ";}
	if($model){$sql1 .= "and (C_car_detail.model LIKE '%$model%' ) ";}
	if($category){$sql1 .= "and C_car_detail.id_car_make=".$category." ";}
	$sql1.=" order by C_car_detail.id_car  LIMIT ".$sf.",10 ";

	//echo $sql1;
	$rs_search=$eg->get_data($sql1);
	//echo $search;
	

	
?>

	
	
	<div class="main">

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container sbl clearfix">

			<!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->		

			<section id="content" class="two-thirds column">
				
				<div class="page-header clearfix">

					<h3 class="section-title">Local Vechicles </h3>

					<div class="layout-switcher">
						
						
					</div><!--/ .layout-switcher-->

				</div><!--/ .page-header-->

				<section id="change-items" class="item-list">

				
					<?php 
					
				

				for($i=0;$i<$rs_search["rows"];$i++)
				{
				?>

				

					<article>
						<input type=hidden name=car_id value="<?=$car_id=$rs_search[$i]["id_car"]?>">
						<a  href="car_detail.php?car_id=<?=$car_id?>&table=local" class="single-image picture">
							
							<img style="display:block;"width="300" height="183" src="http://caronedev.hatchd.sg/uploaded/<?=$rs_search[$i]["pic1"]?>" alt="" />
						</a>

						<div class="detailed">
							
							<h6 class="title-item">
							<?php 
							$mk=$rs_search[$i]["id_car_make"];
							
							
							$car_make = $eg->getIdToText($mk,"C_car_make","car_make_name","id_car_make");
							?>
								<a href="one-products.html"> <?=$car_make?> <?=$rs_search[$i]["model"]?></a>
							</h6>
							
							<span class="price">$<?=$rs_search[$i]["price"]?></span>
							
							<div class="clear"></div>
							
							<ul class="list-entry">
							<?php 
							$co=$rs_search[$i]["car_colour"];
							
							$colour = $eg->getIdToText($co,"C_car_colour","colour_name","id_colour");
							?>
								<li><b class="label">Colour:</b><span><?=$colour?></span></li>
								<li><b class="label">Mileage:</b><span><?=$rs_search[$i]["milleage"]?></span></li>	
								<li><b class="label">Year:</b><span><?=$rs_search[$i]["manufature_year"]?></span></li>	
								<?=$rs_search[$i]["description"]?>
							</ul><!--/ .list-entry-->
						
							
							
							<input type=hidden name=car_id value="<?=$car_id=$rs_search[$i]["id_car"]?>">
							<a href="car_detail.php?car_id=<?=$car_id?>&table=local" class="button orange">Details</a>
							
							
						</div><!--/ .detailed-->
						
					</article>

					<?php }
					
					?>

				</section><!--/ #change-items-->	
					
				<div class="wp-pagenavi clearfix">
					
					<?php
					$sql1="select * from C_car_detail ";
					$sql1.="where C_car_detail.availability='1' and C_car_detail.approval='1' ";
					if($manufacture){$sql1 .= "and C_car_detail.id_car_make=".$manufacture." ";}
					if($min){$sql1 .= "and C_car_detail.price>=".$min." ";}
					if($max){$sql1 .= "and C_car_detail.price<=".$max." ";}
					if($transfer){$sql1 .= "and C_car_detail.transfer_count<=".$transfer." ";}
					if($mileage){$sql1 .= "and C_car_detail.milleage<=".$mileage." ";}
					if($model){$sql1 .= "and (C_car_detail.model LIKE '%$model%' ) ";}
					if($category){$sql1 .= "and C_car_detail.id_car_make=".$category." ";}
					$sql1.=" order by C_car_detail.id_car  ";
					//echo $sql1;
					$count_pg=$eg->get_data($sql1);
			            $total = $count_pg["rows"];
			            $tp = ceil($total/10);
			 
			            for($i = 1; $i <= $tp; $i++)
			            {
			                echo "<a class='page' href='local.php?page=".$i."'>".$i."</a> ";
			            }
			        ?>
					
				</div><!--/ .wp-pagenavi-->

			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				
				<div class="widget-container widget_custom_search">
					
					<div class="search-heading">
							
						<h3 class="widget-title">Quick Search</h3>
						
					</div><!--/ .search-heading-->
					
					<div class="search-entry clearfix">

				<form method="post"  id="boxpanel" class="form-panel" enctype="multipart/form-data" action="local.php">
				<fieldset>
					<label>Manufacturer:</label>
					<select name=manufacture style="width:240px; height:25px;"> 
							<option value='0'>Please select Car Make</option> 
					<?
					$sql="select * from C_car_make order by car_make_name";
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
					<input type="text"  style="width: 240px;height: 25px;" name="model" placeholder="Car Model" >
				</fieldset>
				
				<fieldset>
					<label>Min Price:</label>
						<select name=min style="height: 25px;"> 
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
					
					<select name=max  style="height:25px;"> 
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
					<select name="transfer"  style="height:25px;">
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
					<select name="mileage"  style="height:25px;">
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
							<select name=category  style="height:25px;"> 
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
				

			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->

		<?php include 'footer.php';?>
