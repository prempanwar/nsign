<section>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="colxs-12 col-sm-6 right">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="email" class="form-control"  required="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="contact">Mobile No</label>
                            <input type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="contact">Message </label>
                            <textarea type="text" class="form-control" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="colxs-12 col-sm-6 left">
                    <div class="contact-info-section">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-4 center-holder">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-8">
                                <h4>Call Us</h4>
                                <?= $call_us['template_body']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info-section" style="border: 0px;">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-4 center-holder">
                                <i class="fa fa-globe"></i>
                            </div>
                             <div class="col-md-10 col-sm-10 col-xs-8">
                                <h4>Our Location</h4>
                                <?= $our_location['template_body']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="map">
    <iframe style="border:0" src="<?= get_options('MAP_ADDRESS'); ?>" allowfullscreen="" width="100%" height="500"></iframe>
</div>