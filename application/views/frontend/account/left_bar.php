<?php
$segment2 = $this->uri->segment(2);
?>
<div class="col-xs-12 col-sm-3">
    <div class="left">
        <div class="profile-image">
            <!-- <img src="<?= base_url("assets/frontend/images/user.png"); ?>" class="img-responsive" alt="User Profile"> -->
            <h4><?= ucfirst(user_name()); ?></h4>
        </div>
        <ul class="nav nav-tabs">
            <li class="<?php if($segment2 == '') echo "active"; ?>"><a href="<?= base_url("account"); ?>">Update Profile</a></li>
            <li class="<?php if($segment2 == 'order_history') echo "active"; ?>"><a href="<?= base_url("account/order_history"); ?>">Order History</a></li>
            <li class="<?php if($segment2 == 'change_password') echo "active"; ?>"><a href="<?= base_url("account/change_password"); ?>">Change Password</a></li>
            <li><a href="<?= base_url("account/logout"); ?>">Logout</a></li>
        </ul>
    </div>
</div>