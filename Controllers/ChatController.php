<?php
    if(($_SESSION['user']) == null){
        header("Location:?signin");
    }
    else{
        require_once SITE_ROOT."/Views/chat.php";
    }
?>