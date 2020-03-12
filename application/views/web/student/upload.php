
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
        <h2 class="text-center"><i class="fa fa-upload fa-3x text-center"></i>
          <br>Upload Project
        </h2>

        <ul class="nav">
          <li class="active">
            <hr>
            <p class="text-center"> Upload Instructions</p><hr>
            <p style="padding-left: 10px;">1. Don't upload other works 
             <br>2. Upload only if you have proper authorization and rights also
             <br>3. Don't use violent image/thumnails
             <br>4. Using low size image is not recommend at all

           </p>

         </li>

       </ul>
     </div>
     <!-- END MENU -->
   </div>
 </div>
 <div class="col-md-9">
  <?php if($this->session->success): ?>

    <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
  <?php  endif; ?>

  <?php if($this->session->error): ?>

    <p class="alert alert-warning"><?php echo $this->session->error;  ?></p>
  <?php  endif; ?>

  
  <?php echo form_open_multipart('web/student/upload_project'); ?>
  <div class="profile-content">
    <div class="col-md-12">
      <div class="form-group">
        <label for="">Project Name</label>
        <input type="text" name="project_title" placeholder="Enter project name" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Department</label>
        <select name="department_id"  class="form-control">
          <option value="" disabled="" selected="">Select Department</option>
          <?php foreach($departments as $department){?>
            <option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>

          <?php } ?>
        </select>
      </div>
    </div>




    <div class="col-md-6">
      <div class="form-group">
        <label for="">Project Category</label>
        <select name="project_category_id"  class="form-control">
          <option value="" disabled="" selected="">Select Category</option>
          <?php foreach($categories as $category){?>
            <option value="<?php echo $category->id; ?>" ><?php echo $category->category_name; ?></option>

          <?php } ?>
        </select>
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-group">
        <label for="">Semester</label>
        <select name="semester"  class="form-control">
          <option value="" disabled="" selected="">Select Semester</option>
          
            <option value="1st Semester" >1st Semester</option>
            <option value="2nd Semester" >2nd Semester</option>
            <option value="3rd Semester" >3rd Semester</option>
            <option value="4th Semester" >4th Semester</option>
            <option value="5th Semester" >5th Semester</option>
            <option value="6th Semester" >6th Semester</option>
            <option value="7th Semester" >7th Semester</option>
            <option value="8th Semester" >8th Semester</option>
            <option value="9th Semester" >9th Semester</option>
            <option value="10th Semester" >10th Semester</option>
            <option value="11th Semester" >11th Semester</option>
            <option value="12th Semester" >12th Semester</option>
         
        </select>
      </div>
    </div>

    

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Project Upload by</label>
        <input type="text" value="<?php echo $this->session->student_username;?>" class="form-control" readonly>

        <input type="hidden" name="author" value="<?php echo $this->session->student_id;?>" class="form-control" readonly>

      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Actors</label>
        <input type="text" name="actors" placeholder="Enter actors name" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Project Thumbnail</label>
        <input type="file" name="thumbnail" placeholder="Enter actors name" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Flowchart</label>
        <input type="file" name="flowchart" class="form-control">
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Report</label>
        <input type="file" name="report" class="form-control">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="">Zip File(Profile File)</label>
        <input type="file" name="zip_file" class="form-control">
      </div>

    </div>


    <div class="col-md-12">
      <div class="form-group">
        <label for="">Requirment Analysis</label>
        <textarea name="requirement_analysis"  cols="5" rows="3" class="form-control" placeholder="Write requiement analysis ehre"></textarea>
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="">Documentation</label>
        <textarea name="documentation"  cols="5" rows="3" class="form-control" placeholder="Write documentation here..."></textarea>
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="">Summary</label>
        <textarea name="summary"  cols="5" rows="3" class="form-control" placeholder="Write summary within 50 words..."></textarea>
      </div>

    </div>

    <div class="col-md-1">
      <button class="btn btn-success" type="submit">Submit</button>

    </div>

    


  </div>
  <?php echo form_close(); ?>
</div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
