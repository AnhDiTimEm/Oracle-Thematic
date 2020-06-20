<?php
    require_once("Config/Config.php");
    require_once SITE_ROOT."/Daos/UserDao.php";
    session_start();
    if (isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Controllers/ChatController.php";
    }
    else if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Controllers/SignupController.php";
    }
    else if (isset($_GET['signin'])){
        require_once SITE_ROOT."/Controllers/SigninController.php";
    }
    else if(isset($_GET['signout'])){
        session_destroy();
        header("Location:?signin");
    }
    else{
        header("Location:?signin");
        //require_once SITE_ROOT."/Views/sign-in.php";
    }
?>