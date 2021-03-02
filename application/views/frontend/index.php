<section>
    <div class="banner">
        <div class="container">
            <div class="row">
                <form id="indexForm" data-parsley-validate autocomplete="off">
                    <div class="col-xs-12 col-sm-12 left">
                        <div class="inner-left">
                            <!-- <div class="plate-div text-center">
                                <span id="showCouncil">Council Name</span>
                            </div> -->

<!--                             <Select id="colorselector">
                               <option value="red">Red</option>
                               <option value="yellow">Yellow</option>
                               <option value="blue">Blue</option>
                            </Select>
                            <div id="red" class="colors" style="display:none"> red... </div>
                            <div id="yellow" class="colors" style="display:none"> yellow.. </div>
                            <div id="blue" class="colors" style="display:none"> blue.. </div> -->
                            <div class="forms-div">

                                
                                <!-- <div class="price hidden-xs hidden-sm hidden-md hidden-lg">
                                    <label>Price</label> :- <span> <strong>£0</strong></span>
                                </div> -->
                                <select name="type" id="council_select">
                                    <option value="" selected="">Select Council Name</option>
                                    <?php
                                    foreach ($council as $row) {
                                        ?>
                                        <option value="<?= $row->council_id; ?>"><?= $row->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bottom-div" id="council" style="display: none;">
                                <div class="col-xs-12 col-sm-5 left-side">
                                    <div class="form-group">
                                        <label>Is this Leading to?</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container floatR">
                                                    <input type="radio" name="leading_to"  onchange="get_council();" value="1" class="leading_to" required="">
                                                      Yes 
                                                    <span class="checkmark"></span>
                                                 </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container">
                                                    <input type="radio" name="leading_to" onchange="get_council();" value="0" class="leading_to_no">  No
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you want No through road symbol ?</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container floatR">
                                                    <input type="radio" name="road_symbol"  onchange="get_council();" value="1" class="post_wall road-symbol" required="">
                                                      Yes 
                                                    <span class="checkmark"></span>
                                                 </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container">
                                                    <input type="radio" name="road_symbol" onchange="get_council();" value="0" class="post_wall road-symbol-no">  No
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="post-wall" style="display: none;">
                                        <label>Do You Require Post Mount or Wall Mount ?</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container floatR">
                                                    <input type="radio" name="mount" checked="checked" onchange="get_council();" class="Mount_click img-1" value="wall" required=""> 
                                                    <span class="checkmark"></span>
                                                     Wall Mount
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="check-label font-16 label-container">
                                                    <input type="radio" name="mount" onchange="get_council();" class="Mount_click img-2" value="post"> 
                                                    <span class="checkmark"></span> Post Mount
                                                </label>
                                            </div>
                                        </div>
                                        

                                        
                                    </div>
                                    <div class="form-group" id="post-code" style="display: none;">
                                        <label>Do You Require Post Code ?</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="label-container font-16 floatR">
                                                    <input type="radio" name="post_code_check" onchange="get_council();" value="1" class="form-control post_code aa" checked="" id="post_code"> <span class="checkmark"></span>
                                                     Yes
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="label-container font-16">
                                                    <input type="radio" name="post_code_check" onchange="get_council();" value="0" class="form-control post_code bb"> <span class="checkmark"></span>
                                                     No
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="" id="post_textbox">
                                            <input type="text" name="post_code" maxlength="5" class="form-control" placeholder="Post Code">
                                        </div>
                                    </div>
                                    <div class="form-group double_side" style="display: none;">
                                        <label>Do you want double side ?</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="label-container font-16 floatR">
                                                    <input type="radio" name="double_side" onchange="price_cal();" value="1" required="">  <span class="checkmark"></span>
                                                    Yes 
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="font-16 label-container">
                                                    <input type="radio" name="double_side" onchange="price_cal();" value="0"  required="" checked="">  <span class="checkmark"></span>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="street-name" style="display: none1">
                                        <div class="form-group" id="street-name" >
                                            <label>Street Name</label><br>
                                            <input type="text" name="street_name" maxlength="27" class="form-control" placeholder="Type Street Name" required="" id="street_name">
                                            <?php /*<input type="text" name="street_name" maxlength="40" class="form-control" placeholder="Type Street Name" required=""> */ ?>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Quantity</label><br>
                                            <input type="text" name="qty" value="1" class="form-control" placeholder="1" required="" data-parsley-type="integer" data-parsley-min="1" style="width: 110px;">
                                        </div> -->
                                        <!-- <div class="form-group" style="margin-bottom: 0px;">
                                            <input type="submit" class="form-control" placeholder="Type Street Name" required="" value="Add to Cart">
                                        </div> -->
                                    </div>
                                     <div id="leading_to_text_box" style="display: none">
                                        <div class="form-group" id="street-name_leading_to" >
                                            <label>Text Below Leading To</label><br>
                                            <input type="text" name="street_name_below" maxlength="52" class="form-control" placeholder="Type Below Leading To Text" required="" id="street_name_below">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7 right-side text-center" id="plateDiv">
                                </div>

                                <div class="clearfix"></div>
                                <div class="row cart-div2">
                                    <div class="col-xs-12 col-sm-2  "></div>
                                    <div class="col-xs-12 col-sm-4 left">
                                        <!-- <button>Quantity 2</button> -->
                                        <!-- <input type="number" name="" value="1"> -->
                                        <div class="form-group">
                                            <label style="margin-right: 16px;">Quantity</label><br>
                                            <input type="text" name="qty" value="1" class="form-control" placeholder="1" required="" data-parsley-type="integer" data-parsley-min="1" style="width: 110px;">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 right">
                                        <!-- <button href="#" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
                                        <div class="form-group prem" style="margin-bottom: 0px;">
                                            <label style="visibility: hidden; display: block; margin-top: 5px;">Submit</label>
                                            <input type="submit" class="form-control" placeholder="Type Street Name" required="" value="Add to Cart">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3"></div>
                                </div>
                                <div class="row">
                                	<div class="col-md-12 text-center">
                                		<div class="price hidden-xs hidden-sm hidden-md hidden-lg">
		                                    Price<span> <strong>£0</strong> Plus VAT</span>
		                                </div>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section>
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="heading-1">About Us</h1>
                    <?= $about_page['template_body']; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section>
    <div class="about name-plates wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="heading-1">Our Street Name Plates</h1>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?= $street_page['template_body']; ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <img src="<?= base_url("assets/frontend/images/image-12.jpg"); ?>" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ------------------------ Start Div 2 ------------------------ -->
<section>
    <div class="div-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 item">
                </div>
                <div class="col-xs-12 col-sm-4 item">
                </div>
                <div class="col-xs-12 col-sm-4 item">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ------------------------ End Div 2 -------------------------- -->
<script type="text/javascript">
 $(function () {
        $(".leading_to").click(function () {
            if ($(this).is(":checked")) {
                $("#leading_to_text_box").show(500);
                $('#street_name_below').attr('required', true); 
            }
        });
    }); 
    $(function () {
        $(".leading_to_no").click(function () {
            if ($(this).is(":checked")) {
               $("#leading_to_text_box").hide(500);
               $('#street_name_below').attr('required', false); 
            }
        });
    });

    $(document).ready(function(){
        $("#council_select").change(function(){
            var selectedCouncil = $(this).children("option:selected").html();
            $('#showCouncil').text(selectedCouncil);
        });
    });


    var show_post_code = '';
    $(function () {
        $("form").trigger('reset');
        $(".post_wall").click(function () {
            if ($(this).is(":checked")) {
                $("#post-wall").show(500);
            } else {
                $("#post-wall").hide();
            }
        });
    });
    
    
    $(function () {
        $(".Mount_click").click(function () {
            if(show_post_code) {
                /*if ($(this).is(":checked")) {
                    $("#post-code").show(500);
                } else {
                    $("#post-code").hide();
                }*/
                $("#post-code").show(500);
            }
        });
    });
    
    
    // Post Code
    $(function () {
        $(".post_code").click(function () {
            if ($(this).is(":checked")) {
                $("#street-name").show(500);                      
            }
        });
    });
    
    $(function () {
      $(".bb").click(function () {
          if ($(this).is(":checked")) {
              $("#post_textbox").hide(500);
          }
      });
    });
    
    $(function () {
      $(".aa").click(function () {
          if ($(this).is(":checked")) {
              $("#post_textbox").show(500);
          }
      });
    });
    // Post Code
</script>
<script type="text/javascript">
    $(function () {
        $(".img-1").click(function () {
            if ($(this).is(":checked")) {
                $("#img_id_1").hide(500);
                $("#img_id_2").hide(500);
                $("#img_id_4").hide(500);
            }
        });
    });
    
    
    $(function () {
        $(".img-2").click(function () {
            if ($(this).is(":checked")) {
                $("#img_id_4").show(500);
                $("#img_id_2").hide(500);
                $("#img_id_1").hide();
            }
        });
    });
    
    
    // For Road Symbol
    $(function () {
        $(".road-symbol").click(function () {
            $("#parsley-id-multiple-mount").show();
            if ($(this).is(":checked")) {
                $("#img_id_1").hide(500);
                $("#img_id_2").hide(500);
                $("#img_id_4").hide(500);
            }
        });
    });
    
    
    $(function () {
        $(".road-symbol-no").click(function () {
            if ($(this).is(":checked")) {
                $("#img_id_1").show(500);
                $("#img_id_2").hide();
                $("#img_id_4").hide();
            }
        });
    });
    // For Road Symbol
    
    
    var price = 0;
    var price1 = 0;
    var wall_mount_price = 0;
    var post_mount_price = 0;
    var double_price = 0;
    $(function () {
        $('#price').hide();
        $('#council').hide();
        $('#council_select').change(function () {
            if($(this).val() == '') {
                $(".price").addClass('hidden-lg');
                $('#council').hide();
            }
            else {
                $(".price").removeClass('hidden-lg');
                $('#council').show();
            }
            get_council();
        });
    });
    function get_council() {
        var council = $("#council_select").val();
        var road_symbol = $("input[name='road_symbol']:checked").val();
        var post_code_check = $("input[name='post_code_check']:checked").val();
        var mount = $("input[name='mount']:checked").val();
        var street_name = $("input[name=street_name]").val();
        var street_name_below = $("input[name=street_name_below]").val();
        var post_code = $("input[name=post_code]").val();
        var leading_to = $("input[name='leading_to']:checked").val();
        if(leading_to==1 && road_symbol==1){
            $('input[name="street_name"]').attr('maxlength',16);
        }else if(leading_to==1 && (road_symbol==undefined || road_symbol==0)){
            $('input[name="street_name"]').attr('maxlength',22);
        }else{
            $('input[name="street_name"]').attr('maxlength',27);
        }
        if(mount == 'post') {
        	$(".double_side").show();
        }
        else {
        	$("input[name=double_side][value=0]").prop('checked', true);
        	$(".double_side").hide();
        }
        if(!mount) {
        	mount = 'wall';
        }
        $.ajax({
            type: "post",
            data: "council_id="+council+"&road_symbol="+road_symbol+"&street_name="+street_name+"&street_name_below="+street_name_below+"&post_code_check="+post_code_check+"&post_code="+post_code+"&mount="+mount+"&leading_to="+leading_to,
            url: BASE_URL+"pages/get_council",
            dataType: "json",
            success: function(result){
                double_price = result.price;
                wall_mount_price = Number(result.wall_mount_price);
                post_mount_price = Number(result.post_mount_price);
                $(".right-side").html(result.html);
                show_post_code = result.zipcode;
                if(result.zipcode != 1) {
                    $("#post-code").hide();
                }
                /*d3plus.textwrap()
                .container(d3.select("#rectWrap"))
                .draw();*/
                price_cal();
            }
        });
    }
    function price_cal() {
        var text = $("input[name=street_name]").val().length;
        price1 = Number(price);
        // price = 80;
        if(text > 20)
            price1 = price1 + 5;
        var double_side = $("input[name='double_side']:checked").val();
        var road_symbol = $("input[name='road_symbol']:checked").val();
        var mount = $("input[name='mount']:checked").val();
        if(road_symbol == '1') {
            price1 = price1 + 5;
        }
        if(mount == 'post') {
            price1 = price1 + post_mount_price;
        }
        if(mount == 'wall') {
            price1 = price1 + wall_mount_price;
        }
        if(double_side == 1) {
            // price1 = price1 + Number(double_price);
            if(mount == 'post') {
	            price1 = price1 - post_mount_price + Number(double_price);
	        }
	        if(mount == 'wall') {
	            price1 = price1 - wall_mount_price + Number(double_price);
	        }
        }
        $(".price span strong").html('£'+price1);
    }
    $("input[name=street_name]").keyup(function(){
        get_council();
    });
    $("input[name=street_name_below]").keyup(function(){
        get_council();
    });
    $("input[name=post_code]").keyup(function(){
        get_council();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input.post_wall[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
        });
    });
    
    
    $(function () {
      $(".chkPassport").click(function () {
          if ($(this).is(":checked")) {
              $("#dvPassport").show(500);
              //$("#AddPassport").hide();
          } else {
              $("#dvPassport").hide();
              //$("#AddPassport").show();
          }
      });
    });
