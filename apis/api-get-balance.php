<?php

session_start();

$sUserId = $_SESSION['sUserId'];
// $sPhoneFromOtherServer = $_GET['phone'];
// $iAmountFromOtherServer = $_GET['amount'];
// echo $sPhoneFromOtherServer;

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
$jInnerData = $jData->data;

echo $jInnerData->$sUserId->balance;

// fnjSendBalancePhoneAndAmount($jInnerData->$sUserId->balance, $sPhoneFromOtherServer, $iAmountFromOtherServer );

// function fnjSendBalancePhoneAndAmount($iBalance, $sPhone, $iAmount){
//     echo '{"balance": '.$iBalance.', "senderPhone": '.$sPhone.', "senderAmount": '.$iAmount.'}';
//     exit;
// }

