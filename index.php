<?php
    require_once("Config/Config.php");
    if(isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Views/chat.php";
    }
    if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Views/sign-up.php";
    }
    else{

    require_once SITE_ROOT."/Views/sign-in.php";
<<<<<<< HEAD
=======
=======
        require_once SITE_ROOT."/Controllers/ChatPageController.php";
    }
    else if(isset($_GET['signup'])){
        require_once SITE_ROOT."/Daos/UserDao";
    }
    else if(isset($_GET['signin'])){

    }
    else{

    require_once SITE_ROOT."/Controllers/LoginController.php";
>>>>>>> master
>>>>>>> master
    }
?>