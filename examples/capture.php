<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

$path = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
$fileName = $path . "/vendor/autoload.php";
//echo $fileName;
require_once($fileName);

use Cielo\ApiService;
use Cielo\Model\Sale\CaptureRequest;

$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
]);

$paymentId = '00000000-0000-0000-0000-000000000000';
$captureRequest = new CaptureRequest([
    'amount' => 15099,
    'serviceTaxAmount' => 0
]);

// retorna Cielo\Model\CaptureResponse
$capture = $service->capture($paymentId, $captureRequest);

if ($capture->isValid()) {
    // status da transacao
    $status = $capture->getStatus();

    echo '<h2>isValid</h2>';
    \Zend\Debug\Debug::dump($status);

} else {
    $messages = $capture->getMessages();

    echo '<h2>Not isValid</h2>';
    \Zend\Debug\Debug::dump($messages);

}