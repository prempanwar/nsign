<div class="check-out" id="check-out-form">
    <div class="container">
        <!--         <h1 class="heading-1">CHECKOUT</h1> -->
        <div class="row">
            <form method="post">
                <input type="hidden" name="action_type" value="1">
                <div class="col-xs-12 col-sm-6 col-sm-6">
                    <div class="left-checkout">
                     
                        <h3>Shipping Address</h3>
                        <div class="col-xs-4 col-sm-3 label"><label>Address</label></div>
                        <div class="col-xs-8 col-sm-9 label-value form-group">
                            <input type="text" name="order[address]" class="form-control" required="">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-4 col-sm-3 label"><label>City</label></div>
                        <div class="col-xs-8 col-sm-9 label-value form-group"><input type="text" name="order[city]" class="form-control" required=""></div>
                        <div class="clearfix"></div>
                        <div class="col-xs-4 col-sm-3 label"><label>State</label></div>
                        <div class="col-xs-8 col-sm-9 label-value form-group">
                            <select class="form-control" name="order[state]">
                                <option value="">Select State</option>
                                <?php
                                foreach ($states as $row) {
                                    echo '<option data-id="'.$row->id.'">'.ucfirst($row->name).'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-4 col-sm-3 label"><label>Post code</label></div>
                        <div class="col-xs-8 col-sm-9 label-value form-group"><input type="text" name="order[postcode]" class="form-control" required=""></div>
                        <div class="clearfix"></div>
                        <div class="col-xs-4 col-sm-4 label"><label>
                            <button class="btn-2">CHECKOUT</button>
                            </label>
                        </div>
                        <div class="col-xs-6 col-sm-6 label">
                            <label style="">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalLoginForm">ACCOUNT CUSTOMERS</button>
                           <!--  <a href="" class="btn-2" style="background: #3c763d;padding: 11px 39px;">Generate Order</a> -->
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Your Order ID & Details.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php  //p($this->cart->contents());die; ?> 
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label for="defaultForm-email" >Date </label>
          <span><b><?= ' '.date('d-m-d'); ?></b></span>
          <div class="price_wrap">
             <label for="defaultForm-email" >Total Price </label>
                <?php 
                    $price = 0;
                    // p($this->cart->contents()); die;
                    // echo $accout_customer_total;
                    // if(!empty($this->cart->contents())){
                    //     foreach($this->cart->contents() as $items){
                    //         $price += $items['subtotal'];
                    //     }
                    // } 
                ?>
             <span><b><?= '£'.$accout_customer_total ?></b></span>    
          </div>
        </div>
        <form action="<?php echo base_url().'pages/checkout'; ?>" method="post" id="orderGenerate">
            <input type="hidden" name="action_type" value="2">
            <div class="md-form mb-5 order_gen_block">
              <label data-error="wrong" data-success="right" for="defaultForm-email" >Order ID</label>
              <!-- <p class="order_id_msg">Please Insert an Order ID With Character with Alpha-Numaric, So your order can be Identify easily.</p> -->
              <input type="text" id="defaultForm-order_id" name="order_id" class="form-control validate order_id" placeholder="Ex- ORD26267650" required="">
              <!-- data-parsley-type="alphanum" -->
            </div>

            <div class="md-form mb-4 order_gen_block">
              <label data-error="wrong" data-success="right" for="defaultForm-pass" >Address</label>
              <input type="text" id="defaultForm-address" name="order[address]" class="form-control validate" placeholder="Your Address" required="">
            </div>
             <div class="md-form mb-4 order_gen_block">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">City</label>
              <input type="text" id="defaultForm-address" name="order[city]" class="form-control validate" placeholder="Your City" required="">
            </div>  
            <div class="md-form mb-4 order_gen_block">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">State</label>
                <select class="form-control" name="order[state]" required="">
                    <option value="">Select State</option>
                    <?php
                    foreach ($states as $row) {
                        echo '<option data-id="'.$row->id.'">'.ucfirst($row->name).'</option>';
                    }
                    ?>
                </select>
            </div>
             <div class="md-form mb-4 order_gen_block">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Postal Code</label>
              <input type="text" id="defaultForm-address" name="order[postcode]" class="form-control validate" placeholder="Postal Code" required="" required="">
            </div>
        

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Submit Order</button>
        <button type="button" class="btn btn-default" data-dismiss='modal' >Cancel</button>
      </div>
       </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $("select[name='order[country]']").change(function() {
        var country_id = $(this).find('option:selected').data('id');
        var URL = BASE_URL+"pages/state/"+country_id;
        $.get(URL, function(data, status){
            $("select[name='order[state]']").html(data);
        });
    });

    $('#orderGenerate').parsley();
</script>
<style type="text/css">
  .price_wrap{
    float: right; 
  }
  .order_id_msg{
    color: green;
    font-size: 14px;
    margin: 4px 0;
  }
  .order_gen_block{
    margin-top: 15px;
  }
</style>