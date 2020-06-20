<?php

   if($_GET["signin"]==1){
        if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
            $phone = $_POST['inputPhone'];
            $pass = $_POST['inputPassword'];
            $dao = new UserDao();
            $listt = $dao->GetAllUserr();

            $user = new Userr(null, null);
            foreach ($listt as $userr)
            {
                //echo $userr;
                if ($userr->getPhone() === $phone)
                {
                    $user = $dao->GetUserByPhone($phone);
                }
            }

            //echo $user->getPhone()." ".$user->getPassword();

            if($user->getPhone() != null){
                if($user->getPhone() == $phone && $user->getPassword() == $pass){
                    //require_once SITE_ROOT."/Controllers/chatController.php";
                    $_SESSION['user'] = $phone;
                    //echo $_SESSION['user'];
                    //require_once SITE_ROOT."/Controllers/ChatController.php";
                    header("Location:?chatpage");
                }
                else
                {
                    echo "Mật khẩu không đúng! <a href='javascript: history.go(-1)'>Trở lại</a>";
                }
            }
            else
            {
                echo "Số điện thoại không tồn tại! <a href='javascript: history.go(-1)'>Trở lại</a>";
            }

        }
    }
    else{
        // chưa ấn nút đăng nhập
        require_once SITE_ROOT."/Views/sign-in.php";
    }
    //require_once SITE_ROOT."/Daos/UserDao";
    

?>