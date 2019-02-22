<?php

$sUserId = '25252525';

$sUser = file_get_contents($sUserId.'.json');
$jUser = json_decode($sUser);

$sOldPassword = $_POST['old-password'];
$sNewPassword = $_POST['new-password'];
$sConfirmNewPassword = $_POST['confirm-new-password'];

if($sOldPassword != $jUser->password ){
    echo 'Sorry, could not update';
    exit;
}

$jUser->password = $sNewPassword;

$sData = json_encode( $jUser, JSON_PRETTY_PRINT );
file_put_contents( $sUserId.'.json', $sData );
echo 'Password updated';