<?php
    session_start();
    if( !isset($_SESSION['sUserId']) ){
        header('Location: login.php');
    }

    $sUserId = $_SESSION['sUserId'];

    $sData = file_get_contents('data/clients.json');
    $jData = json_decode($sData);
    if($jData == null){
        echo "Error, check the database";
    } 

    $jInnerData = $jData->data;
    $jClient = $jInnerData->$sUserId;
    
    require_once 'top.php';
?>
<main>

<section>
            <header>
            <h1>Profile</h1>
        <div>Welcome <?php echo $jInnerData->$sUserId->firstName.' '.$jInnerData->$sUserId->lastName;?> </div>
       <div>Phone: <?php echo $sUserId ?> </div>
       <div>Email: <?php echo $jInnerData->$sUserId->email; ?></div>
       <div>Balance: <span id="lblBalance"><?php echo $jInnerData->$sUserId->balance; ?></span></div>
       </header>
           <article id="left">
           <h1>Transfer</h1>
    <form id="frmTransfer">
        <input name="txtTransferToPhone" id="txtTransferToPhone" type="text" placeholder="transfer to phone">
        <input name="txtTransferAmount" id="txtTransferAmount" type="text" placeholder="transfer amount">
        <input name="txtTransferMessage" id="txtTransferMessage" type="text" placeholder="message">
        <button>Transfer</button>

           </article>

           <article id="middle">


 
        <h1>Transactions</h1>
    <table >
        <thead>
            <tr>
                <td>ID</td>
                <td>DATE</td>
                <td>AMOUNT</td>
                <td>NAME</td>
                <td>LASTNAME</td>
                <td>PHONE</td>
                <td>MESSAGE</td>
            </tr>
        </thead>
        <tbody id="lblTransactions">

            <?php
                foreach( $jClient->transactions as $sTransactionId=> $jTransaction ){
                    echo "
                      <tr>
                        <td>$sTransactionId</td>
                        <td>$jTransaction->date</td>
                        <td>$jTransaction->amount</td>
                        <td>$jTransaction->firstName</td>
                        <td>$jTransaction->lastName</td>
                        <td>$jTransaction->fromPhone</td>
                        <td>$jTransaction->message</td>
                      </tr>
                    ";
                  }
            ?>
            
            
        </tbody>
    </table>
    </form>
           </article>
           <article id="right">
           



           </article>
       </section>


        



    

</main>

       
    <?php 
        $sLinktoScript = '<script src="js/profile.js"></script>';
        require_once 'bottom.php'; ?>