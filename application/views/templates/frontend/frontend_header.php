<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php if($title) { echo $title." | "; } ?><?= SITE_NAME; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url("assets/frontend/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("assets/frontend/css/owl.carousel.min.css"); ?>">
        <!--   <link rel="stylesheet" href="css/docs.theme.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url("assets/frontend/css/animate.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("assets/frontend/css/style.css"); ?>">

        <script src="<?= base_url("assets/frontend/js/jquery.min.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/bootstrap.min.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/owl.carousel.min.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/custom.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/wow.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/parsley.min.js"); ?>"></script>
        <script src="<?= base_url("assets/frontend/js/notify.min.js"); ?>"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Noto+Sans|Open+Sans|Poppins|Roboto" rel="stylesheet"> 
        <script>
            BASE_URL = "<?= base_url(); ?>";
            function toasterMessage(type, message) {
                if(type == 'success') {
                    var title = '';
                    var icon = BASE_URL+"assets/backend/img/alert-icons/alert-checked.svg";
                }
                if(type == 'info') {
                    // var title = 'Info';
                    var title = '';
                    var icon = BASE_URL+"assets/backend/img/alert-icons/alert-checked.svg";
                }
                if(type == 'warning') {
                    var title = '';
                    var icon = BASE_URL+"assets/backend/img/alert-icons/alert-danger.svg";
                }
                if(type == 'error') {
                    var title = '';
                    var icon = BASE_URL+"assets/backend/img/alert-icons/alert-disabled.svg";
                }
                if(type == 'error')
                    type = "danger";
                $.notify({
                    icon: icon,
                    title: "<strong>"+title+"</strong> ",
                    message: message            
                },{
                    icon_type: 'image',
                    type: type,
                    allow_duplicates: false
                });
            }
            toasterMessage('success', 'aaa');
        </script>
    </head>
    <body>
        <!-- ------------------------ navbar menu ------------------------ -->
        <section>
            <div class=" navbar-info">
                <div class="container top-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 left">
                            <a href="<?= base_url(); ?>">
                                <img src="<?= base_url("assets/frontend/images/logo.png"); ?>" title="Logo">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 middle text-center hidden-xs">
                            <h2>Create Your Own Street Name Plates</h2>
                        </div>
                        <div class="col-xs-12 col-sm-3 left hidden-xs text-right">
                            <a href="<?= base_url(); ?>"><img src="<?= base_url("assets/frontend/images/logo.png"); ?>" title="Logo"></a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-default navbar-me">
                    <div class="container">
                        <div class="col-xs-12 col-sm-12">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header hidden-sm hidden-md hidden-lg">
                                <button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <!-- <a class="navbar-brand site-logo" href="#">NSign</a> -->
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                                <ul class="nav navbar-nav ">
                                    <li class="<?php if($segment1 == '') echo 'active'; ?>"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="<?php if($segment1 == 'about-us') echo 'active'; ?>"><a href="<?= base_url("about-us"); ?>">About Us</a></li>
                                    <li class="<?php if($segment1 == 'contact') echo 'active'; ?>"><a href="<?= base_url("contact"); ?>">Contact Us</a></li>
                                    <?php
                                    if(user_logged_in()) {
                                        ?>
                                        <li class="<?php if($segment1 == 'account') echo 'active'; ?>"><a href="<?= base_url("account"); ?>">Account</a></li>
                                        <li class=""><a href="<?= base_url("account/logout"); ?>">Logout</a></li>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <li class="<?php if($segment1 == 'login') echo 'active'; ?>"><a href="<?= base_url("login"); ?>">Login / Register</a></li>
                                        <?php
                                    }
                                    ?>
                                    <li style="<?php if($this->cart->total_items() <= 0) { echo "display:none1;"; } ?>" class="cartLi <?php if($segment1 == 'cart') echo 'active1'; ?>"><a href="<?= base_url("cart"); ?>" id="cartTotal"><i class="fa fa-shopping-cart"></i><?php if($this->cart->total_items()) { ?><small> <?= $this->cart->total_items(); ?></small><?php } ?></a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end of navbar-->
        </section>
        <!-- ------------------------ End navbar menu ------------------------ -->