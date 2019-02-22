<?php
    $sUserId = $_GET['user'];
    echo $sUserId;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT</title>
    <style>
        body{
            display: grid;
            justify-items: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            font-size: 20px;
        }
        body > div{
            width: 500px;
            height: 500px;
            border: 2px solid blue;
            position: relative;
            padding: 20px;
        }
        form{
            position: absolute;
            bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>CHAT</h1>
    <div>
        <div id="lblMessages">
            abc
        </div>
        <form>
            <input name="txt-user-id" type="text" value="<?= $sUserId ?>">
            <input name="txt-message" type="text" id="txtMessage">
            <button>Send</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        let sUserId = '<?= $sUserId; ?>'



        $('form').submit( function(){
            $.ajax({
                method: "POST",
                url: "api-set-message.php",
                data: $('form').serialize(),
                cache: false
            }).done(function(sMessages){
                console.log('done')
            }).fail(function(){ })
            return false
        })

        setInterval(function() {
            $.ajax({
                method: "GET",
                url: "api-get-messages.php?sUserId="+sUserId,
                cache: false
            }).done(function(sMessages){
                sMessages = sMessages.replace(':)', '🦄')
                $('#lblMessages').append('<div>'+sMessages+'</div>')
            }).fail(function(){ })
            
        }, 1000);
    </script>
</body>
</html>