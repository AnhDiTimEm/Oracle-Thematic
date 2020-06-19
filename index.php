<?php
    require_once("Config/Config.php");
    if (isset($_GET['chatpage'])){
        if ($_GET['chatpage'] == '1') require_once SITE_ROOT."/Controllers/ChatController.php";
        else require_once SITE_ROOT."/Controllers/ChatController_2.php";
    }
    else if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Controllers/SignupController.php";
    }
    else if (isset($_GET['signin'])){
        //require_once SITE_ROOT."/Daos/UserDao";
        require_once SITE_ROOT."/Controllers/SigninController.php";

    }
    else{
        require_once SITE_ROOT."/Views/sign-in.php";
    }
?>