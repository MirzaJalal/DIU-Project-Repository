
<!--category-->
<div class="container category_section" style="padding:40px 15px">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Blog</h3>
            <hr>
            <!-- home page thum -->
            <style>
                .thum-post-list {
                    clear: both;
                    padding-left: 10px;
                    padding-top: 10px;
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

                <!-- end homepage thum -->
            </div>
        </div>
        <br> </div>
        <!--#category-->
        <!--ad-->

        <!--#ad-->
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Recent Blogs</h3>
                    <hr>
                    <!-- home page thum -->
                    <div class="row">
                        <?php foreach($blogs as $blog){ ?>
                            <div class="col-md-3">
                                <!-- single-->
                                <div class="post_item">
                                    <a href="<?php echo base_url(); ?>blog/view/<?php echo $blog->blog_id; ?>">

                                        <?php if(!empty($blog->thumb)): ?>
                                            <div class="features_image" style="background-image:url(<?php echo base_url(); ?>uploads/blog/235X180/<?php echo $blog->thumb; ?>)"></div>

                                            <?php else: ?>


                                                <div class="features_image" style="background-image:url(<?php echo base_url(); ?>uploads/blog/default.png)"></div>
                                            <?php endif; ?>

                                            <h3 style="max-height: 36px;overflow: hidden;text-overflow: ellipsis;"><?php echo $blog->blog_title; ?></h3>
                                            <p class="post_info"><i class="fa fa-newspaper-o"></i> <?php echo $blog->category_title; ?> &nbsp;&nbsp;&nbsp;  <i class="fa fa-clock-o"></i> <?php echo date('M d, Y',strtotime($blog->create)); ?> </p>
                                        </a>
                                    </div>
                                    <!-- single-->
                                </div>
                            <?php } ?>



                        </div>
                        <!-- end homepage thum -->
                    </div>
                </div>
                <br> </div>
                <hr>
