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


    echo $sAttempts;
}else{
    echo "Passwords match";
}

//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p></p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        console.log("<?= $sAttempts ?>")
        let a = 20
        if("<?= $sAttempts ?>"==0){
            let myTimer = setInterval(function() {
                a=a-1
                $('p').text('You have '+a+' seconds left until your next login attempt')
                console.log(a)
                if(a==0){
                    $('p').text('You can login again')
                    clearInterval(myTimer)
                }
            }, 1000);
        }
    </script>
</body>
</html>