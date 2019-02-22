<?php

$sUserID = "a";

$sToUser = file_get_contents('to-'.$sUserID.'.txt');
$jToUser = json_decode($sToUser);
$sMessageId = "5c6a993fb7b69";

foreach( $jToUser as $sKey => $jMessage ){
    echo $jToUser->unreadText->$sMessageId->message;
}