<?php // echo sha1(md5('1'));; ?>
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
  min-height: 1200px;
}
</style>
<div class="row">


 <div class="row profile">

  <div class="col-md-12">
    <?php if($this->session->success): ?>

      <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
    <?php  endif; ?>
    <div class="profile-content">

      <h1 class="text-center"><?php echo $project->project_title; ?>
      <hr>
      <span style="font-size: 18px; ">

       <?php if(!empty($project->image)): ?>

        <img src="<?php echo base_url(); ?>uploads/student/<?php echo $project->image; ?>" style="width: 60px; height: 60px;" alt="">

        <?php  else: ?>
          <img src="<?php echo base_url(); ?>uploads/student/default.png" style="width: 60px; height: 60px; border-radius: 100%;" alt="">
        <?php  endif; ?>


        Author : <a href="<?php echo base_url(); ?>student/profile/<?php echo $project->username; ?>"> <?php echo $project->name; ?> </a></span>
        <hr>

        <span style="font-size: 16px;">Views: <?php echo $project->page_count; ?></span>

        l <span style="font-size: 16px;">Download: <?php echo $project->download_count; ?></span>
        l <span style="font-size: 16px;">Uploaded on: <?php echo date('d-m-Y',strtotime( $project->created_at)); ?></span>

        l <a href="#rating-section"><span style="font-size: 14px; "> <i class="fa fa-star" style="color: #FFD700  ;"></i><i class="fa fa-star" style="color: #FFD700  ;"></i><i class="fa fa-star" style="color: #FFD700  ;"></i></span> 

          <?php
          if ($total_rating > 0) { $rating_value = $total_rating/count($ratings);
         

           ?>
           <?php echo number_format((float)$rating_value, 2, '.', '');  ?> out of <?php echo count($ratings);   }?> 
        </a>
        
      </h1>

      <div class="col-md-12">

        <h2>Documentation</h2>
        <hr>
        <?php echo $project->documentation; ?>


        <br><br><br>

        <h2>Requirement Analysis</h2><hr>
        <?php echo $project->requirement_analysis; ?>

        <br><br><br>

        <h2>Summary</h2><hr>
        <?php echo $project->summary; ?>

        <br><br><br>


      </div>
      <div class="col-md-6">

        <h2 class="text-left">Thumbnail</h2>
        <img src="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->thumbnail; ?>" class="img img-thumbnail" alt="">

      </div>

      <div class="col-md-6">

        <h2 class="text-left">Flowchart</h2>
        <img src="<?php echo base_url();?>uploads/project/<?php echo $project->project_id; ?>/<?php echo $project->flowchart; ?>" class="img img-thumbnail" alt="">

      </div>


      <div class="col-md-6">
        <h2 class="text-left">Donwload</h2>

        <a href="<?php echo base_url();?>download/<?php echo $project->project_id; ?>" class="btn btn-primary"   onclick="return(confirm('download?'))">Download Project</a>
        <br>

      </div>



      <div class="row">
        <div class="col-md-12">
          <h2>Comment</h2>
          <div class="form-group">
            <?php echo form_open_multipart('project/save_comment'); ?>
            <label for="">Enter your comment</label>
            <textarea name="comment" id="rating-section" cols="4" rows="5" required="" class="form-control"></textarea>
            <br>
            <?php if($this->session->student): ?>
              <input type="submit" class="btn btn-primary" value="Comment">
              <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">

            </form>
            <br>

            <?php if($this->session->student_username !== $project->username): ?> 
            <?php echo form_open_multipart('project/save_rating'); ?>

            <label for="">Rating for project </label>


            
            <input type="number" id="rating_section" name="rate" placeholder="Give 1 to 5" min="1" max="5" style="width:100px; text-align: center;" required=""> 
            <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
            <button href="" class="btn btn-primary btn-sm">rate</button>
            <br>
            
            <!--  <input type="hidden" name="project_id" value="<?php //echo $project->id; ?>"> -->


          </form>

        <?php endif; ?>


          <?php if($this->session->error): ?> 
            <?php echo $this->session->error; ?>


          <?php endif; ?>

          <?php if($this->session->success): ?> 
            <?php echo $this->session->success; ?>

          <?php endif; ?>

          <?php else: ?>
            <h4 id="rating-section">You must have to login to comment & rating</h4>
          <?php endif; ?>
        </div>


        <ul class="list-group">

          <?php foreach ($comments as $comment) {?>

            <li class="list-group-item">


             <ul style="list-style: none; display: inline-block;">
              <li>
                <?php if(!empty($comment->image)): ?>

                 <img src="<?php echo base_url(); ?>uploads/student/<?php echo $comment->image; ?>" style="height: 50px; width: 50px; border-radius: 100%;" alt="">

                 <?php else: ?>
                   <img src="<?php echo base_url(); ?>uploads/student/default.png" style="height: 50px; width: 50px; border-radius: 100%;" alt="">

                 <?php endif; ?>
                 <strong><?php echo $comment->name; ?></strong>  
                 <span class="text-right" style="padding-left: 20px; font-size: 14px;"><?php echo date('h:i:sA d-m-Y',strtotime($comment->comment_time)) ?></span>
               </li>
               <li><small><?php echo $comment->comment; ?></small></li>
             </ul>

           </li>

         <?php } ?> 

       </ul>


     </div>

     <br>

   </div>
 </div>
</div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
