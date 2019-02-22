<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form id="frmChangePassword" method="POST">
        <input type="text" name="oldPassword" placeholder="Old password">
        <input type="text" name="newPassword" placeholder="New password">
        <input type="text" name="confirmNewPassword" placeholder="Confirm new password">
        <button>Change password</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="change-password.js"></script>
</body>
</html>