
<!--category-->
<div class="container category_section" style="padding:20px 15px">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Departments</h3>
            <hr>
            <!-- home page thum -->
            <style>
                tr,th,td{
                    padding: 15px !important;
                }
            </style>
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>SL</th>
                            <th>Department  Name</th>
                            
                            <th>Total Project</th>
                            <th>-</th>
                        </thead>

                        <tbody>


                            <?php $i=1; foreach ($departments as $department) { ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $department->department_name; ?></td>

                                    <td><?php echo $department->total_project; ?></td>

                                    
                                    
                                    <td>
                                      

                                        <a href="<?php echo base_url(); ?>department_wise_project/<?php echo $department->id ?>/1" class="btn btn-sm btn-primary text-center"><i class="fa fa-folder-open "></i></a></td>
                                </tr>
                                <?php  $i++; } ?>

                            </tbody>


                        </table>

                      
                    </div>
                </div>
                <br> </div>

                <script>
                   // $(document).ready(function() {
                    function workFunction()
                    {
                        alert('You must have to login for downloading file');
                        window.location = '<?php echo base_url(); ?>student/';
                    }
                        // $('.workFunction').click(function(event) {
                           
                        // });
                    // });
                </script>
                <!--#category-->
                <!--ad-->

                <!--#ad-->
