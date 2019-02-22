$('#frmTransfer').submit(function(){

$.ajax({
method : "GET",
url : 'apis/api-is-phone-registered-locally',
data : {"phone":$('#txtTransferToPhone').val()},
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
    $.ajax({
    method : "GET",
    url : 'https://ecuaguia.com/central-bank/api-get-list-of-banks.php',
    data: {"key":"1111-2222-3333"},
    cache: false,
    dataType: "JSON"
    }).
    done(function(jData){
        console.log(jData)
    }).
    fail(function(){
        console.log('fatal error')
    })
}
if(jData.status == 1){
    console.log('*************')
    console.log(jData)
    }
}).fail(function(){
    console('fatal error')
})
    return false;
})