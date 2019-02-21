<?php

ini_set('user_agent', 'any');
ini_set('display_errors', 0);

session_start();
if( !isset($_SESSION['sUserId'] ) ){
  sendResponse(-1, __LINE__, 'You must login to use this api');
}

$sPhone = $_SESSION['sUserId'];

if( empty( $_GET['validationKey'] ) ){ sendResponse(-1, __LINE__, 'Validation key missing'); }

$sValidationKey = $_GET['validationKey'] ?? '';

$sData = file_get_contents('../data/clients.json');
$jData = json_decode( $sData );

if( $jData == null){ sendResponse(-1, __LINE__, 'Cannot convert data to JSON');  }

$jInnerData = $jData->data;


if( $jInnerData->$sPhone ){ 
    
    foreach( $jInnerData as $sKey => $jClient ){
        $jValidationKeyFromFile = $jClient->validationKey;
        // echo $jValidationKeyFromFile;
        // echo $sValidationKey;
        
        if($sValidationKey==$jValidationKeyFromFile){
            echo 'I can activate the user with validationkey = '.$sValidationKey.'   ';
        }else{
            echo 'Cannot activate user with validationkey = '.$sValidationKey.'   ';            
        }

    }
    

}