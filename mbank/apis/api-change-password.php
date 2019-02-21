<?php
//user must be logged in to change their password
session_start();
$sPhone = $_SESSION['sUserId'];

$sOldPassword = $_POST['txtOldPassword'] ?? '';
if( empty($sOldPassword) ){sendResponse(0,__LINE__);}
$sNewPassword = $_POST['txtNewPassword'] ?? '';
if( empty($sNewPassword) ){sendResponse(0,__LINE__);}
if( strlen($sNewPassword) < 4 ){sendResponse(0,__LINE__);}
if( strlen($sNewPassword) > 50  ){sendResponse(0,__LINE__);}

$sNewConfirmPassword = $_POST['txtNewConfirmPassword'] ?? '';
if( empty($sNewConfirmPassword) ){sendResponse(0,__LINE__);}
if( strlen($sNewConfirmPassword) < 4 ){sendResponse(0,__LINE__);}
if( strlen($sNewConfirmPassword) > 50  ){sendResponse(0,__LINE__);}

if($sOldPassword == $sNewPassword) {sendResponse(0,__LINE__);}
if($sNewPassword != $sNewConfirmPassword) {sendResponse(0,__LINE__);}

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if ($jData == null) {sendResponse(0,__LINE__);}
$jInnerData = $jData->data;

$sOldPasswordFromFile = $jInnerData->$sPhone->password;

// if (password_verify(,$jInnerData->$sPhone->password)) {
//     echo sendResponse(0,__LINE__);}

$jInnerData->$sPhone->password == $sNewPassword;
echo  $sNewPassword;

$jData = json_encode($sData);
file_put_contents('../data/clients.json', $sData, JSON_PRETTY_PRINT);





///////////////////////////////////////////////
function sendResponse ($Status, $iLineNumber){
    echo '{"status":'.$Status.', "code":'.$iLineNumber.'}';
    exit;
}

sendResponse(1,__LINE__);



