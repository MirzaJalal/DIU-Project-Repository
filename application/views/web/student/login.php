
<!--category-->
<div class="container category_section" style="padding:40px 15px">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Student Login</h3>
            <hr>
            <!-- home page thum -->
            <style>
                .thum-post-list {
                    clear: both;
                    padding-left: 10px;
                    
                }

                .thum-post-list li {
                    margin-left: 10px;
                    padding-top: 10px;
                    white-space: nowrap;
                    list-style: none;
                }

                .thum-post-list li a {
                    color: #333;
                    text-decoration: none;
                }

                .thum-post-list li:before {
                    content: "\f0c1";
                    /* FontAwesome Unicode */
                    font-family: FontAwesome;
                    display: inline-block;
                    margin-left: -1.3em;
                    /* same as padding-left set on li */
                    width: 1.3em;
                    /* same as padding-left set on li */
                }

                .thum-post-list li a:hover {
                    color: #3498DB;
                }

                .homepage-box {
                    width: 100%
                }
            </style>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <!--widget-->
                    <div class="dash_widget_1 dwc3">
                        <div class="icon"> <a href="<?php echo base_url(); ?>student/register" style="color:#fff;"><i class="fa fa-user-plus fa-3x"></i> 
                           <br>Don't have account? Register</a>

                       </div>
                       <div class="divider"></div>

                       <div class="content"> <a href="#"><h2><i class="fa fa-lock"></i>&nbsp;Student Login</h2></a>


                        <!-- home page thum -->
                        <?php echo form_open_multipart('web/student/login', array('class'=>'forms-sample')); ?>
                        <label for="">Student ID</label>
                        <input type="text" name="student_id" class="form-control" placeholder="Enter your student id here" required="">

                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required="">

                        <?php 
                        if ($this->session->error) { ?>
                            <p class="" style="color: red;"><?php echo $this->session->error; ?></p>
                        <?php } ?>


                        <br>
                        <button type="submit" name="login" class="btn btn-success">Login</button>

                    </form>

                </div>
                <!--#widget-->

                <!-- end homepage thum -->
            </div>
        </div>
        <br> </div>
        <!--#category-->
        <!--ad-->

        <!--#ad-->
