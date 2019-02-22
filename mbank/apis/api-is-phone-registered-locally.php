<?php

ini_set('display_errors', 0);

session_start();
if( !isset($_SESSION['sUserId']) ){
    sendResponse(-1,__LINE__,'You must login to use this api');
}


if( empty($_GET['phone']) ){sendResponse(-1,__LINE__,'Phone missing');}

$sPhone = $_GET['phone'] ?? '';
if( strlen($sPhone) != 8 ){
    sendResponse(-1,__LINE__,'Phone must be 8 digits');
}
if( ctype_digit($sPhone) == false ){
    sendResponse(-1,__LINE__,'Phone can only be numbers');
}

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);

if($jData == null){
    sendResponse(-1,__LINE__,'Cannot convert data to JSON');
}

$jInnerData = $jData->data;

if( !$jInnerData->$sPhone ){
    sendResponse(0,__LINE__,'Phone is not registered locally');
}

sendResponse(1,__LINE__,'Phone is registered locally');

// getListOfBanksFromCentralBank();
//Continue transferring the money
//Take money from the logged user
//Give it to the corresponding phone


/******************************/

function sendResponse($iStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$iStatus.', "code":'.$iLineNumber.',"message":"'.$sMessage.'"}';
    exit;
}
function getListOfBanksFromCentralBank(){
    //get the listof banks
    $sData = file_get_contents('https://ecuaguia.com/central-bank/api-get-list-of-banks.php?key=1111-2222-3333');
    echo $sData;
}

