<section>
    <div class="cart-page">
        <div class="container">
            <?php
            if($this->cart->contents()) {
                ?>
                <div class="row">
                    <h1 class="heading-1 text-center">CART</h1>
                    <div class="head-sec">
                        <div class="col-xs-6 col-sm-5 rara">Council Image</div>
                        <div class="col-xs-6 col-sm-2 rara">Council Name</div>
                        <div class="col-xs-6 col-sm-2 rara">Unit Price</div>
                        <!-- <div class="col-xs-6 col-sm-1 rara">Discount</div> -->
                        <div class="col-xs-6 col-sm-1 rara">Quantity</div>
                        <div class="col-xs-6 col-sm-1 rara">Total</div>
                        <div class="col-xs-6 col-sm-1 rara"></div>
                    </div>
                    <?php echo form_open(base_url('pages/update_cart'), 'id="cartForm"'); ?>
                        <?php 
                        $i = 1;
                        $discount = ($this->cart->total() * $discount) / 100;
                        $sub_total = $this->cart->total() - $discount;
                        $sub_total1 = $sub_total + $delivery_charge['price'];
                        $vat = round(($sub_total1 * 20) / 100, 2);
                        // $commission = 0;
                        foreach ($this->cart->contents() as $items): 
                            // $discount = $items['discount']*$items['qty'];
                            echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                            <div class="bottom-sec" style="background-color: rgba(232, 232, 232, 0.65);">
                                <div class="col-xs-6 col-sm-5">
                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                            <?php
                                            if($option_name == 'desc') {
                                                echo $option_value;                                    
                                            }
                                            ?><br />
                                        <?php endforeach; ?>
                                            
                                    <?php endif; ?>
                                    <!-- <img src="images/plate-1.png" alt=""> -->
                                </div>
                                <div class="col-xs-6 col-sm-2 arar"><?= ucfirst($items['name']); ?></div>
                                <div class="col-xs-6 col-sm-2 arar">£<?php echo $this->cart->format_number($items['price']); ?></div>
                                <!-- <div class="col-xs-6 col-sm-1 arar">£<?php echo $this->cart->format_number($discount); ?></div> -->
                                <div class="col-xs-6 col-sm-1 arar"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'max' => '999','min' => '1', 'size' => '5', 'class' => 'form-control','type'=>'number')); ?></div>
                                <div class="col-xs-6 col-sm-1 arar">£<?php echo $this->cart->format_number($items['subtotal']); ?></div>
                                <div class="col-xs-6 col-sm-1 arar">
                                    <a href="<?= base_url("pages/remove_cart/$items[rowid]"); ?>"><i class="fa fa-trash"></i></a>
                                    <button class="btn-2 update-btn"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <?php
                            $i++;
                            // $commission = $commission + $discount;
                        endforeach;
                        echo form_close(); ?>
                    <!-- <div>Sub Total : <?php echo $this->cart->format_number($this->cart->total()); ?></div>
                    <div>Discount : <?= $commission; ?></div> -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 text-right">
                            <?php
                            if($discount) {
                                ?>
                                <div class="ttl">Discount : <?= $this->cart->format_number($discount); ?></div>
                                <?php
                            }
                            ?>
                            <div class="ttl">Sub Total : <?= $this->cart->format_number($sub_total); ?></div>
                            <div class="ttl">Delivery Charge : <?= $this->cart->format_number($delivery_charge['price']); ?></div>
                            <div class="ttl">VAT(20%) : <?= $this->cart->format_number($vat); ?></div>
                            <div class="ttl">Total : <?= $this->cart->format_number($sub_total + $vat + $delivery_charge['price']); ?></div>
                            <a class="btn btn-2 proceed" href="<?= base_url(); ?>">Back to Home</a>
                            <a class="btn btn-2 proceed" href="<?= base_url('checkout'); ?>">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            else {
                ?>
                <div class="row text-center">
                    <h1 class="heading-1 text-center">CART</h1>
                    <p>No product in cart</p>
                    <a style="color: blue;" href="<?= base_url(); ?>">Click here to add product</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    $( "#cartForm").submit(function( event ) {
        var POSTURL = $(this).attr('action');
        var $profile = $('#cartForm');
        $.ajax({
            type: 'POST',
            url: POSTURL,
            data: new FormData($($profile)[0]),
            contentType: false,
            cache: false,
            processData:false,
            dataType: "json",
            beforeSend: function (result) {
                $('.loader-wrap').removeClass('dn');
            },
            complete: function () {
                $('.loader-wrap').addClass('dn');
            },
            success: function (output) {
                if(output.status=='success')
                    setTimeout(function(){ // wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                    }, 2000);
                toasterMessage(output.status, output.message);
            },
            error: function (error) {
                toasterMessage('error', 'Something went wrong please try again');
            }
        });
        event.preventDefault();
    });
</script>
<style type="text/css">
    .plate-bg{
        height: 118px;
        width: 495px;
    }
</style>