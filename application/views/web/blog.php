


<section id="sub_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blogs</h1>
            </div>
        </div>
    </div>
</section>


<div class="container" style="padding:40px 0">
    <div class="row">
        <div class="col-md-12">
            <div id="post_content">

                <div class="row">
                    <div class="col-md-9">

                       <?php foreach($blogs as $blog){ ?>
                        <div class="row">

                            <div class="col-md-4">
                                <!-- single-->
                                <div class="post_item">
                                    <div class="features_image"
                                    style="background-image:url('<?php echo base_url(); ?>uploads/blog/235X180/<?php echo $blog->thumb; ?>')"></div>
                                </div>
                                <!-- single-->
                            </div>
                            <div class="col-md-8">
                                <h3><a href="<?php echo base_url(); ?>blog/view/<?php echo $blog->blog_id; ?>"><?php echo $blog->blog_title; ?></a></h3>

                                <p class="post_info"><i class="fa fa-folder-o"></i> <a
                                    href="https://learn24bd.com/category/post-on-laravel-tips-&amp;-tricks"><?php echo $blog->category_title; ?></a>
                                    <i class="fa fa-clock-o"></i> <?php echo date('M d, Y: h:i:A',strtotime($blog->create)); ?></p>
                                </div>

                            </div>
                        <?php } ?>
                        <div>
                            <ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="blog?page=2">2</a></li><li><a href="blog?page=3">3</a></li> <li><a href="blog?page=2" rel="next">&raquo;</a></li></ul>                            </div>

                        </div>
                        <!--left side end-->

                        <div class="col-md-3">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Categories</h3>
                                </div>
                                <div class="list-group">
                                    <ul class="category_list">
                                        <?php foreach ($categories as $category ) { ?>

                                            <li><a href="<?php echo base_url(); ?>blog/category/<?php echo $category->tbcid; ?>"><?php echo $category->category_title; ?></a>
                                            <?php   } ?>

                                        </li>

                                    </ul>
                                </div>
                            </div>


                            <!--ad-->
                            <div style="padding: 15px 0;">
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- L24-BLOG-SIDEBAR -->
                                <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-3504130981820986"
                                data-ad-slot="2626204126"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                            <!--ad-->


                        </div>

                    </div>

                </div>
            </div>
        </div>
        <br>
    </div>



    <hr>
