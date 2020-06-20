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
        if($_GET["signin"]==1){
            if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
                $phone = $_POST['inputPhone'];
                $pass = $_POST['inputPassword'];
                echo($phone.' '.$pass);
                require_once SITE_ROOT."/Daos/UserDao.php";
                require_once SITE_ROOT."/Entities/Userr.php";
                $dao = new UserDao();
                $user = $dao->GetUserByPhone($phone);
                echo $user->getPhone()." ".$user->getPassword();

                if($user!=null){
                    if($user->getPhone() == $phone && $user->getPassword()==$pass){
                        //require_once SITE_ROOT."/Controllers/chatController.php";
                        echo("đung");
                    }
                }
                else{
                    // ko có user
                }
    
            }
        }
        else{
            // chưa ấn nút đăng nhập
            require_once SITE_ROOT."/Views/sign-in.php";
        }
        //require_once SITE_ROOT."/Daos/UserDao";
        

    }
    else{
        require_once SITE_ROOT."/Views/sign-in.php";
    }
?>