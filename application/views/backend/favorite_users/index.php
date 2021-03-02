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
        <h1><i class="fa fa-arrow-circle-o-right"></i> Favorite Users List</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active">Favorite Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <?php echo $this->session->flashdata('success_msg'); ?> 
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <!-- Font Awesome Icons -->
                        <div class="tab-pane active" id="list">
                            <table id="example" class="table table-bordered table-striped dataTable">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Discount ( % )</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    foreach($users as $row)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= ucfirst($row->name); ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->mobile; ?></td>
                                            <td><?= $row->address; ?></td>
                                            <td><?= $row->discount ? $row->discount.'%' : "N/A"; ?></td>
                                            <td class="text-center">
                                                <a style="padding: 1px 4px 1px 5px;" class="btn btn-primary" href="<?= base_url("backend/admin/edit_favorite_users/").$row->user_id; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody> 
                            </table>
                        </div>
                        <!-- /#fa-icons -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!--/.col (left) -->
    </section>
</div>