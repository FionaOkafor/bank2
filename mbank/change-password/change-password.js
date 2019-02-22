$('#frmChangePassword').submit( function(){

    $.ajax({
        method:"POST",
        url:"api-changing-password",
        data: $('#frmChangePassword').serialize(),
        cache: false
    }).done( function(jData){
        console.log(jData)
    }
        
    ).fail(function(){
        console.log('API does not work')
    });

    return false
})