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
        }else{
            swal({
                title: "Incorrect Login",
                text: "Please enter valid login details",
                icon: "warning",
            });
        }
        
    }).fail(function(){
        console.log('API does not work')
    });

    return false
})