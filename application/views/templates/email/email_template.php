<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?= SITE_NAME; ?></title>
    </head>
    <body style="padding:50px 0; margin:0;background-color: #ececec; font-family: sans-serif;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="font-family:sans-serif">
            <tbody>
                <tr>
                    <td style="border-top:5px solid #f78c46;font-family:sans-serif;font-size:15px">
                        <table width="600" border="0" cellpadding="0" cellspacing="0" style="width:600px;margin:0 auto;background-color:#fff">
                            <tbody>
                                <tr>
                                    <td align="center" style="text-align:center;padding: 10px;border-bottom:1px solid #ccc;">
                                        <a href="<?= base_url(); ?>" style="text-decoration:none;display:inline-block" target="_blank" >
                                        <img alt="logo" src="<?= base_url("assets/frontend/images/logo.png"); ?>" style="height: 70px;" >
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family:sans-serif;padding:15px 20px">
                                        <?= $email_message; ?> 
                                        <!-- <p><b>Hello,<br>John Doe</b></p>
                                        <p>There was a request to change your password. </p>
                                        <p>If you didn't make this request, please ignore this email. Otherwise, please click the button below to change your password.</p> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">
                                        <div style="height:10px"></div>
                                        </p>
                                        <div style="height:20px"></div>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- <tr>
                    <td align="center" style="text-align:center;color:#959595;">
                        <table cellpadding="0" cellspacing="0" style="background-color:#ececec;width:100%" bgcolor="#ececec" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center" style="text-align:center;color:#959595;font-family:sans-serif;padding:10px 10px;" bgcolor="#000000">
                                        <div>
                                            <span style="text-align:right;display:inline-block;vertical-align:middle">
                                            <span style="font-size:12px; color:#ccc;">Follow Us:</span>
                                            <a href="#" style="text-decoration:none;vertical-align:middle; margin:0 2px;" target="_blank"><img src="<?= base_url("assets/frontend/images/facebook.png"); ?>" width="15px"></a>
                                            <a href="#" style="text-decoration:none;vertical-align:middle; margin:0 2px;" target="_blank"><img src="<?= base_url("assets/frontend/images/twitter.png"); ?>"width="15px" ></a>
                                            <a href="" style="text-decoration:none;vertical-align:middle; margin:0 2px;" target="_blank"><img src="<?= base_url("assets/frontend/images/instagram.png"); ?>" width="15px" ></a>
                                            </span>
                                            <p style="font-size: 12px; margin:5px 0;">Copyright © <?= date('Y'); ?> <?= SITE_NAME; ?>, All rights reserved.</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </body>
</html>