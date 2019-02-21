<?php




$sPhone = $_POST['txtSignupPhone'] ?? '';
if( empty($sPhone) ){sendResponse(0,__LINE__);}
if( strlen($sPhone) != 8 ){sendResponse(0,__LINE__);}
if( intval($sPhone) < 10000000 ){sendResponse(0,__LINE__);}
if( intval($sPhone) > 99999999 ){sendResponse(0,__LINE__);}


//validate name

$sFirstName = $_POST['txtSignupFirstName'] ?? '';
if( empty($sFirstName) ){sendResponse(0,__LINE__);}
if( strlen($sFirstName) < 2 ){sendResponse(0,__LINE__);}
if( strlen($sFirstName) > 20 ){sendResponse(0,__LINE__);}

//validate lastname
$sLastName = $_POST['txtSignupLastname'] ?? '';
if( empty($sLastName) ){sendResponse(0,__LINE__);}
if( strlen($sLastName) < 2 ){sendResponse(0,__LINE__);}
if( strlen($sLastName) > 20 ){sendResponse(0,__LINE__);}

//validate cpr
$sCpr = $_POST['txtSignupCpr'] ?? '';
if( empty($sCpr) ){sendResponse(0,__LINE__);}
if( strlen($sCpr) != 10 ){sendResponse(0,__LINE__);}
if( ctype_digit($sCpr) == false ){sendResponse(0,__LINE__);}


//validate email
$sEmail = $_POST['txtSignupEmail'] ?? '';
if( empty($sEmail) ){sendResponse(0,__LINE__);}
if( !filter_var($sEmail, FILTER_VALIDATE_EMAIL) ){sendResponse(0,__LINE__);}

//validate password
$sPassword =$_POST['txtSignupPassword'] ?? '';
// $sPassword = password_hash($_POST['txtSignupPassword'], PASSWORD_DEFAULT);
if( empty($sPassword) ){sendResponse(0,__LINE__);}
if( strlen($sPassword) < 4 ){sendResponse(0,__LINE__);}
if( strlen($sPassword) > 50  ){sendResponse(0,__LINE__);}

//validate confirm password
$sConfirmPassword =$_POST['txtSignupConfirmPassword'] ?? '';
if($sPassword != $sConfirmPassword){endResponse(0,__LINE__);}

$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);

if($jData ==null){
    sendResponse(0,__LINE__);
}
$jInnerData = $jData->data;

//validate balance
// $iBalance = $_POST['txtSignupBalance'] ?? '';
// if( empty($iBalance) ){
//     sendResponse(0,__LINE__);
// }
// if( is_numeric($iBalance) == false ){
//     sendResponse(0,__LINE__);
// }

//"111":{"name":"A"}
// $jClient = new stdClass(); //json object
// $jClient->$sPhone = new stdClass();
// $jClient->$sPhone->name = $sName;

$jClient = new stdClass(); //json object
$jClient->firstName = $sFirstName;
$jClient->lastName = $sLastName;
$jClient->cpr = $sCpr;
$jClient->email = $sEmail;
$jClient->balance = 0;
$jClient->active = 1;
$jClient->activationKey = uniqid();
$jClient->password = password_hash($sPassword, PASSWORD_DEFAULT);
$jClient->transactions = new stdClass();
$jClient->transactionsNotRead = new stdClass();
$jInnerData->$sPhone = $jClient;

$jClient->accounts = new stdClass();
$jAccount = new stdClass();
$jAccount->balance = 0;
$sAccountId = uniqid();
$jClient->accounts->$sAccountId = $jAccount;



$sData = json_encode($jData);
if( $sData == null ){
    sendResponse(0,__LINE__);
}

$uTest = file_put_contents('../data/clients.json', $sData);

// sendResponse($uTest, __LINE__);


//SUCCESS


// $to  = $jInnerData->$sPhone->email;
// $subject = 'You have signed up for Bank M!';
// $message = '
//     <a href="http://localhost:1234/bank/apis/api-activate-email?validationKey=KEY3">Activate email</a>
// ';
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
// $headers .= "From: Bank M sign up <mb@marijabelautdinova.com>\r\n"; 

// mail($to, $subject, $message, $headers)

sendResponse(1,__LINE__);



//********************************************************

function sendResponse($Status, $iLineNumber){
    echo '{"status":'.$Status.', "code":'.$iLineNumber.'}';
    exit;
}

sendResponse(1,__LINE__);

// $jInnerData->99999999->transactions->ID1->message = 0

//transactions = {}