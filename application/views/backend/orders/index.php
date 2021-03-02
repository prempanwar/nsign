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
        <div class="col-xs-12">
        <?php echo $this->session->flashdata('success_msg'); ?> 
            <div class="bread_parent">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('backend/admin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
                    <li><b>Orders List</b></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <header class="panel-heading" style="background: #fff;">
                <form action="<?php current_url() ?>" method="get" accept-charset="utf-8">
                    <table class="responsive table_head" cellpadding="5">
                        <thead>
                            <tr>
                                <!-- <th width="13%"><i class="icon-user"></i> Name</th> -->
                                <th width="30%">Invoice ID</th>
                                <th width="30%">Order Status</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="">                
                                        <input type="text" name="invoice_id" value="<?php echo trim($this->input->get('invoice_id')); ?>" class="form-control" placeholder="Invoice ID">
                                    </div>
                                </td>
                                <td>
                                    <div class="">                
                                        <select name="status" class="form-control">
                                            <option value="" <?php if($this->input->get('status') == '') echo "selected"; ?>>Select Status</option>
                                            <?php
                                            foreach (order_status() as $key => $value) {
                                                ?>
                                                <option value="<?= $key; ?>" <?php if((string)$this->input->get('status') == (string)$key) echo "selected"; ?>><?= $value; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <a href="<?php echo current_url() ?>" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </header>
            <div class="panel-body" style="background: #fff;">
                <div class="adv-table">
                    <table id="myTable" class="table table-striped table-hover" >
                        <thead class="thead_color">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Invoice ID</th>
                                <th>Sub Total</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order Type</th>
                                <th>Order Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = $offset + 1;
                            foreach ($data as $row) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= ucfirst($row->name); ?></td>
                                    <td><?= $row->invoice_id; ?></td>
                                    <td>£<?= $row->sub_total; ?></td>
                                    <td>£<?= $row->discount ? $row->discount : "00:00"; ?></td>
                                    <td>£<?= $row->total; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?= order_status($row->status); ?>
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <?php
                                                foreach (order_status() as $key => $value) {
                                                    if($key > $row->status && $key != 4) {
                                                        ?>
                                                        <li><a href="<?= base_url('backend/orders/change_status/').$row->invoice_id."/$key"; ?>" class="confirm-box" data-msg="You want to change status?"><?= $value; ?></a></li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                          </ul>
                                        </div> 
                                    </td>
                                    <td><?= !empty($row->txn_id)?'Online Sales':'Account Sales' ; ?></td>
                                    <td><?= change_date_format($row->created_on, 'm/d/Y'); ?></td>
                                    <td><a href="<?= base_url("backend/orders/details/").$row->order_id; ?>" target="_blank"><i class="fa fa-eye btn btn-primary"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="row-fluid  control-group mt15 pull-right">
                        <div class="span12">
                            <?php if(!empty($pagination))  echo $pagination;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- left column -->
    </div>
    <!--/.col (left) -->
</div>