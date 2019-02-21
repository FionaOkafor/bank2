<?php

$sPhone = $_POST['phone'];
$sPassword = $_POST['password'];

$sUser = file_get_contents( $sPhone.'.json' );
$jUser = json_decode( $sUser );

if($jUser->iLoginAttemptsLeft == 0){
    $iSecondsElapsedSinceLastLoginAttempt = $jUser->iLastLoginAttempt + 5 - time();

    if($iSecondsElapsedSinceLastLoginAttempt <= 0){
        if( $jUser->sPassword != $sPassword ){
            echo "Wrong credentials. You have to wait again";
            exit;
        }
        $jUser->iLoginAttemptsLeft = 3;
        $jUser->iLastLoginAttempt = 0;
        file_put_contents($sPhone.'.json', json_encode($jUser, JSON_PRETTY_PRINT));
        echo "You are logged in";
        exit;
        

    }

    echo "Wait $iSecondsElapsedSinceLastLoginAttempt seconds to try to login again";
    exit;
}


if( $jUser->sPassword != $sPassword ){
    $jUser->iLoginAttemptsLeft --;
    $jUser->iLastLoginAttempt = time();
    file_put_contents($sPhone.'.json', json_encode($jUser, JSON_PRETTY_PRINT));
    echo "Wrong credentials. You have {$jUser->iLoginAttemptsLeft} login attempts left";
    exit;
}

