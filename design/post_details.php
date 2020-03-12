<?php include("header.php"); ?>
<!-- main container -->
<div class="container-fluid">
	<div class="posts">


		<div class="col-md-4">
			<h2>PHP</h2>
			<ul class="list-group">
				<li class="list-group-item"><i class="fa fa-check-circle-o"></i>&nbsp;<a href="#">Lorem ipsum dolor sit amet, consect</a></li>
				<li class="list-group-item"><i class="fa fa-check-circle-o"></i>&nbsp;<a href="#">Lorem ipsum dolor sit amet, consect</a></li>
				<li class="list-group-item"><i class="fa fa-check-circle-o"></i>&nbsp;<a href="#">Lorem ipsum dolor sit amet, consect</a></li>
				<li class="list-group-item"><i class="fa fa-check-circle-o"></i>&nbsp;<a href="#">Lorem ipsum dolor sit amet, consect</a></li>
				<li class="list-group-item"><i class="fa fa-check-circle-o"></i>&nbsp;<a href="#">Lorem ipsum dolor sit amet, consect</a></li>
			</ul>

		</div>

		<div class="col-md-8">
			<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, voluptate!</h2>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impeditmus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impeditmus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, <br> aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi </br> distinctio vitae impeditmus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecat.<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impeditmus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecat.<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, aliquam sunt debitis amet. Voluptas sit quis, officia cum ullam libero corporis debitis animi, iste inventore illum ratione! Magnam vel veritatis iure consequuntur, maiores, quasi dolores non debitis modi distinctio vitae impeditmus minima, mollitia fugit et repellendus fuga. Quidem doloribus ad necessitatibus amet obcaecat.</p>

			<br><br>

<pre class="">
			 
/*
!----------------------------------------------
!    Roll Generate For Application
!---------------------------------------------
*/
public function rollGenerate($niog_type)
{
    $roll = 1;
    $stmt = $this->dbObj->link->query("select * from apply where niog_type='$niog_type' order  by applyid desc limit 1") or die($this->dbObj->link->error);
    if ($stmt) {
        if ($stmt->num_rows > 0) {
            $applydata = $stmt->fetch_assoc();
            $roll      = $applydata['apply_roll'] + 1;
            
        }
    }
    return $roll;
    
}


/*
!----------------------------------------------
!    Generate Tracking ID For Application
!---------------------------------------------
*/
public function trackingIDGenerate($niog_type, $post_name)
{
    $tracking_id = 100001;
    
    $stmt = $this->dbObj->link->query("select * from apply where niog_type='$niog_type' order  by applyid desc limit 1") or die($this->dbObj->link->error);
    if ($stmt) {
        if ($stmt->num_rows > 0) {
            $applydata   = $stmt->fetch_assoc();
            $tracking_id = str_pad($applydata['tracking_id'] + 1, 6, 0, STR_PAD_LEFT);
        }
    }
    return $tracking_id;
}
</pre>


		</div>
	
	</div>


</div><!-- main container end-->
	


<?php include('footer.php'); ?>