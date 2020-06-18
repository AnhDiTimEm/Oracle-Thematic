<?php
    require_once("Config/Config.php");
    
    if(isset($_GET['chatpage'])){
        require_once SITE_ROOT."/View/chatpage.php";
    }
    else{

    require_once SITE_ROOT."/View/login.php";
    }
?>