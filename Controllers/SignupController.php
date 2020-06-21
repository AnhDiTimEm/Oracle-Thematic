<?php

    if($_GET['signup']==1){ // đã ấn nút dky sau khi nhập phone,pass
        if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
            $phone = $_POST['inputPhone'];
            $pass= $_POST['inputPassword'];
            require_once SITE_ROOT."/Daos/UserDao.php";
            require_once SITE_ROOT."/Entities/Userr.php";
            $userDao = new UserDao();
            $flag = true;

            $list = $userDao->GetAllUserr();
            foreach($list as $u){
                if($u->getPhone() == $phone){
                    $flag = false; 
                }
            }
            if($flag){
                $user = new Userr($phone,$pass);
                $user->addAll($phone, $pass, 'NewEmail@gmail.com', 'New Member', './Resources/images/avatar1.jpg', 'offline', null);
                $res = $userDao->InsertUser($user);
                if($res!=null){
                    require_once SITE_ROOT."/Views/sign-in.php";
                }
                else{
                    echo("Dky fail");
                    require_once SITE_ROOT."/Views/sign-up.php";
                } 
            }
            else{
                echo "Số điện thoại Đã Được Đăng Ký! <a href='javascript: history.go(-1)'>Trở lại</a>";
            }
        }
        else{
            require_once SITE_ROOT."/Views/sign-up.php";
        }
    }
    else{
        require_once SITE_ROOT."/Views/sign-up.php";
    }
    
?>
            