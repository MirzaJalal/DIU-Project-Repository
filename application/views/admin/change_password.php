
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
                    <h5>Change Password</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url();?>admin/dashboard"><i class="ik ik-home"></i>&nbsp; Dashboard</a>
                    </li>
                  
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Change Password</h3></div>
            <div class="card-body">
               <!--  <form class="forms-sample"> -->
                <?php echo form_open_multipart('admin/admin/update_password', array('class'=>'forms-sample')); ?>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter password" required=""> 
                </div>
                <button type="submit" class="btn btn-primary mr-2" >Update</button>
                <button class="btn btn-light" >Cancel</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

</div>
</div>
