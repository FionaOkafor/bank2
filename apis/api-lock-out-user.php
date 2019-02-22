<?php

$sPhone = $_POST['txtLoginPhone'] ?? '';
if( empty($sPhone) ){sendResponse(0,__LINE__,'enter a phone');}
if( strlen($sPhone) != 8 ){sendResponse(0,__LINE__,'phone is wrong number of digits');}
if( ctype_digit($sPhone) == false ){sendResponse(0,__LINE__,'enter digits only');}


$sPassword = $_POST['txtLoginPassword' ?? ''];
if( empty($sPassword) ){sendResponse(0,__LINE__,'enter a password');}

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
$jInnerData = $jData->data;

//check if phone is registered
if($sPhone === $jInnerData->$sPhone) {
    sendResponse(1,__LINE__,'phone is registered');
}


if($jInnerData->$sPhone->iLoginAttemptsLeft == 0){
    $iSecondsElapsedSinceLastLoginAttempt = $jInnerData->$sPhone->iLastLoginAttempt + 5 - time();

    if($iSecondsElapsedSinceLastLoginAttempt <= 0){
        if( $jInnerData->$sPhone->password != $sPassword ){

            sendResponse(-1,__LINE__,"Wrong credentials. You have to wait again");
            exit;
        }
   
    }

    sendResponse(-1,__LINE__,"Wait $iSecondsElapsedSinceLastLoginAttempt seconds to try to login again");
    exit;

}

if(!password_verify($sPassword, $jInnerData->$sPhone->password)){
    $jInnerData->$sPhone->iLoginAttemptsLeft --;
    if ($jInnerData->$sPhone->iLoginAttemptsLeft === 0) {
            $jInnerData->$sPhone->iLastLoginAttempt = time();
    }
    
    file_put_contents('../data/clients.json', json_encode($jData, JSON_PRETTY_PRINT));
    sendResponse(-1,__LINE__,"Wrong credentials. You have {$jInnerData->$sPhone->iLoginAttemptsLeft} login attempts left");
  
    exit;
}

if(password_verify($sPassword, $jInnerData->$sPhone->password)){
    $jInnerData->$sPhone->iLoginAttemptsLeft = 3;
    $jInnerData->$sPhone->iLastLoginAttempt = 0;
    file_put_contents('../data/clients.json', json_encode($jData, JSON_PRETTY_PRINT));
    echo "You are logged in";
    exit;
}



//////////////////////////////////
function sendResponse ($Status, $iLineNumber,$sMessage){
    echo '{"status":'.$Status.', "code":'.$iLineNumber.',"message":'.$sMessage.'}';
    exit;
}
//check log in phone exists in the innerdata
//check password matches the password of the phone in the file
//user has three password attempt in file

//if the passwird does not match prompt the user to try again. take one away from passwordattempts in file
//when the number of tries reaches 0 then 
// password attemps = 0 for time plus 60s secnds
