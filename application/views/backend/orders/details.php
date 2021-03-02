
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Orders List</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Council</li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <?php echo $this->session->flashdata('success_msg'); ?> 
        <div class="col-xs-12">
            <div class="bread_parent">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('backend/admin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
                    <li><b>Orders List</b></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="panel-body" style="background: #fff;">
                <div class="adv-table">
                    <table id="myTable" class="table table-striped table-hover" >
                        <thead class="thead_color">
                            <tr>
                                <th>#</th>
                                <th>Council Image</th>
                                <th>Council Name</th>
                                <th style="width: 100px;">Unit Price</th>
                                <th>Discount</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data as $row) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row->desc; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td>£<?= $row->price; ?></td>
                                    <td>£<?= $row->discount; ?></td>
                                    <td><?= $row->qty; ?></td>
                                    <td>£<?= $row->subtotal-$row->discount; ?></td>
                                    <td><a href="<?= base_url('backend/orders/download/').$row->od_id; ?>"><i class="fa fa-print btn btn-primary" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <tr>
                            <th colspan="2">Shipping Address</th>
                            <th colspan="2">Customer Details</th>
                            <th colspan="2">Fare Details</th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>: <?= ucfirst($orders['address']); ?></td>
                            <th>Name</th>
                            <td>: <?= ucfirst($orders['name']); ?></td>
                            <th>Discount</th>
                            <td>: £<?= ucfirst($orders['discount']); ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>: <?= ucfirst($orders['city']); ?></td>
                            <th>Email</th>
                            <td>: <?= $orders['email']; ?></td>
                            <th>Sub Total</th>
                            <td>: £<?= ucfirst($orders['sub_total']); ?></td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>: <?= ucfirst($orders['state']); ?></td>
                            <th>Mobile</th>
                            <td>: <?= $orders['mobile']; ?></td>
                            <th>Vat </th>
                            <td>: £<?= ucfirst($orders['vat']); ?></td>
                        </tr>
                        <tr>
                            <th>Post code</th>
                            <td>: <?= ucfirst($orders['postcode']); ?></td>
                            <td colspan="2"></td>
                            <th>Delivery Charge </th>
                            <td>: £<?= ucfirst($orders['delivery_charge']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <th>Total</th>
                            <td>: £<?= ucfirst($orders['total']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- left column -->
    </div>
    <!--/.col (left) -->
</div>