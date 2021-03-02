<style type="text/css">
    .forget-password{
        width: 100%;
        box-shadow: 2px 2px 20px #ccc;
        padding: 20px 50px 20px;
    }
    .forget-password h3{
        font-size: 28px;
    }
    .forget-password .back-to-login{
        margin-top: 5px;
        display: inline-block;
        font-size: 14px;
        color: #369ca9;
    }
    .parsley-errors-list li {
        margin-top: 0px;
    }
    @media screen and (max-width: 767px){
        .forget-password {
            width: 90%;
            box-shadow: 2px 2px 20px #ccc;
            padding: 20px;
            margin: auto;
        }
    }
</style>

  

<section>
    <div class="container contact ">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <div class="forget-password">
                    <h3 class="heading-1 text-center">Change Password</h3>
                    <form method="POST" data-parsley-validate>
                        <div class="form-group">
                            <label for="c-passsword">Current Password</label>
                            <input type="password" class="form-control" name="curr_pass" required="" data-parsley-required-message="Current password is require">
                        </div>
                        <div class="form-group">
                            <label for="contact">New Passsword</label>
                            <input type="password" class="form-control" name="new_pass" id="new_pass" required="" data-parsley-required-message="New password is require" minlength="6">
                        </div>
                        <div class="form-group">
                            <label for="contact">Confirm Password </label>
                            <input type="password" class="form-control" name="con_pass" data-parsley-equalto="#new_pass" required="" data-parsley-required-message="Confirm password is require" data-parsley-equalto-message="Confirm password should be same as new password">
                        </div>
                        <button type="submit" class="btn btn-default btn-1">Change Password</button><br>
                        <a href="<?= base_url('login'); ?>" class="back-to-login">Back to login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>