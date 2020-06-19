<?php
    require_once("Config/Config.php");
    if(isset($_GET['chatpage'])){
<<<<<<< HEAD
        require_once SITE_ROOT."/Views/chat.php";
    }
    if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Views/sign-up.php";
    }
    else{

    require_once SITE_ROOT."/Views/sign-in.php";
=======
        require_once SITE_ROOT."/Controllers/ChatPageController.php";
    }
    else{

    require_once SITE_ROOT."/Controllers/LoginController.php";
>>>>>>> master
    }
?>