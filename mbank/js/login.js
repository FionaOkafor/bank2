$('#frmLogin').submit( function(){

    $.ajax({
        method:"POST",
        url:"apis/api-login",
        data: $('#frmLogin').serialize(),
        dataType:"JSON"
    }).done(function(jData){
        console.log(jData)
        if(jData.status == 1){
        
            location.href = 'profile'
        }
        
    }).fail(function(){
        console.log('API does not work')
    });

    return false
})