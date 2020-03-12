
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
                    <h5>Settings</h5>
                    <span>Settings will be saved in database</span>
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
                        <a href="<?php echo base_url();?>admin/post_list">Settings List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Settings</h3></div>
            <div class="card-body">
               <!--  <form class="forms-sample"> -->
                <?php echo form_open_multipart('admin/admin/save_settings', array('class'=>'forms-sample')); ?>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Site Name</label>
                            <input type="text" name="site_name" class="form-control" id="site_name" value="<?php echo $website[0]->site_name; ?>" placeholder="Enter site name ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Site Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1"  value="<?php echo $website[0]->title; ?>" placeholder="Enter Site Tile ">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectGender">Select Highlightjs CSS</label>
                            <select name="highlighter" class="form-control" required="" id="post-category-dropdown">
                                <option selected="" disabled="">Select</option>
                                <?php foreach ($highlights as $highlight) { ?>
                                    <option value="<?php echo $highlight; ?>" <?php if($highlight == $website[0]->highlighter.".css"): ?>  selected="" <?php endif; ?>><?php echo  $highlight; ?></option>
                                <?php       } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Logo</label>
                            <input type="file" name="logo" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" name="email" value="<?php echo $website[0]->email; ?>" placeholder="Enter email of site" class="form-control" required="">
                    </div>
                </div>

                <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleInputName1">Mobile</label>
                    <input type="text" name="mobile"  value="<?php echo $website[0]->email; ?>"  class="form-control">
                </div>
            </div>

            <div class="col-md-6">
             <div class="form-group">
                <label for="exampleInputName1">Address</label>
                <input type="text" name="address"  value="<?php echo $website[0]->address; ?>"  class="form-control">
            </div>
        </div>


        <div class="col-md-6">
         <div class="form-group">
            <label for="exampleInputName1">Facebook</label>
            <input type="text" name="facebook"  value="<?php echo $website[0]->facebook; ?>"  class="form-control">

        </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
        <label for="exampleInputName1">Youtube</label>
        <input type="text" name="youtube"  value="<?php echo $website[0]->youtube; ?>"  class="form-control">

    </div>
</div>

<div class="col-md-6">
 <div class="form-group">
    <label for="exampleInputName1">Github</label>
    <input type="text" name="github"  value="<?php echo $website[0]->github; ?>"  class="form-control">

</div>
</div>


</div>

<div class="form-group">
    <label for="exampleTextarea1">Short Introduction</label>
    <textarea class="form-control" name="short_introduction" id="editor1" rows="4">
        <?php  echo $website[0]->short_introduction;  ?>
    </textarea>
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
                    

                   // });
                   
               </script>


