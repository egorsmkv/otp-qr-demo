<?php

require __DIR__ . '/vendor/autoload.php';

use OTPHP\TOTP;

$secret = 'OFRGWZDDNRWTI4DOGQ4XIOLWMZSGU3I='; // it must be a Base32 encoded string
$otp = TOTP::create($secret);
$otp->setLabel('otp demo');

$data = $otp->now();
$qrData = urlencode($otp->getProvisioningUri());
?>

<h4>This is QR to be scanned via Google Authenticator / another app</h4>

<img src="./qr.php?data=<?php echo $qrData; ?>" alt="QR">

<hr>

<a href="./check_code.php">Test via the app</a>
