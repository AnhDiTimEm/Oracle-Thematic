<?php
    require_once("Config/Config.php");
    require_once SITE_ROOT."/Daos/UserDao.php";
    session_start();
    if (isset($_GET['chatpage'])){
        require_once SITE_ROOT."/Controllers/ChatController.php";
    }
    else if(isset($_GET['signup'])){

        if($_GET['signup']==1){ // đã ấn nút dky sau khi nhập phone,pass
            if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
                $phone = $_POST['inputPhone'];
                $pass= $_POST['inputPassword'];
                require_once SITE_ROOT."/Daos/UserDao.php";
                require_once SITE_ROOT."/Entities/Userr.php";
                $userDao = new UserDao();
                $user = new Userr($phone,$pass,null,null,null,null,null);
                $res = $userDao->InsertUser($user);
                if($res==1){
                    echo("DangKy Ok");
                    require_once SITE_ROOT."/Controllers/SigninController.php";
                }
                else{
                    echo("Dky fail");
                    require_once SITE_ROOT."/Controllers/SignupController.php";
                }
                
            }
        }
        else{
            require_once SITE_ROOT."/Controllers/SignupController.php";
        }
    }
    else if (isset($_GET['signin'])){
        if($_GET["signin"]==1){
            if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
                $phone = $_POST['inputPhone'];
                $pass = $_POST['inputPassword'];
                $dao = new UserDao();
                $user = $dao->GetUserByPhone($phone);
                //echo $user->getPhone()." ".$user->getPassword();

                if($user!=null){
                    if($user->getPhone() == $phone && $user->getPassword()==$pass){
                        //require_once SITE_ROOT."/Controllers/chatController.php";
                        $_SESSION['user'] = $phone;
                        echo $_SESSION['user'];
                        //require_once SITE_ROOT."/Controllers/ChatController.php";
                        header("Location:?chatpage");
                    }
                    else{
                        echo "Sai tai khoan mat khau";
                        header("Location:?signin");
                    }
                }
    
            }
        }
        else{
            // chưa ấn nút đăng nhập
            require_once SITE_ROOT."/Views/sign-in.php";
        }
        //require_once SITE_ROOT."/Daos/UserDao";
        

    }
    else if(isset($_GET['signout'])){
        session_destroy();
        header("Location:?signin");
    }
    else{
        require_once SITE_ROOT."/Views/sign-in.php";
    }
?>