<?php
/*

- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.

*/
// define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
define('PAYTM_ENVIRONMENT', 'PROD'); // PROD

if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_DOMAIN = 'secure.paytm.in';
	define('PAYTM_MERCHANT_KEY', 'eW4emRzhmYfrY3M_'); //Change this constant's value with Merchant key downloaded from portal
	define('PAYTM_MERCHANT_MID', 'RAMATE62781433624125'); //Change this constant's value with MID (Merchant ID) received from Paytm
	define('PAYTM_MERCHANT_WEBSITE', 'RAMATWEB'); //Change this constant's value with Website name received from Paytm
}
else {
	$PAYTM_DOMAIN = "pguat.paytm.com";
	define('PAYTM_MERCHANT_KEY', 'q%3%1NHEYwvY7sKN'); //Change this constant's value with Merchant key downloaded from portal
	define('PAYTM_MERCHANT_MID', 'Travel52849221114485'); //Change this constant's value with MID (Merchant ID) received from Paytm
	define('PAYTM_MERCHANT_WEBSITE', 'WEB_STAGING'); //Change this constant's value with Website name received from Paytm
}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');

?>