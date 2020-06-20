<?php

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
                    //echo $_SESSION['user'];
                    //require_once SITE_ROOT."/Controllers/ChatController.php";
                    header("Location:?chatpage");
                }
                else{
                    header("Location:?signin");
                    echo "Sai tai khoan mat khau";
                }
            }

        }
    }
    else{
        // chưa ấn nút đăng nhập
        require_once SITE_ROOT."/Views/sign-in.php";
    }
    //require_once SITE_ROOT."/Daos/UserDao";
    

?>