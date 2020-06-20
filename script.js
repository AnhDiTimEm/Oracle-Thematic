$(document).ready(function(){
    $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
    });
});

function CheckPassword()
{
    var pass = document.getElementById('inputPassword').value;
    var repass = document.getElementById('reinputPassword').value;
    if (pass.length === 0 || repass.length === 0) return 1;
    if (pass !== repass) 
    {
        document.getElementById('SignupNotification').style = "color: red;";
        document.getElementById('SignupNotification').innerHTML = "Password and repassword don't match!";
        return 1;
    }
    else 
    {
        document.getElementById('SignupNotification').style = "color: green;";
        document.getElementById('SignupNotification').innerHTML = "Password and repassword match!";
        return 0;
    }
}

function CheckPhone()
{
    var phone = document.getElementById('inputPhone').value;
    if (phone.length !== 11 && phone.length !== 10)
    {
        document.getElementById('SignupNotification').style = "color: red;";
        document.getElementById('SignupNotification').innerHTML = "Invalid phone number!";
        return 1;
    }
    else
    {
        document.getElementById('SignupNotification').innerHTML = "";
        return 0;
    }
    
}

function CheckInformation()
{
    if (CheckPhone() === 0)
    {
        if (CheckPassword() === 0)
        {
            document.getElementById('sign-up').disabled = false;
        }
    }
}