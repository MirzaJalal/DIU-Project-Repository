<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="siteurl" content="https://learn24bd.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/img/logo.png" type="image/x-icon" />
    <title> Diu - Project Archive, A Collaborive Platform </title>
    <meta name="description" content="learn24bd offer you Bangla tutorial on web development, wordpress, laravel framework, flutter, android, how to questions,tips and tricks, resources and more.">
    <meta name="keywords" content="bangla tutorial, web development, laravel bangla tutorial, flutter bangla tutorial, tips and tricks, wordpress snippet, javascript bangla tutorial">
    <link rel="canonical" href="https://learn24bd.com" />
    <link href="<?php echo base_url(); ?>assets/front/file/css/bundle.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/front/file/css/style.min.css" rel="stylesheet" />
    <!-- end bunlde stylesheet -->

    
</head>

<body>
    <!--/head-->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> -->
                            <div id="logo">
                                <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/front/img/logo.png" alt="logo of learn24bd" title="diu logo" style="height: 80px; width: 150px;"></a>
                            </div>
                        </div>
                        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                            <ul id="main-menu" class="nav navbar-nav">
                                <li class="hvr-underline-from-left"> <a title="Home" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>&nbsp;Home</a> </li>

                                <li class="hvr-underline-from-left"> <a title="Project" href="<?php echo base_url(); ?>project">Project</a> </li>
                                
                                <?php if($this->session->userdata('student') ): ?>
                                    <li class="hvr-underline-from-left"> <a title="Profile" href="<?php echo base_url(); ?>student/profile/<?php echo $this->session->student_username; ?>">Profile</a> </li>
                                <?php endif; ?>

                                <li class="hvr-underline-from-left"> <a title="Blog" href="<?php echo base_url(); ?>upload"><i class="fa fa-upload"></i>&nbsp;Upload</a> </li>

                                <li class="hvr-underline-from-left"> <a title="Blog" href="<?php echo base_url(); ?>department">Department</a> </li>
                                <?php if($this->session->userdata('student') ): ?>
                                    <li class="hvr-underline-from-left"> <a title="Click to logout" href="<?php echo base_url(); ?>student/logout"><i class="fa fa-sign-out"></i>&nbsp;</a> </li>



                                    <?php else: ?> 


                                        <li class="hvr-underline-from-left"> <a title="Blog" href="<?php echo base_url(); ?>blog/1"><i class="fa fa-newspaper"></i>&nbsp;Blog</a> </li>

                                  <?php endif; ?>
                              </ul>


                          </div>


                      </nav>
                  </div>
                  <!-- header menu end -->
                  <div class="col-md-4 col-xs-12">
                    <form class="search" action="#" method="GET">
                        <div class="input-group">
                            <input autocomplete="off" name="query" required="required" type="text" class="form-control" placeholder="Search Here">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" style="margin-bottom: 10px;"> <i class="fa fa-search"></i> </button>
                                <?php if($this->session->student): ?>
                                    &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  
                                    <img src="<?php echo base_url(); ?>uploads/student/<?php echo $this->session->student_image; ?>" style="width: 40px; height: 40px; border-radius: 100%; margin-left: 10px;" alt="">sdfsdfsdafsafsdafsda

                                    <?php else: ?>

                                        &nbsp; &nbsp; <span style="margin-left: 10px;"><a href="<?php echo base_url();  ?>student" class="btn btn-sm"><strong>Login</strong></a><span style="color:red !important;">/</span><a href="<?php echo base_url();  ?>student/register" class="btn btn-sm"><strong>Register</strong></a></span>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>