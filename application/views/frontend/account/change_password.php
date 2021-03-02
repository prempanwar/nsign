<div class="clearfix"></div>
<section>
    <div class="user">
        <div class="container">
            <div class="row">
                <?php $this->load->view('frontend/account/left_bar'); ?>
                <div class="col-xs-12 col-sm-9 right">
                    <div class="tab-content">
                        <div id="Change-Password" class="tab-pane fade in active">
                            <h3>Change Password</h3>
                            <form class="" method="post" id="passwordForm" data-parsley-validate>
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label " for="pwd">Old Password</label>
                                    <input type="password" id="old_password" class="form-control" name="old_password" placeholder="Ex: 123john" required="" data-parsley-required-message="Old password is required">
                                </div>
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">New Password</label>
                                    <input type="password" id="password1" class="form-control" placeholder="Ex: john123" name="password" required="" data-parsley-required-message="New password is required" maxlength="15" >
                                </div>
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">Confirm Password</label>
                                    <input type="password" id="con_pass" class="form-control" name="con_pass" placeholder="Ex: john123" required="" data-parsley-required-message="Confirm password is required" data-parsley-equalto="#password1" data-parsley-equalto-message="Confirm password should be same as new password">
                                </div>
                                <div class="col-xs-12 col-sm-6 form-group"> 
                                    <label class="control-label" for="pwd"></label>
                                    <button type="submit" class="btn btn-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .parsley-errors-list li {
        margin-top: 0;
    }
</style>
<script type="text/javascript">
    $( "#passwordForm" ).submit(function( event ) {
        if($(this).parsley().isValid()){
            var POSTURL = $(this).attr('action');
            $(".main-loader").show();
            $.ajax({
                type: 'POST',
                url: POSTURL,
                data: new FormData($(this)[0]),
                contentType: false,
                cache: false,
                processData:false,
                dataType: "json",
                success: function (output) {
                    $(".main-loader").hide();
                    if(output.status == 'success') {
                        $("#passwordForm").trigger('reset');
                    }
                    toasterMessage(output.status, output.message);
                },
                error: function (error) {
                    $(".main-loader").hide();
                    toasterMessage('error', 'Something went wrong, please try again.');
                }
            });
            event.preventDefault();
        }
    });
</script>