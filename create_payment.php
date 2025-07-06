<?php
$token = $_POST['token']; // from bkash_token.php
$amount = $_POST['amount']; // amount to be paid
$BASE_URL = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta';

$url = "$BASE_URL/tokenized/checkout/create";
$headers = array(
    "Content-Type:application/json",
    "authorization: $token",
    "x-app-key: your_app_key"
);

$body = array(
    'mode' => '0011',
    'payerReference' => 'USER_ID_123',
    'callbackURL' => 'http://localhost/yourproject/bkash_callback.php',
    'amount' => $amount,
    'currency' => 'BDT',
    'intent' => 'sale',
    'merchantInvoiceNumber' => 'Inv'.time()
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
