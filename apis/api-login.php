<?php

ini_set('display_errors',0);

$sPhone = $_POST['txtLoginPhone'] ?? '';
if( empty($sPhone) ){
    sendResponse(0,__LINE__);
}
if( strlen($sPhone) != 8 ){
    sendResponse(0,__LINE__);
}
if( ctype_digit($sPhone) == false ){
    sendResponse(0,__LINE__);
}

$sPassword = $_POST['txtLoginPassword' ?? ''];
if( empty($sPassword) ){
    sendResponse(0,__LINE__);
}
if( strlen($sPassword) < 4 ){
    sendResponse(0,__LINE__);
}
if( strlen($sPassword) > 50 ){
    sendResponse(0,__LINE__);
}

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if($jData ==null){
    sendResponse(0,__LINE__);
}
$jInnerData = $jData->data;


if(!password_verify($sPassword, $jInnerData->$sPhone->password) ){
    sendResponse(0,__LINE__);
    
}

//Check if user is active
// if($jInnerData->$sPhone->active != 1) ){
//     sendResponse(0,__LINE__);
    
// }

//SUCCESS
session_start();
$_SESSION['sUserId'] = $sPhone;
sendResponse(1,__LINE__);

//*******************************

function sendResponse($bStatus, $iLineNumber){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.'}';
    exit;
}