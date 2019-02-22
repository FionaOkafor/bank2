<?php

$sUserID = $_GET['userid'];
$sMessage = $_GET['message'];

$sToUser = file_get_contents('to-'.$sUserID.'.txt');
$jToUser = json_decode($sToUser);


$jInteraction = new stdClass();
$jInteraction->message = $sMessage;
$sMessageId = uniqid();

$jToUser->unreadText->$sMessageId = $jInteraction;

$sToUser = json_encode($jToUser);
file_put_contents('to-'.$sUserID.'.txt', $sToUser);



