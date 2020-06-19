<?php
    require_once("Config/Config.php");
    if(isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Controllers/ChatPageController.php";
    }
    else{

    require_once SITE_ROOT."/Controllers/LoginController.php";
    }
?>