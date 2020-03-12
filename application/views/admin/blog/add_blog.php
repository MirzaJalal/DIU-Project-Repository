
<div class="main-content">
    <?php if($this->session->success): ?>
        <div class="alert bg-primary alert-primary text-white" id="message" role="alert">
          <?php echo $this->session->success ;?>
      </div>
  <?php endif; ?>
  <?php if($this->session->error): ?>
    <div class="alert bg-warning alert-warning text-white" id="message" role="alert">
      <?php echo $this->session->error ;?>
  </div>
<?php endif; ?>   

<div class="container-fluid">
 <div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-list bg-blue"></i>
                <div class="d-inline">
                    <h5>Add Blog</h5>
                    <span>Blog will be saved in database</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>admin/dashboard"><i class="ik ik-home"></i>&nbsp; Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>admin/blog/blog_list">Blog List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Add Blog</h3></div>
            <div class="card-body">
             <!--  <form class="forms-sample"> -->
                <?php echo form_open_multipart('admin/blog/save_blog', array('class'=>'forms-sample')); ?>
                <div class="form-group">
                    <label for="exampleInputName1">Blog Title</label>
                    <input type="text" name="blog_title" class="form-control" id="exampleInputName1" required="" placeholder="Enter Page Tile ">
                </div>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleSelectGender">Blog Category</label>
                        <select name="tbcid" class="form-control" required="" id="post-category-dropdown">
                            <option selected="" disabled="" selected="">Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->tbcid; ?>"><?php echo  $category->category_title; ?></option>
                            <?php       } ?>
                            
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Blog Image</label>
                        <input type="file" name="blog_attachment" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                </div>

                <div class="col-md-12">
                   <div class="form-group">
                    <label for="exampleInputName1">Blog Slug</label>
                    <input type="text" name="blog_slug" required="" placeholder="Example: php-learning-awesome" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                <label for="exampleInputName1">Blog Tag</label>
                <select name="tagid[]" class="form-control" id="tags-dropdown" multiple="multiple">
                    <option>Select Tags</option>
                    <?php foreach ($tags as $tag) { ?>
                        <option value="<?php echo $tag->tagid; ?>"><?php echo  $tag->tag_name; ?></option>
                    <?php       } ?>
                    
                    
                </select>
            </div>
        </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="exampleInputName1">Blog Status</label>
            <select name="blog_status" class="form-control" required="">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="pending">Pending</option>
                
            </select>
        </div>
    </div>

</div>

<div class="form-group">
    <label for="exampleTextarea1">Blog Details</label>
    <textarea class="form-control" name="blog_description" id="editor1" rows="4"></textarea>
</div>
<button type="submit" class="btn btn-primary mr-2">Submit</button>
<button class="btn btn-light" onclick="return (confirm('are you sure to remove contents?'))">Cancel</button>
<?php echo form_close(); ?>
</div>
</div>
</div>



</div>


</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/admin/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<script>
 CKEDITOR.replace( 'editor1' );
 $('#post_tag').tagsinput();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
                   // $(document).ready(function() {
                       $('#post-category-dropdown').select2();
                       $('#tags-dropdown').select2({
                        tags: true,
                        tokenSeparators: [',', ' ']

                    });
                       
                   // });
                   
               </script>


