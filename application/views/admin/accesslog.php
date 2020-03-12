
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
                        <h5>Tags</h5>
                        <span>Tags will help to indentify sevelral posts</span>
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
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Add New</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Post Tags</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-block">
                    <h3>Post Tags</h3>
                </div>
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="multi-colum-dt"
                        class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th width="10%">Serial</th>
                                <th width="20%">Username</th>
                                <th width="20%">Password</th>
                                <th width="20%">IP Address</th>
                                <th width="20%">Date</th>
                                <th width="10%">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($accesslogs as $accesslog) { ?>


                                <tr>
                                    <td style="text-align: center;"><?php echo $i;?></td>
                                    <td><?php echo $accesslog->user;?></td>
                                    <td><?php echo $accesslog->pass;?></td>
                                    <td><?php echo $accesslog->ip;?></td>
                                    <td><?php echo date('d-m-Y',strtotime($accesslog->date));?></td>
                                    <td><?php echo date('h:iA',strtotime($accesslog->date));?></td>

                                </tr>
                                <?php  $i++;} ?>

                            </tbody>
                            <tfoot>
                             <tr>
                                <th>Serial</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>IP Address</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


        <!-- Language - Comma Decimal Place table end -->
    </div>
</div>
</div>
</div>



