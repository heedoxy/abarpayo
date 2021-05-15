<?php
require_once "functions/database.php";
$action = new Action();
   
$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
// $Amount = 10000; //Amount will be based on Toman
$Amount =$_SESSION['marketer_amount'];
$Authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {

$client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,
]
);

if ($result->Status == 100) {
// echo '<br>Transation success. RefID:'.$result->RefID;
$marketer_id = $action->marketer()->id;
$command = $action->marketer_payment_add($marketer_id,$Amount,$cart_number,$result->RefID,1);
$action->marketer_paymentid_add($marketer_id,$command);
$action->marketer_wallet_log_add($marketer_id,12,$Amount,1,$command);
$action->marketer_change_status($marketer_id);
$_SESSION['marketer_access'] = $action->marketer_get($marketer_id)->package_id;
$_SESSION['successful_pay'] = 'true';
echo "<script> location.href='index.php'; </script>";
} else {
    unset($_SESSION['marketer_id']);
    $_SESSION['successful_pay'] = 'false';
    echo "<script> location.href='marketer-phone.php'; </script>";
}
} else {
    unset($_SESSION['marketer_id']);
    echo "<script> location.href='marketer-phone.php'; </script>";
}