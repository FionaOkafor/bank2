<?php require_once 'top.php'; ?>

    <h1>Signup</h1>
    <form id="frmSignup" action='apis/api-signup' method="POST">
        <input name="txtSignupPhone" type="text" placeholder="phone"
          data-validate="yes" data-min="8" data-max="8" data-type="integer">
        <input name="txtSignupFirstName" type="text" placeholder="first name"
         data-validate="yes" data-min="2" data-max="20" data-type="string">
        <input name="txtSignupLastname" type="text" placeholder="last name"
         data-validate="yes" data-min="2" data-max="20" data-type="string">
        <input name="txtSignupEmail" type="text" placeholder="email"
        data-validate="yes" data-type="email" data-min="6" data-max="50">
        <input name="txtSignupCpr" type="text" placeholder="cpr"
         data-validate="yes" data-min="10" data-max="10" data-type="integer">
        <input name="txtSignupPassword" type="password" placeholder="password"
         data-validate="yes" data-type="string" data-min="4" data-max="50">
        <input name="txtSignupConfirmPassword" type="password" placeholder="confirm password"
         data-validate="yes" data-type="string" data-min="4" data-max="50">
        <button>Signup</button>
    </form>

    

<?php 
$sLinktoScript = '<script src="js/signup.js"></script>';
require_once 'bottom.php'; ?>