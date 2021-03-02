<div class="clearfix"></div>
<section>
    <div class="user">
        <div class="container">
            <div class="row">
                <?php $this->load->view('frontend/account/left_bar'); ?>
                <div class="col-xs-12 col-sm-9 right">
                    <div class="tab-content">
                        <div id="Order-Details" class="tab-pane fade in active">
                            <h3>Order Details (<?= $data['invoice_id']; ?>)</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 43%;">Council Image</th>
                                            <th style="width: 15%;">Council Name</th>
                                            <th style="width: 12%;">Unit Price</th>
                                            <th style="width: 10%;">Quantity</th>
                                            <!-- <th style="width: 10%;">Discount</th> -->
                                            <th style="width: 10%;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($details as $row) {
                                            ?>
                                            <tr>
                                                <td><?= $row->desc; ?></td>
                                                <td><?= ucfirst($row->name); ?></td>
                                                <td>£<?= $row->price; ?></td>
                                                <td><?= $row->qty; ?></td>
                                                <!-- <td>£<?= $row->discount; ?></td> -->
                                                <td>£<?= $row->subtotal-$row->discount; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <tr>
                                        <th colspan="2">Shipping Address</th>
                                        <th colspan="2">Fare Details</th>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>: <?= ucfirst($data['address']); ?></td>
                                        <th>Discount</th>
                                        <td>: £<?= ucfirst($data['discount']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>: <?= ucfirst($data['city']); ?></td>
                                        <th>Sub Total</th>
                                        <td>: £<?= ucfirst($data['sub_total']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>: <?= ucfirst($data['state']); ?></td>
                                        <th>Vat </th>
                                        <td>: £<?= ucfirst($data['vat']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Post code</th>
                                        <td>: <?= ucfirst($data['postcode']); ?></td>
                                        <th>Delivery Charge </th>
                                        <td>: £<?= ucfirst($data['delivery_charge']); ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>Total</th>
                                        <td>: £<?= ucfirst($data['total']); ?></td>
                                    </tr>
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