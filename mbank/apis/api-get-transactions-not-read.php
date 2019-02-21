<?php

//check if the user is logged

session_start();
$sUserId = $_SESSION['sUserId'];

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
//TODO CHeck if json is valid
$InnerData = $jData->data;

$jTransactionsNotRead = $jInnerData->$sUserId->transactionsNotRead;

echo json_encode($jTransactionsNotRead);
//TODO: Delete what is inside the transactionsNotRead