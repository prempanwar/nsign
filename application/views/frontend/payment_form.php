<form method="post" name="myform" action="https://test.ipg-online.com/connect/gateway/processing">
    <input type="hidden" name="txntype" value="sale">
    <input type="hidden" name="timezone" value="<?= TIMEZONE; ?>"/>
    <input type="hidden" name="txndatetime" value="<?php echo getDateTime() ?>"/>
    <input type="hidden" name="hash_algorithm" value="SHA256"/>
    <input type="hidden" name="hash" value="<?php echo createHash($amount) ?>"/>
    <input type="hidden" name="storename" value="<?= STORENAME; ?>"/>
    <input type="hidden" name="mode" value="payonly"/>
    <input type="hidden" name="paymentMethod" value="M"/>
    <input type="hidden" name="chargetotal" value="<?= $amount; ?>"/>
    <input type="hidden" name="currency" value="<?= CURRENCY; ?>"/>
    <input type="submit" value="Submit" style="display: none;">
</form>
<script type="text/javascript">
    document.myform.submit();
</script>
<div class="main-loader">
    <div class="loader">
        <svg class="circular-loader" viewBox="25 25 50 50">
            <circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#016ccb" strokeWidth="2.5"></circle>
        </svg>
    </div>
</div>
<style type="text/css">
    /*===============Loader CSS===============*/

    .main-loader {
        position: fixed;
        z-index: 1;
        width: 100%;
        background: #fffc;
        text-align: center;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: 9999;
    }

    .main-loader .loader {
        position: absolute;
        margin: 0px auto;
        width: 60px;
        height: 60px;
        color: #000;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        z-index: 112;
    }

    .section-loader {
        position: absolute;
        z-index: 1;
        width: 100%;
        background: #ffffff65;
        text-align: center;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: 9999;
    }

    .section-loader .loader {
        position: absolute;
        margin: 0px auto;
        width: 60px;
        height: 60px;
        color: #000;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        z-index: 112;
    }

    .circular-loader {
        -webkit-animation: rotate 2s linear infinite;
        animation: rotate 2s linear infinite;
        height: 100%;
        -webkit-transform-origin: center center;
        -ms-transform-origin: center center;
        transform-origin: center center;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        margin: auto;
    }

    .loader-path {
        stroke-dasharray: 150, 200;
        stroke-dashoffset: -10;
        -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
        animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
        stroke-linecap: round;
    }

    @-webkit-keyframes rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }
        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35;
        }
        100% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -124;
        }
    }

    @keyframes dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }
        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35;
        }
        100% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -124;
        }
    }
</style>