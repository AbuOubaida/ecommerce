$(document).ready(function($){
    //Check Admin Password is correct or not

})
function adminCurrentPasswordCheck(e)
{
    let current_pass = $(e).val()
    $.ajax({
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        url:"/admin/check-current-password",
        type:"POST",
        data: {"v":current_pass},
        success:function (data)
        {
            console.log(data)
        },error:function (error)
        {
            console.log(error)
        }
    })
}
