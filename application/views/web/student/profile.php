<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!--category-->
<div class="container" style="padding:20px 15px">

  <style>
        /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}

</style>
<div class="row">

 <div class="row profile">
  <div class="col-md-3">
    <div class="profile-sidebar">
      <!-- SIDEBAR USERPIC -->
      <div class="profile-userpic">

        <a href="#" <?php if($this->session->student && $this->session->student_id == $profile->id): ?> onclick="document.getElementById('id01').style.display='block'"  <?php endif; ?> class="w3-button ">
          <?php if(!empty($profile->image)) :?>

            <img src="<?php echo base_url();?>uploads/student/<?php echo $profile->image; ?>" alt="">


            <?php else: ?>
             <img src="<?php echo base_url();?>uploads/student/default.png" alt="">

           <?php endif; ?>


         </a>


       </div>
       <!-- END SIDEBAR USERPIC -->
       <!-- SIDEBAR USER TITLE -->
       <div class="profile-usertitle">
        <div class="profile-usertitle-name">
         <?php echo $profile->name; ?>
       </div>
       <div class="profile-usertitle-job">
        <?php echo $profile->designation; ?>
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->


        <!-- <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Follow</button>
          <button type="button" class="btn btn-danger btn-sm">Message</button>
        </div> -->


        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="#">
                <i class="fa fa-home"></i>
              Overview </a>
            </li>
            <?php if($this->session->student && $this->session->student_id == $profile->id) : ?>
              <li>
                <a href="<?php echo base_url();?>student/account_settings">
                  <i class="fa fa-cog"></i>
                Edit Profile </a>
              </li>

              <li>
                <a href="<?php echo base_url();?>upload">
                  <i class="fa fa-upload"></i>
                Upload Project </a>
              </li>

            <?php endif; ?>
            <li>
              <?php if(in_array($this->session->student_id, $followers)): ?>
                <a href="<?php echo base_url();?>unfollow/<?php echo $profile->id; ?>">
                  <i class="fa fa-handshake-o"></i>Following </a>
                  <?php else: ?>

                    <?php if($this->session->student_id != $profile->id): ?>

                      <a href="<?php echo base_url();?>follow/<?php echo $profile->id; ?>">
                        <i class="fa fa-handshake-o"></i>Follow </a>

                      <?php endif; ?>


                    <?php endif; ?>
                  </li>

       <!--  <li>
          <a href="#">
            <i class="fa fa-phone"></i>
          Help </a>
        </li> -->
      </ul>
    </div>
    <!-- END MENU -->
  </div>
</div>
<div class="col-md-9">
  <?php if($this->session->success): ?>

    <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
  <?php  endif; ?>
  <div class="profile-content">
    <div class="col-md-12">
      <table class="table table-bordered table-striped">
        <thead>
          <th width="5%">SL</th>
          <th width="15%">Project Name</th>
          <th width="15%">Project ID</th>
          <th width="15%">Category</th>
          <th width="15%">Uploaded On</th>
          <th width="10%">Status</th>
          <th width="10%">Views</th>
          <th width="15%">-</th>
        </thead>

        <tbody>


          <?php $i=1; foreach ($projects as $project) { ?>

            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $project->project_title; ?></td>
              <td><?php echo $project->project_id; ?></td>
              <td><?php echo $project->category_name; ?></td>
              <td><?php echo date('d-m-Y',strtotime( $project->created_at)); ?></td>
              <td><?php echo ucfirst($project->status); ?></td>

              <td><?php echo $project->page_count; ?></td>
              <td>


                <a href="<?php echo base_url();?>download/<?php echo $project->project_id; ?>/" class="btn btn-sm btn-success text-center"><i class="fa fa-download "></i></a> &nbsp;&nbsp; 


                <a href="<?php echo base_url().'project/view/'.$project->project_id; ?>" class="btn btn-sm btn-primary text-center"><i class="fa fa-eye "></i></a></td>
              </tr>
              <?php  $i++; } ?>

            </tbody>


          </table>


          <nav aria-label="Page navigation example">
            <span>You are viewing page <strong><?php echo $page; ?></strong> of total <?php echo $pages; ?> pages;</span>
            <ul class="pagination">
              <?php
              if($page !=1 ): ?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $previous_page; ?>">Previous</a></li>
              <?php endif; ?>

              <?php for($j = 1; $j<=$pages; $j++){ ?>

                <li class="page-item <?php if($j  == $page): ?> active <?php endif; ?>"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $j; ?>"><?php echo $j; ?></a></li>
              <?php } ?>
              <?php
              if($page !=$pages ): ?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url(); ?>project/<?php echo $next_page; ?>">Next</a></li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>



  <!-- modal -->
  <div class="w3-container">



    <div id="id01" class="w3-modal">
      <div class="w3-modal-content" style="max-width: 400px;">
        <?php echo form_open_multipart('web/student/upload_profile_pic', array('class'=>'forms-sample')); ?>
        <div class="w3-container" >
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <div class="form-group">
            <label for="">Change Profile Picture</label>
            <input type="file" name="image" class="form-control">
            <br>
            <button type="submit" class="btn btn primary">Upload</button>
          </div>
        </div>
        <form>
        </div>
      </div>
    </div>
    <!-- modal -->
    <!--#category-->
    <!--ad-->

    <!--#ad-->
