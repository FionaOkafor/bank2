<?php

//who are you, whose messages should i get?

$sUserId = $_GET['sUserId'];
$sMessages = file_get_contents('to-'.$sUserId.'.txt');
file_put_contents('to-'.$sUserId.'.txt','');

echo $sMessages;