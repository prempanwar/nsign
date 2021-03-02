<div class="clearfix"></div>
<section>
    <div class="user">
        <div class="container">
            <div class="row">
                <?php $this->load->view('frontend/account/left_bar'); ?>
                <div class="col-xs-12 col-sm-9 right">
                    <div class="tab-content">
                        <div id="Update-Profile" class="tab-pane fade in active">
                            <h3>Update Profile</h3>
                            <form class="" method="post" id="profileForm" data-parsley-validate>
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label " for="pwd">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required="" value="<?= $data['name']; ?>">
                                </div>
                                <!-- <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">User Name</label>
                                    <input type="text" class="form-control" id="pwd">
                                </div> -->
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">Email</label>
                                    <input type="email" class="form-control" name="email" id="pwd" required="" value="<?= $data['email']; ?>">
                                </div>
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile" id="pwd" required="" value="<?= $data['mobile']; ?>">
                                </div>
                                <!-- <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">Address</label>
                                    <textarea class="form-control" name="address"><?= $data['address']; ?></textarea>
                                </div> -->
                                <!-- <div class="col-xs-12 col-sm-6 form-group">
                                    <label class="control-label" for="pwd">Pin Code</label>
                                    <input type="text" class="form-control" id="pwd">
                                </div> -->
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
<script type="text/javascript">
$( "#profileForm").submit(function( event ) {
    // event.preventDefault();
    var POSTURL = $(this).attr('action');
    var $profile = $('#profileForm');
    if($('#profileForm').parsley().isValid()){
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
                if(output.status == 'success') {
                    $(".profile-image h4").html($("#name").val());
                }
                toasterMessage(output.status, output.message);
            },
            error: function (error) {
                toasterMessage('error', 'Something went wrong please try again');
            }
        });
    }
    event.preventDefault();
});
</script>