$(document).ready(function($){
    //Check Admin Password is correct or not

})
function adminCurrentPasswordCheck(e,message)
{
    let current_pass = $(e).val()
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/admin/check-current-password",
        type:"POST",
        data: {"v":current_pass},
        success:function (data)
        {
            if (data === 'true') {
                $(e).css("border",'1px solid green')
                $('#'+message).html('Current password match')
                $('#'+message).css('color','green')
            }
            else{
                $(e).css("border",'1px solid red')
                $('#'+message).html('Current password dose not match')
                $('#'+message).css('color','red')
            }


        },error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert("Error! "+error);
        }

    })
}
