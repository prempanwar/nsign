<script>
    $( function() {
        $("#council").addClass("active treeview");
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
        <h1><i class="fa fa-arrow-circle-o-right"></i> Edit Council</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active">Edit Council</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $this->session->flashdata('success_msg'); ?> 

            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <!-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#list" data-toggle="tab" aria-expanded="true">All Council</a></li>
                         <li class=""><a href="#add" data-toggle="tab" aria-expanded="false">Add Council</a></li> 
                    </ul> -->
                    <div class="tab-content">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Council Name</label>
                                <label for="field-1" class="col-sm-4 control-label">Double Price</label>
                                <label for="field-1" class="col-sm-4 control-label">Plate Design</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" value="<?= $council['name']; ?>" required="" placeholder="Price">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="price" type="text" value="<?= $council['price']; ?>" required="">
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="border" type="text" required="">
                                        <option value="">Select Border</option>
                                        <option value="1" <?php if($council['border'] == 1) echo "selected"; ?>>Rectangle</option>
                                        <option value="2" <?php if($council['border'] == 2) echo "selected"; ?>>Square</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Logo</label>
                                <label for="field-1" class="col-sm-4 control-label">Logo Position</label>
                                <label for="field-1" class="col-sm-4 control-label">Zipcode</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="btn btn-block" style="background: #efefef;" name="file" type="file">
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="logo_position" type="text" required="">
                                        <option value="">Select Font</option>
                                        <option value="0" <?php if($council['logo_position'] == "0") echo "selected"; ?>>Left</option>
                                        <option value="1" <?php if($council['logo_position'] == "1") echo "selected"; ?>>Top</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="zipcode" type="text" required="">
                                        <option value="">Select Zipcode</option>
                                        <option value="1" <?php if($council['zipcode'] == '1') echo "selected"; ?>>Yes</option>
                                        <option value="0" <?php if($council['zipcode'] == '0') echo "selected"; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Font</label>
                                <label for="field-1" class="col-sm-4 control-label">Wall Mount Price</label>
                                <label for="field-1" class="col-sm-4 control-label">Post Mount Price</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="font" type="text" required="">
                                        <option value="">Select Font</option>
                                        <!-- <option value="'Roboto', sans-serif" <?php if($council['font'] == "'Roboto', sans-serif") echo "selected"; ?>>Roboto</option>
                                        <option value="'Poppins', sans-serif" <?php if($council['font'] == "'Poppins', sans-serif") echo "selected"; ?>>Poppins</option>
                                        <option value="'Lato', sans-serif" <?php if($council['font'] == "'Lato', sans-serif") echo "selected"; ?>>Lato</option>
                                        <option value="'Open Sans', sans-serif" <?php if($council['font'] == "'Open Sans', sans-serif") echo "selected"; ?>>Open Sans</option>
                                        <option value="'Noto Sans', sans-serif" <?php if($council['font'] == "'Noto Sans', sans-serif") echo "selected"; ?>>Noto Sans</option> -->
                                        <option value="'Montserrat', sans-serif" <?php if($council['font'] == "'Montserrat', sans-serif") echo "selected"; ?>>Montserrat</option>
                                        <option value="arial" <?php if($council['font'] == "arial") echo "selected"; ?>>Arial</option>
                                        <!-- <option value="arialbd" <?php if($council['font'] == "arialbd") echo "selected"; ?>>Arialbd</option> -->
                                        <option value="GillSansStd-Bold" <?php if($council['font'] == "GillSansStd-Bold") echo "selected"; ?>>GillSansStd-Bold</option>
                                        <option value="kindersley" <?php if($council['font'] == "kindersley") echo "selected"; ?>>Kindersley</option>
                                        <option value="transporth" <?php if($council['font'] == "transporth") echo "selected"; ?>>Transporth</option>
                                        <option value="caxton_bk_btbold" <?php if($council['font'] == "caxton_bk_btbold") echo "selected"; ?>>Caxton_bk_btbold</option>
                                        <option value="swis721_md_btmedium" <?php if($council['font'] == "swis721_md_btmedium") echo "selected"; ?>>swis721_md_btmedium</option>
                                        <option value="futuramedium" <?php if($council['font'] == "futuramedium") echo "selected"; ?>>futuramedium</option>
                                        <option value="gothic725_bd_btbold" <?php if($council['font'] == "gothic725_bd_btbold") echo "selected"; ?>>gothic725_bd_btbold</option>
                                        <option value="zapfhumnst_btbold" <?php if($council['font'] == "zapfhumnst_btbold") echo "selected"; ?>>zapfhumnst_btbold</option>
                                        <option value="times_new_romanbold" <?php if($council['font'] == "times_new_romanbold") echo "selected"; ?>>times_new_romanbold</option>
                                        <option value="palatinenormal" <?php if($council['font'] == "palatinenormal") echo "selected"; ?>>palatinenormal</option>
                                        <option value="FrutigerLTStd-Roman" <?php if($council['font'] == "FrutigerLTStd-Roman") echo "selected"; ?>>FrutigerLTStd-Roman</option>
                                        <option value="Georgia" <?php if($council['font'] == "Georgia") echo "selected"; ?>>Georgia</option>
                                        <option value="Garamond-Bold" <?php if($council['font'] == "Garamond-Bold") echo "selected"; ?>>Garamond-Bold</option>
                                        <option value="NewsGothicStd-Bold" <?php if($council['font'] == "NewsGothicStd-Bold") echo "selected"; ?>>NewsGothicStd-Bold</option>
                                        <option value="TimesNewRomanPSMT" <?php if($council['font'] == "TimesNewRomanPSMT") echo "selected"; ?>>TimesNewRomanPSMT</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <input class="form-control" name="wall_mount_price" type="text" value="<?= $council['wall_mount_price']; ?>" required="">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="post_mount_price" type="text" value="<?= $council['post_mount_price']; ?>" required="">
                                </div>
                            </div>
                             <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Discount</label>
                                    <label for="field-1" class="col-sm-4 control-label">Backgound color</label>
                                    <label for="field-1" class="col-sm-4 control-label">Font color</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="form-control" name="discount" type="text" value="<?= $discount['discount']; ?>" required="">
                                </div>
                                <div class="col-sm-4">
                                    <?php $plate_color = plate_background_color(); 
                                    ?>
                                    <select class="form-control" name="plate_color" type="text">
                                        <option value="">Select Plate Color</option>
                                        <?php 
                                            foreach($plate_color as $key => $value){
                                        ?>
                                            <option value="<?php echo $key; ?>" <?php if($key == $council['plate_color']) echo 'selected'; ?>><?php echo $value; ?> </option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <?php $font_color = plate_font_color(); 
                                    ?>
                                    <select class="form-control" name="font_color" type="text">
                                        <option value="">Select Plate Color</option>
                                        <?php 
                                            foreach($font_color as $key => $value){
                                        ?>
                                            <option value="<?php echo $key; ?>" <?php if($key == $council['font_color']) echo 'selected'; ?>><?php echo $value; ?> </option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                <?php //if(!empty($council['logo'])){ ?>
                                    <p style="position: absolute;padding-top: 15px ">
                                        <i class="fa fa-times remove_logo" style="padding-top: 15px"></i>
                                        <img style="height: 60px;" src="<?= base_url($council['logo']); ?>">
                                        <input type="hidden" name="logo" value="<?= $council['logo']; ?>">
                                    </p>
                                <?php //} ?>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <button type="submit" class="btn btn-info" style="float: right;">Update</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="sol-sm-4" style="padding-top: 25px"></div>
                            </div>
                        </form>
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
<script type="text/javascript">
    $(".remove_logo").click(function() {
        $(this).hide();
        $(this).next().hide();
        $(this).next().next().val('');
    });
</script>
<style type="text/css">
    .remove_logo{
        position: absolute;
        z-index: 1;
        color: red;
        font-size: 21px;
        top: -18px;
        left: 87px;
        cursor: pointer;
    }
</style>