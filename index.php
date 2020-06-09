<?php
    require_once("Config/config.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $homeUrl = $_SERVER['REQUEST_URI'];
    //session_start();

    //if (isset($_SESSION['dk'])) $_SESSION["dk"] = "false";
    
    $newval = 'home';  
    if(!isset($_GET['page'])) 
    {
        header('Location: ?page=' . $newval);
    }

    loadHome:
    require_once SITE_ROOT."/View/home.php"; 
?>