<?php

require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

$data = isset($_GET['data']) ? $_GET['data']: 'none';

$qrCode = new QrCode($data);
$qrCode->setSize(300);

// Set advanced options
$qrCode->setWriterByName('png');
$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());

header('Content-Type: ' . $qrCode->getContentType());

echo $qrCode->writeString();
