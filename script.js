$(document).ready(function(){
    $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
    });
});

function CheckPassword()
{
    var pass = document.getElementById('inputPassword').value;
    var repass = document.getElementById('reinputPassword').value;
    if (pass !== repass) 
    {
        document.getElementById('SignupNotification').innerHTML = "Password and repassword don't match!";
    }
    else 
    {
        document.getElementById('SignupNotification').innerHTML = "Password and repassword match!";
    }
}