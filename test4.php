<?php
$to  = 'mb@marijabelautdinova.com';

// subject
$subject = 'Test activate';

// message
$message = '
    <a href="http://localhost:1234/bank/apis/api-activate-email?validationKey=KEY3">Activate email</a>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Mail it
if( mail($to, $subject, $message, $headers) ){
    echo 'Email sent';
    exit;
}
echo 'cannot send the email';
?>