
		<!--sidebar end--> 	
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet">
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- Basic Forms & Horizontal Forms-->
		<div class="row">
			<?php if($this->session->success): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<p class="alert alert-success" id="message"><?php echo $this->session->success?></p>
			
			</div>
			<?php endif; ?>

			<?php if($this->session->error): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<p class="alert alert-error" id="message"><?php echo $this->session->error?></p>
			</div>
			<?php endif; ?>
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<i class="fa fa-check-circle"></i>   ফি সহ আবেদন সমূহ
					</header>
					<div class="panel-body">
						<table id="example" class="table table-striped table-hover dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>আইডি</th>
									<th>প্রতিষ্ঠানের নাম</th>
									<th>উপজেলা</th>
									<th>মোবাইল</th>
									<th>ইমেইল</th>
									<th>ওয়েব এড্রেস</th>
									<th>তারিখ</th>
									<th >--</th>
								</tr>
							</thead>
							<tfoot>
							</tfoot>
							<tbody>
								<?php 
								$originalDate = "2010-03-21";
								$newDate = date("d-m-Y", strtotime($originalDate));
								?>
								<?php $i = 1; foreach ($users as $user) { ?>
									
								
								<tr>
									<td style="font-family:SutonnyMJ; font-size:18px;"><?php echo $i;?></td>
									<td><?php echo $user->organization_name;?> </td>
									<td> <?php echo $user->upozila;?> </td>
									<td> <?php echo $user->mobile;?> </td>
									<td> <?php echo $user->email;?> </td>
									<td  > <?php echo $user->website;?> </td>
									<td style="font-family:SutonnyMJ; font-size:18px;"> <?php echo date("d-m-Y", strtotime($user->last_update)) ;?></td>
									
									<td >
									<?php if($user->status == 'active'){ ?>
											<a  class="btn btn-success" href="<?php echo base_url();?>admin/update_status/<?php echo $user->user_id;  ?>/pending" onclick="return confirm('are you sure to make user pending?')">Active </a>
											
									<?php	} else{?>

										<a  class="btn btn-warning" href="<?php echo base_url();?>admin/update_status/<?php echo $user->user_id;  ?>/active" onclick="return confirm('are you sure to make user active?')">Pending </a>
											
									
									<?php }?>
										
						<!--<button type="submit" class="btn btn-info">	<i class="fa fa-mobile"> </i></button>-->

						<a  class="btn btn-success" href="<?php echo base_url();?>admin/user_api/<?php echo $user->user_id;  ?>" >	<i class="fa fa-mobile"> </i> </a>
						 <a class="btn btn-danger" href="<?php echo base_url();?>admin/delete_user/<?php echo $user->user_id;?>" onclick="return confirm('are you sure?')"><i class="fa fa-trash-o"> </i>  </a></td>
								</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
		<!-- Inline form-->
	</section>
</section>
<!--main content end-->

