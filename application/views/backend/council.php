<script>
    $( function() {
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
        <h1><i class="fa fa-arrow-circle-o-right"></i> Council List</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active">Council</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <?php echo $this->session->flashdata('success_msg'); ?> 
                <div class="nav-tabs-custom">
                    <!-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#list" data-toggle="tab" aria-expanded="true">All Council</a></li>
                         <li class=""><a href="#add" data-toggle="tab" aria-expanded="false">Add Council</a></li> 
                    </ul> -->
                    <div class="tab-content">
                        <!-- Font Awesome Icons -->
                        <div class="tab-pane active" id="list">
                            <table id="example" class="table table-bordered table-striped dataTable">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Logo</th>
                                        <th>Border</th>
                                        <th>Zipcode</th>
                                        <th>Font</th>
                                        <!-- <th>Publish Date</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    foreach($council as $c)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $c->name; ?></td>
                                            <td>£<?php echo $c->price; ?></td>
                                            <td class="text-center">
                                                <?php
                                                if($c->logo) {
                                                    ?>
                                                    <img src="<?= base_url($c->logo); ?>" alt="<?php echo $c->logo; ?>" style="width: 85px;">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($c->border == 1)
                                                    echo "Rectangle";
                                                if($c->border == 2)
                                                    echo "Square";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($c->zipcode == 1)
                                                    echo "Yes";
                                                else
                                                    echo "No";
                                                ?>
                                            </td>
                                            <td><?= $c->font; ?></td>
                                            <!-- <td><?= $c->created_on; ?></td> -->
                                            <td class="text-center">
                                                <a style="padding: 1px 4px 1px 5px;" class="btn btn-primary" href="<?= base_url("backend/admin/edit_council/").$c->council_id; ?>"><i class="fa fa-edit"></i></a>
                                                <!-- <a onclick="return confirm('Are you sure');" href="delete_council?c_id=<?php echo $c->c_id; ?>"><i class="fa fa-trash"></i>Delete</a> -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody> 
                            </table>
                        </div>
                        <!-- /#fa-icons -->
                        <!-- glyphicons-->
                        <div class="tab-pane" id="add">                           
                            <form action="<?php echo site_url('backend/admin/image_store'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-1 control-label">Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="name" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-1 control-label">Image</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="file" type="file" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <button type="submit" class="btn btn-info">Add</button>
                                    </div>
                                </div>
                            </form>

                        </div> 
                        <!-- /#ion-icons -->
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