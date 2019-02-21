<?php

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

$sUser = file_get_contents('25252525.json');
$jUser = json_decode($sUser);

if($jUser ==null){
    sendResponse(0,__LINE__);
}

if($oldPassword != $jUser->password){
    $sPasswordFromFile = $jUser->password;
    echo sendResponse(0,__LINE__,'Old password does not match');
}

$jUser->password = $newPassword;
$sData = json_encode( $jUser, JSON_PRETTY_PRINT);
file_put_contents( '25252525.json', $sData );

echo sendResponse(1,__LINE__,'Password successfully changed');



function sendResponse($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.', "message":"'.$sMessage.'"}';
    exit;
}