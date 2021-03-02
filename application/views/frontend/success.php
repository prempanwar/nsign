<section>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 text-center">
                    <h1>Payment Done</h1><br>

                        <table class="table table-bordered" style="max-width: 400px; margin: auto;">
                            <tbody>
                              <tr>
                                <td>Invoice ID</td>
                                <td><?= $order['invoice_id']; ?></td>
                              </tr>

                              <tr>
                                <td>Payment Amount</td>
                                <td>£<?= $order['payment_amt']; ?></td>
                              </tr>

                              <tr>
                                <td>Payment Status</td>
                                <td><?= $order['payment_status']; ?></td>
                              </tr>
                            </tbody>
                          </table>
                    <p>
                         <!-- : <?= $order['invoice_id']; ?><br>
                         : <br>
                         : <?= $order['payment_status']; ?><br> -->
                    </p><br>
                    <a href="<?= base_url('account/order_history'); ?>">Click here to view order history</a>
                </div>
            </div>
        </div>
    </div>
</section>