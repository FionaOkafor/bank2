<?php 
    require_once 'top.php'; 
?>
<main>
       
       <section>
            <header>
            <h1>Login</h1>
       </header>
           <article id="left"></article>

           <article id="middle">

           <form id="frmLogin" action='apis/api-login' method="POST">
        <input name="txtLoginPhone" type="text" placeholder="phone" 
         data-validate="yes" data-min="8" data-max="8" data-type="integer">
        <input name="txtLoginPassword" type="password" placeholder="password"
        data-validate="yes" data-min="4" data-max="50" data-type="string">
        <button class="sign-up-button">Login</button>
        <button class="small-button">Forgot Password</button>
      
    </form>
           </article>
           <article id="right"></article>
       </section>
   </main>
  


<?php 
    $sLinktoScript = '<script src="js/login.js"></script>';
    require_once 'bottom.php'; ?>