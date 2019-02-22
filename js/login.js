$('#frmLogin').submit( function(){

    $.ajax({
        method:"POST",
        url:"apis/api-login",
        data: $('#frmLogin').serialize(),
        dataType:"json"
    }).done(function(jData){
        console.log(jData)
        if(jData.status == 1){
        
            location.href = 'profile'
        } else if(jData.status == -1) {
             $.ajax({
        method:"POST",
        url:"apis/api-lock-out-user",
        data: $('#frmLogin').serialize(),
        dataType:"json"
    }).done(function(jData){
        console.log(jData.status)


    }).fail(function(){
        console.log('lock API does not work')
    });

    return false
        }
        
    }).fail(function(){
        console.log('login API does not work')
    });

    return false
})
