<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Edit Delivery Charge</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active">Edit Delivery Charge</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <?php echo $this->session->flashdata('success_msg'); ?> 
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <?php 
                            foreach ($data as $row): ?>
                                <div class="form-group">
                                    <label class="col-md-2">Product Range From<span class="error">*</span></label>
                                    <div class="col-md-2">
                                        <input type="text" name="data[<?php echo $row->dc_id ?>][range_from]" placeholder="<?php echo $row->range_from ?>" class="form-control" value="<?php echo $row->range_from?>" required="">
                                    </div>
                                    <label class="col-md-2">Product Range To<span class="error">*</span></label>
                                    <div class="col-md-2">
                                        <input type="text" name="data[<?php echo $row->dc_id ?>][range_to]" placeholder="<?php echo $row->range_to ?>" class="form-control" value="<?php echo $row->range_to?>" required="">
                                    </div>
                                    <label class="col-md-2">Price<span class="error">*</span></label>
                                    <div class="col-md-2">
                                        <input type="text" name="data[<?php echo $row->dc_id ?>][price]" placeholder="<?php echo $row->price ?>" class="form-control" value="<?php echo $row->price?>" required="">
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
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