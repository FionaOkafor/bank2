<?php

$sPhone = $_GET['phone'];
$sActivationKey = $_GET['activation-key'];

//VALIDATE

$sUser = file_get_contents($sPhone.'.json');
$jUser = json_decode($sUser);

//check if the conversion is well done

if( $sActivationKey != $jUser->activationKey ){
    echo 'Canot activate';
    exit;
}

$jUser->active = 1;
$sData = json_encode( $jUser, JSON_PRETTY_PRINT );
file_put_contents( $sPhone.'.json', $sData );
echo 'User activated. <a href="login"> Click here to login</a>';