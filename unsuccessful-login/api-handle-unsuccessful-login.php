<?php

//3 times wrong
//Block for 1 minute + show the countdown
//if the user logs in correctly, they will have 3 attempts again

$sLogin = $_GET['login'];
$sPassword = $_GET['password'];

$sActualLogin = "1234";
$sActualPassword = "1234";


//Compare password to the actual password
if($sPassword != $sActualPassword){
    echo "Passwords don't match";
    $sAttempts = 1;
    $sAttempts=--$sAttempts;

    if($sAttempts==0){
        echo 'Wait 10 seconds and try to login again';
        setInterval( function(){
            $a++;
            echo $a;
        }, 1000);

        
    }

    echo $sAttempts;
    exit;
}



echo "Passwords match";

//