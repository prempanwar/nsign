<script>
    $( function() {
        $("#council").addClass("active treeview");
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Edit Favorite Users</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url("backend/admin/favorite_users"); ?>"> Favorite Users List</a></li>
            <li class="active">Edit Favorite Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $this->session->flashdata('success_msg'); ?> 

            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <!-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#list" data-toggle="tab" aria-expanded="true">All Council</a></li>
                         <li class=""><a href="#add" data-toggle="tab" aria-expanded="false">Add Council</a></li> 
                    </ul> -->
                    <div class="tab-content">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Name</label>
                                <label for="field-1" class="col-sm-4 control-label">Email</label>
                                <label for="field-1" class="col-sm-4 control-label">Mobile</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" value="<?= $user['name']; ?>" required="" placeholder="Price">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="email" type="text" value="<?= $user['email']; ?>" required="">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="mobile" type="text" value="<?= $user['mobile']; ?>" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Address</label>
                                <label for="field-1" class="col-sm-4 control-label">Discount ( % )</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="form-control" name="address" type="text" value="<?= $user['address']; ?>" required="">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="discount" type="text" value="<?= $user['discount']; ?>" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
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
<script type="text/javascript">
    $(".remove_logo").click(function() {
        $(this).hide();
        $(this).next().hide();
        $(this).next().next().val('');
    });
</script>