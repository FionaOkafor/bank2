<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank M</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="sticky">
    <a href ="#" id ="logo">BANK OKAFOR</a>
    <nav id="nav-menu">
        <a href="index">Home</a>
        <?php

if( !isset($_SESSION['sUserId']) ){
    echo '<a href="login.php"><b>Log In</b></a>';
}else 
{
echo  '<a href="logout.php"><b>Log Out</b></a>'; 

}
?> 
        <a href="signup">Signup</a>
        <a href="profile">Profile</a>
      
    </nav>
       </div>

   