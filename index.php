<?php
    require_once("Config/config.php");
    require_once SITE_ROOT."/Daos/UserDao.php";
    require_once SITE_ROOT."/Daos/FriendDao.php";
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
        $dao = new UserDao();
        $dao->UpdateStatusUser($_SESSION['user'], 'offline');
        session_destroy();
        header("Location:?signin");
    }
    else{
        header("Location:?signin");
    }
?>
