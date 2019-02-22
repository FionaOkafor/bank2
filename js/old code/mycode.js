$('#frmTransfer').submit(function(){

    $.ajax({
        method: "GET",
        url: 'apis/api-is-phone-registered-locally',
        data: { "phone": $('#txtTransferToPhone').val() },
        cache: false,
        dataType:"JSON"
    }).done(function(jData){
        if(jData.status == -1){
            console.log('***********')
            console.log(jData)
        }
        if(jData.status == 0){
            console.log('***********')
            console.log('Go get the list of banks')
            $.ajax({
                method: "GET",
                url: 'https://ecuaguia.com/central-bank/api-get-list-of-banks.php',
                data: {"key":"1111-2222-3333"},
                cache: false,
                dataType: "JSON"
            }).done(function(){
                console.log(jData)
            }).fail(function(){
                console.log('Fatal error')
            })
        } //end of 0 case



        if(jData.status == 1){
            console.log('***********')
            console.log(jData)
            //TODO: continue with a local transfer
        }
    }).fail(function(){
        console.log('Fatal error')
    })

    return false
})