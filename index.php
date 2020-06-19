<?php
    require_once("Config/Config.php");
    if(isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Controllers/ChatPageController.php";
    }
    else if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Daos/UserDao";
    }
    else if(isset($_GET['signin'])){

    }
    else{

    require_once SITE_ROOT."/Controllers/LoginController.php";
    }
?>