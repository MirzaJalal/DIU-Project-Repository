<?php include("header.php"); ?>
<!-- main container -->
<div class="container-fluid">
	<div class="blogs">
		<h1 style="text-transform: uppercase;">Lorem ipsum dolor sit amet</h1>

		<div class="blog_div">
			<div class="col-md-3">
			
			<a href=""><img src="assets/images/background/2.jpg" alt="" class="image" width="260px;"></a><br>
			</div>

			<div class="col-md-9">
				<h1 style="text-transform: uppercase;"><a href="">Lorem ipsum dolor sit amet</a></h1>
				<small style="padding: 2px 8px;">Saturday, 12-January-2019, &nbsp;<i class="fa fa-user"></i>&nbsp;Admin</small><br><br>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impedit possimus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecati? Enim, <a href="blog_details.php" class="btn btn-sm ">Click to read</a></p>

			</div>


		</div>

		<div class="blog_div">
			<div class="col-md-3">
			
			<img src="assets/images/background/2.jpg" alt="" class="image" width="260px;">
			</div>

			<div class="col-md-9">
				<h1 style="text-transform: uppercase;">Lorem ipsum dolor sit amet</h1>
				<small style="padding: 2px 8px;">Saturday, 12-January-2019, &nbsp;<i class="fa fa-user"></i>&nbsp;Admin</small><br><br>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impedit possimus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecati? Enim, <a href="blog_details.php" class="btn btn-sm">Click to read</a></p>

			</div>

		</div>

		<ul class="list-inline">
			<<<?php for ($i = 0; $i <10; $i++) { ?>
				<li style="text-decoration: none; font-size: 18px;"><a href="<?php echo $i; ?>"><?php echo $i; ?></a></li>
		
		<?php	} ?>>>
			
		</ul>
	</div>



</div><!-- main container end-->
	


<?php include('footer.php'); ?>