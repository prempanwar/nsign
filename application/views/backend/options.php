<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Edit Options</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active">Edit Options</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $this->session->flashdata('success_msg'); ?> 

            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <?php 
                            if (!empty($options)): 
                                foreach ($options as $row): ?>
                                    <div class="form-group">
                                        <label class="col-md-2"><?php echo $row->option_name ?><span class="error">*</span></label>
                                        <div class="col-md-6">
                                            <?php 
                                            if($row->id==15) {
                                                ?>
                                                <textarea name="<?php echo trim($row->option_name) ?>" placeholder="Enter short about us" class="form-control" rows="10"><?php echo $row->option_value?></textarea>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input type="text" name="<?php echo trim($row->option_name) ?>" placeholder="<?php echo $row->option_name ?>" class="form-control"  value="<?php echo $row->option_value?>">
                                                <?php
                                            }
                                            echo form_error(trim($row->option_name)); 
                                        ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- left column -->
            <div class="col-md-5">
                <!-- Horizontal Form -->         
            </div>
        </div>
        <!--/.col (left) -->
</div>