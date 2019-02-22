<?php 

ini_set('user_agent', 'any');
ini_set('display_errors', 0);

session_start();

$sPhone = $_SESSION['sUserId'];


//if phone exists in this bank
//GET data from the api-transfer url

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if($jData == null){
    fnvSendResponse(-1, __LINE__, "Cannot convert the data file to JSON");
}
$jInnerData = $jData->data;


$sPhoneFromOtherServer = $_GET['phone'];


$iAmountToTransfer = $_GET['amount'];
if(empty($iAmountToTransfer) ) {fnvSendResponse(0, __LINE__, "You must enter an amount");}
if(empty($iAmountToTransfer) ) {fnvSendResponse(0, __LINE__, "You must enter an amount");}


$sMessageFromOtherServer = $_GET['message'];
if(empty($sMessageFromOtherServer) ) {fnvSendResponse(0, __LINE__, "You must enter a message");}
if(strlen($sMessageFromOtherServer) < 2 ) {fnvSendResponse(0, __LINE__, "You must enter minimum two characters");}

//TODO VALIDATE THE AMOUNT!
//TODO VALIDATE THE MESSAGE!


if( !$jInnerData->$sPhoneFromOtherServer ){
    fnvSendResponse(0, __LINE__, "Phone not registered in Bank Okafor");
}


// echo $jInnerData->$sPhoneFromOtherServer->balance;
// exit;
//Give the amount to a registered phone
$jInnerData->$sPhoneFromOtherServer->balance += $iAmountToTransfer;

//if the balance of the current user logged in is equal to 0 the transaction cannot be made


$jTransaction->date = time();
$jTransaction->amount = $iAmountToTransfer;
$jTransaction->firstName = 'Name that I hardcoded';
$jTransaction->lastName = 'Lastname that I hardcoded';
$jTransaction->fromPhone = $sPhoneFromOtherServer;
$jTransaction->message = $sMessageFromOtherServer;

$sTransactionUniqueId = uniqid();

$jInnerData->$sPhoneFromOtherServer->transactionsNotRead->$sTransactionUniqueId = $jTransaction;
$jInnerData->$sPhoneFromOtherServer->transactions->$sTransactionUniqueId = $jTransaction;


$sData = json_encode($jData);
file_put_contents('../data/clients.json', $sData);



//Check if this was successful

fnvSendResponse(1, __LINE__, "Transaction success with Bank Okafor");

//************************/
function fnvSendResponse( $iStatus, $iLineNumber, $sMessage ){
    echo '{"status": '.$iStatus.', "code": '.$iLineNumber.', "message": "'.$sMessage.'"}';
    exit;
}

//get tthe amount and the message and 
//set the new balance to the phone number, 
//then reply to the server saying, that the transaction was successful

//else - no phone or something went wrong - reply with an error



//update the amount in the json