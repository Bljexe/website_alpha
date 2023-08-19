<?php

$amount = $_POST['amount'];
$methodPay = $_POST['method_pay'];

echo "Em desenvolvimento";
exit;

if (empty($amount) || empty($methodPay)) {
    header('Location: https://sympserver.com/donate');
    exit();
}

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6834350115957158-081910-6b1eef13db76f3162cc94eed8370e32a-58757528"); // Either Production or SandBox AccessToken

$payment = new MercadoPago\Payment();

$payment->transaction_amount = $amount;
$payment->token = "";
$payment->description = "Ogrines";
$payment->installments = 1;
$payment->payment_method_id = $methodPay;
$payment->payer = array(
    "email" => ""
);

$payment->save();

echo $payment->status;
