//Talk to the server and get the balance of logged in user
//Self-invoking function (function(){})()
function fnvGetBalance(){
    var money = new Audio('money.mp3')
    setInterval(function(){
        $.ajax({
            method: "GET",
            url: 'apis/api-get-balance',
            cache: false
        }).done(function( sBalance ){
            if( sBalance != $('#lblBalance').text() ){
                $('#lblBalance').text(sBalance)
                money.play()    
                swal({
                    title: "Congrats",
                    text: "You have received money",
                    icon: "success",
                })
            }
        }).fail(function(){})

        $.ajax({
            method: "GET",
            url: 'apis/api-get-transactions-not-read',
            cache: false,
            dataType : "JSON"
        }).done(function( jTransactions ){
            
            for (let jTransactionKey in jTransactions){
                console.log(jTransactionKey)
                let jTransaction = jTransactions[jTransactionKey] // get object from key
                let date = jTransaction.date
                let amount = jTransaction.amount
                let name = jTransaction.name
                let lastname = jTransaction.lastname
                let fromPhone = jTransaction.fromPhone
                let message = jTransaction.message
                
                //string literals
                let sTransactionTr = `
                <tr>
                    <td>${jTransactionKey}</td>
                    <td>${date}</td>
                    <td>${amount}</td>
                    <td>${name}</td>
                    <td>${lastname}</td>
                    <td>${fromPhone}</td>
                    <td>${message}</td>
                </tr>       
                ` 
                $('#lblTransactions').prepend(sTransactionTr)

            }
        }).fail(function(){})


    }, 10000)
}

fnvGetBalance()

// function fnvGetTransaction(){
//     var money = new Audio('money.mp3')
//     setInterval(function(){
//         $.ajax({
//             method: "GET",
//             url: 'apis/api-get-transaction',
//             cache: false
//         }).done(function( jData ){
            
//         }).fail(function(){

//         })
//     }, 1000)
// }

// fnvGetTransaction()


$('#frmTransfer').submit(function(){

    $.ajax({
        method : "GET",
        url : 'apis/api-transfer',
        data : {
            "phone":$("#txtTransferToPhone").val(),
            "amount":$("#txtTransferAmount").val(),
            "message":$("#txtTransferMessage").val(),
            },
        cache: false,
        dataType:"JSON"
    }).
    done(function(jData){
    if(jData.status == -1){
        console.log('*************')
        console.log(jData)
    }
    if(jData.status == 0){
        console.log('*************')
        console.log('go get list of banks')
    }
    if(jData.status == 1){
        console.log('*************')
        console.log(jData)
        }
        if(jData.status == 3){
            swal({
                title: "INSUFFINCENT FUNDS",
                text: "You do not have enough to make this transaction",
                icon: "warning",
            });
            console.log(jData)
            }
    }).fail(function(){
        console.log('fatal error')
    })
        return false;
    });
//**********************/




// let money = new Audio('money.mp3')
// money.play()