<div class="clearfix"></div>
<section>
    <div class="user">
        <div class="container">
            <div class="row">
                <?php $this->load->view('frontend/account/left_bar'); ?>
                <div class="col-xs-12 col-sm-9 right">
                    <div class="tab-content">
                        <div id="Order-Details" class="tab-pane fade in active">
                            <h3>Order Details</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>TXN ID</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $row) {
                                            ?>
                                            <tr>
                                                <td><?= $row->invoice_id; ?></td>
                                                <td><?= $row->txn_id ? $row->txn_id : "N/A"; ?></td>
                                                <td>£<?= $row->sub_total; ?></td>
                                                <td>£<?= $row->discount ? $row->discount : "00:00"; ?></td>
                                                <td>£<?= $row->total; // ($row->sub_total+$row->vat+$row->delivery_charge)-$row->discount; ?></td>
                                                <td><?= order_status($row->status); ?></td>
                                                <td><?= change_date_format($row->created_on, 'm/d/Y'); ?></td>
                                                <td>
                                                    <a href="<?= base_url('account/order_details/').$row->invoice_id; ?>" data-toggle="tooltip" title="View details"><i class="fa fa-eye btn btn-primary"></i></a>
                                                    <?php
                                                    if($row->status == 1) {
                                                        ?>
                                                        <a href="<?= base_url('account/cancel_order/').$row->invoice_id; ?>" class="confirm-box" data-msg="You want to cancel this order" data-toggle="tooltip" title="Cancel order"><i class="fa fa-times btn btn-danger"></i></a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <a href="<?= base_url('account/order_invoice/').$row->invoice_id; ?>" data-toggle="tooltip" title="Download your order"><i class="fa fa-download btn btn-primary"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>