</script>
<script type="text/javascript">
    $("#indexForm").submit(function(){
        if($('#indexForm').parsley().isValid()) {
            var desc = $(".right-side").html();
            var council = $("#council_select").val();
            var council_name = $("#council_select option:selected").text();
            var text = $("input[name=street_name]").val();
            var qty = $("input[name=qty]").val();

            $.ajax({
                type: "post",
                data: {desc: desc, council : council, council_name : council_name, price : price1, text : text, qty: qty},
                // data: "desc="+desc+"&council="+council+"&council_name="+council_name+"&price="+price+"&text="+text,
                url: BASE_URL+"pages/add_to_cart",
                dataType: "json",
                success: function(output){
                    // $("#div1").html(result);
                   // location.reload();
                    $("#cartTotal").html('<i class="fa fa-shopping-cart"></i><small>'+output.total+'</small>');
                    $('form#indexForm input[name="street_name"]').val('');
                    $('form#indexForm input[name="post_code"]').val('');
                    $('form#indexForm input[name="qty"]').val('1');
                    $(".cartLi").show();
                    get_council();
                    toasterMessage(output.status, output.message);
                }
            });               

        }
        return false;
    });
</script>
<style type="text/css">
    .wall_mounts, .post_mounts{
        position: relative;
        width: 200px;
        /*        height: 120px;*/
    }
    .left-poll.menuitemshow::before{
        content: '';
        position: absolute;
        height: 10px;
        width: 20px;
        top: -10px;
        left: 13%;
        background-color: #000;
        z-index: 0;
    }
    .left-poll.menuitemshow::after {
        content: '';
        position: absolute;
        height: 26px;
        width: 20px;
        bottom: -22px;
        left: 13%;
        background-color: #000;
        z-index: 0;
    }
    .right-poll.menuitemshow::before{
        content: '';
        position: absolute;
        height: 10px;
        width: 20px;
        top: -10px;
        right: 13%;
        background-color: #000;
        z-index: 0;
    }
    .right-poll.menuitemshow::after {
        content: '';
        position: absolute;
        height: 26px;
        width: 20px;
        bottom: -22px;
        right: 13%;
        background-color: #000;
        z-index: 0;
    }
    #parsley-id-multiple-mount{
        display: none;
    }
</style>

<!DOCTYPE html>
<meta charset="utf-8">

<!-- <script src="//d3plus.org/js/d3.js"></script>
<script src="//d3plus.org/js/d3plus.js"></script> -->

<style>
/*svg {
    height: 425px;
    width: 900px;
  }*/
  /*.type {
    fill: #888;
    text-anchor: middle;
  }*/

  .shape {
    fill: transparent;
    /*stroke: #000;*/
  }

</style>

<!-- <svg style="height: 100px;width: 154px;">
  <rect class="shape" height="150px" width="150px" y="50px"></rect>
  <text id="rectWrap" class="wrap" y="50px" font-size="12">
    Here is a long text string that SVG should wrap by default, but it does not.
  </text>

</svg> -->

<script>
  // Wrap text in a rectangle.
  /*d3plus.textwrap()
    .container(d3.select("#rectWrap"))
    .draw();*/

</script>
