<?php
    require_once("Config/Config.php");
    if(isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Views/chat.php";
    }
    if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Controllers/SignupController.php";
    }
    else if(isset($_GET['signin'])){
        //require_once SITE_ROOT."/Daos/UserDao";
        require_once SITE_ROOT."/Controllers/SigninController.php";

    }
    else{
        require_once SITE_ROOT."/Views/sign-in.php";
    }
?>