
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
                        <h5>Page Categories</h5>
                        <span>Page Categories will differentiate several posts</span>
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
                        <li class="breadcrumb-item active" aria-current="page">Page Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-block">
                    <h3>Page Categories</h3>
                </div>
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="multi-colum-dt"
                        class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th width="10%">Serial</th>
                                <th width="30%">Category Title</th>
                                <th width="25%">Created At</th>
                                <th width="25%">Updated At</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($page_categories as $page_category) { ?>


                                <tr>
                                    <td style="text-align: center;"><?php echo $i;?></td>
                                    <td><?php echo $page_category->category_title;?></td>
                                    <td><?php echo date('d-m-y H:iA',strtotime($page_category->created_at));?></td>
                                    <td><?php echo date('d-m-y H:iA',strtotime($page_category->updated_at));?></td>
                                    <td>
                                     <a href="#" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $i+2; ?>"><i class="ik ik-edit"></i></a>

                                     <div class="modal fade" id="exampleModalCenter<?php echo $i+2; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                        <?php echo form_open('admin/page/update_page_cat/'.$page_category->tpcid,array('class'=>''));?>
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title " id="exampleModalCenterLabel">Edit Page Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Category Title</label>
                                                        <input type="text" name="category_title" value="<?php echo $page_category->category_title;?>" class="form-control" id="exampleInputName1" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <!-- edit end-->

                                <a href="<?php echo base_url();?>admin/page/delete_page_cat/<?php echo $page_category->tpcid;?>" class="btn btn-icon btn-warning" onclick="return(confirm('are you sure to delete?'))"><i class="ik ik-trash"></i></a>

                                <a href="#" class="btn btn-icon btn-info" ><i class="ik ik-alert-circle"></i></a>



                            </td>
                        </tr>
                        <?php  $i++;} ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Serial</th>
                            <th>Category Title</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <?php echo form_open('admin/page/save_page_category',array('class'=>''));?>
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title " id="exampleModalCenterLabel">Add Page Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName1">Category Name</label>
                    <input type="text" name="category_title" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>
</form>


