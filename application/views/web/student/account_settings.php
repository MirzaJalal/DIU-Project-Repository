
<!--category-->
<div class="container category_section" style="padding:20px 15px">

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
  min-height: 740px;
}
</style>
<div class="row">

 <div class="row prdsofile">
  <div class="col-md-3">
    <div class="profile-sidebar">

      <div class="profile-usermenu">
        <h2 class="text-center"><!-- <i class="fa fa-cog fa-3x text-center"></i> -->
         <a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-button ">

           <?php if(!empty($profile->image)) :?>
            <img src="<?php echo base_url();?>uploads/student/<?php echo $profile->image; ?>" style="width: 150px; height: 150px; border-radius: 100%;" alt="">

            <?php else: ?>
              <img src="<?php echo base_url();?>uploads/student/default.png" style="width: 150px; height: 150px; border-radius: 100%;" alt="">

            <?php endif; ?>

          </a>
          <br><?php echo $student->name; ?>
        </h2>

       <!--  <ul class="nav">
          <li class="active">
            <hr>
            <p class="text-center"> Upload Instructions</p><hr>
            <p style="padding-left: 10px;">1. Don't upload other works 
             <br>2. Upload only if you have proper authorization and rights also
             <br>3. Don't use violent image/thumnails
             <br>4. Using low size image is not recommend at all

           </p>

         </li>

       </ul> -->
     </div>
     <!-- END MENU -->
   </div>
 </div>
 <div class="col-md-9">
  <?php if($this->session->success): ?>

    <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
  <?php  endif; ?>
  <?php echo form_open_multipart('web/student/update_account'); ?>
  <div class="profile-content">
    <div class="col-md-12">
      <h2>Student Account Settings</h2>
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="<?php echo $student->name; ?>" placeholder="Enter your name" class="form-control">
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="">Student ID</label>
        <input type="text" name="student_id"  value="<?php echo $student->student_id; ?>"  placeholder="Enter student id" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Department</label>
        <select name="project_category_id"  class="form-control">
          <option value="" disabled="" selected="">Select Department</option>
          <?php foreach($departments as $department){?>
            <option value="<?php echo $department->id; ?>" <?php if($department->id == $student->department_id): ?> selected <?php endif; ?>><?php echo $department->department_name; ?></option>

          <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username"  value="<?php echo $student->username; ?>"  placeholder="Enter username" class="form-control" readonly>
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="mobile"  value="<?php echo $student->mobile; ?>"  placeholder="Enter mobile" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email"  value="<?php echo $student->email; ?>"  placeholder="Enter email" class="form-control">
      </div>

    </div>




    <div class="col-md-12">
      <div class="form-group">
        <label for="">Address</label>
        <input type="text" name="address"  value="<?php echo $student->address; ?>"  placeholder="Enter email" class="form-control">
      </div>

    </div>

    

    

    <div class="col-md-1">
      <button class="btn btn-success" type="submit">Update profile</button>

    </div>



  </div>
  <?php echo form_close(); ?>
</div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
