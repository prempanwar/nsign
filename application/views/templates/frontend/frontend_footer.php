        <div class="scrollup" style="display: block;"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <h1>Nsign Trophies</h1>
                        <?= get_option(8); ?>
                        <p>
                            <a href="<?= base_url('/terms_condition'); ?>">Terms & Condition</a>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <h1>Contact Us</h1>
                        <?= get_option(7); ?>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <h1>Social Links</h1>
                        <ul class="social">
                            <li><a href="<?= get_options('FACEBOOK'); ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= get_options('GOOGLE_PLUS'); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?= get_options('TWITTER'); ?>"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <p class="copy-right">© <?= date('Y'); ?> N-sign</p>
                </div>
            </div>
        </footer>
        <div class="main-loader" style="display: none;">
            <div class="loader">
                <svg class="circular-loader" viewBox="25 25 50 50">
                    <circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#016ccb" strokeWidth="2.5"></circle>
                </svg>
            </div>
        </div>
    </body>
</html>
<style type="text/css">
    .parsley-errors-list li{
        color: red;
    }
    .alert-icon img{
        width: 40px;
    }
</style>
<script type="text/javascript">
    
<?php
if($this->session->flashdata('success')) {
    ?>
    toasterMessage('success', '<?= $this->session->flashdata('success'); ?>');
    <?php
}
if($this->session->flashdata('info')) {
    ?>
    toasterMessage('info', '<?= $this->session->flashdata('info'); ?>');
    <?php
}
if($this->session->flashdata('warning')) {
    ?>
    toasterMessage('warning', '<?= $this->session->flashdata('warning'); ?>');
    <?php
}
if($this->session->flashdata('error')) {
    ?>
    toasterMessage('error', '<?= $this->session->flashdata('error'); ?>');
    <?php
}
?>
</script>
<script>
    $("body").on('click', '.confirm-box', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        var msg = $(this).data('msg');

        swal({
            title: "Are you sure?",
            text: msg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            }
        });
    });
</script>