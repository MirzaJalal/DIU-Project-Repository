
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
  min-height: 2000px;
}
</style>
<div class="row">

 <div class="row profile">

  <div class="col-md-9">
    <?php if($this->session->success): ?>

      <p class="alert alert-success"><?php echo $this->session->success;  ?></p>
    <?php  endif; ?>
    <div class="profile-content">

      <h1 class="text-center"><?php echo$blog->blog_title; ?>
      <hr>
      <span style="font-size: 18px;">Blog Category: <?php echo$blog->category_title; ?></span>
      <hr>


      <span style="font-size: 16px;">Posted on: <?php echo date('M,d -Y',strtotime($blog->create)); ?></span>


    </h1>

    <div class="col-md-12">

      <h2>Description</h2>
      <hr>
      <?php echo$blog->blog_description; ?>

    </div>
    <div class="col-md-6">

      <h2 class="text-left">Thumbnail</h2>
      <img src="<?php echo base_url();?>uploads/blog/fullwidth/<?php echo $blog->blog_attachment; ?>/" class="img img-thumbnail" alt="">

    </div>



  </div>


</div>
<div class="col-md-3 profile-content">
  <ul>
    Categories <hr>
    <?php foreach ($categories as $category ) { ?>


      <li><a href="<?php echo base_url();?>blog/category/<?php echo $category->tbcid; ?>"><?php echo $category->category_title; ?></a></li>
    <?php    } ?>
    

  </ul>
</div>
</div>

<!--#category-->
<!--ad-->

<!--#ad-->
