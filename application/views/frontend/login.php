        <div class="clearfix"></div>
        <div class="login-reg-panel">
            <div class="login-info-box">
                <h2>Have an account?</h2>
                <p></p>
                <label id="label-register" for="log-reg-show">Login</label>
                <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
            </div>
            <div class="register-info-box">
                <h2>Don't have an account?</h2>
                <p></p>
                <label id="label-login" for="log-login-show">Register</label>
                <input type="radio" name="active-log-panel" id="log-login-show">
            </div>
            <div class="white-panel">
                <div class="login-show">
                    <h1 class="heading-1">Login</h1>
                    <form id="loginForm" action="<?= base_url('pages/login_submit'); ?>" data-parsley-validate>
                        <input type="text" placeholder="Email" name="email" required="">
                        <input type="password" placeholder="Password" name="password" required="">
                        <input type="submit" class="btn-2" value="Login">
                    </form>
                    <a href="<?= base_url('forget_password'); ?>">Forgot password?</a>
                </div>
                <div class="register-show">
                    <h1 class="heading-1">Register</h1>
                    <form id="registerForm" action="<?= base_url('pages/register_submit'); ?>" data-parsley-validate>
                        <input type="text" placeholder="Full Name" name="name" required="">
                        <input type="email" placeholder="Email" name="email" required="">
                        <input type="password" placeholder="Password" name="password" required="">
                        <input type="password" placeholder="Confirm Password" name="confirm" required="">
                        <input type="text" placeholder="Phone Number" required="" name="mobile">
                        <textarea placeholder="Address here...!" name="address"></textarea>
                        <input type="submit" class="btn-2" value="Register">
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.login-info-box').fadeOut();
                $('.login-show').addClass('show-log-panel');
            });
            
            $('.login-reg-panel input[type="radio"]').on('change', function() {
                if($('#log-login-show').is(':checked')) {
                    $('.register-info-box').fadeOut(); 
                    $('.login-info-box').fadeIn();
                    
                    $('.white-panel').addClass('right-log');
                    $('.register-show').addClass('show-log-panel');
                    $('.login-show').removeClass('show-log-panel');
                    
                }
                else if($('#log-reg-show').is(':checked')) {
                    $('.register-info-box').fadeIn();
                    $('.login-info-box').fadeOut();
                    
                    $('.white-panel').removeClass('right-log');
                    
                    $('.login-show').addClass('show-log-panel');
                    $('.register-show').removeClass('show-log-panel');
                }
            });
        </script>

        <script type="text/javascript">
        $( "#registerForm").submit(function( event ) {
            // event.preventDefault();
            var POSTURL = $(this).attr('action');
            var $profile = $('#registerForm');
            if($('#registerForm').parsley().isValid()){
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
                            $("#registerForm").trigger('reset');
                            $("#log-reg-show").click();
                            // window.location.href = BASE_URL+"account";
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
        $( "#loginForm").submit(function( event ) {
            // event.preventDefault();
            var POSTURL = $(this).attr('action');
            var $profile = $('#loginForm');
            if($('#loginForm').parsley().isValid()){
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
                            <?php
                            $output = parse_url($_SERVER['HTTP_REFERER']);
                            if($output['path'] == '/wp/nsign/cart') {
                                ?>
                                window.location.href = BASE_URL+"checkout";
                                <?php
                            }
                            else {
                                ?>
                                window.location.href = BASE_URL+"account";
                                <?php
                            }
                            ?>
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