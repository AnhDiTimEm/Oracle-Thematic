<?php

    if($_GET['signup']==1){ // đã ấn nút dky sau khi nhập phone,pass
        if(isset($_POST['inputPhone']) && isset($_POST['inputPassword']) && isset($_POST['reinputPassword'])){
            $phone = $_POST['inputPhone'];
            $pass= $_POST['inputPassword'];
            $repass = $_POST['reinputPassword'];

            if ($pass != $repass){
                echo "Nhập mật khẩu không khớp, yêu cầu nhập lại! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }

            require_once SITE_ROOT."/Daos/UserDao.php";
            require_once SITE_ROOT."/Entities/Userr.php";

            $userDao = new UserDao();
            $user = new Userr($phone,$pass);
            $res = $userDao->InsertUser($user);

            if($res==1){
                echo("DangKy Ok");
                require_once SITE_ROOT."/Views/sign-in.php";
            }
            else{
                echo "Số điện thoại này đã được đăng ký tài khoản. Đăng ký thất bại! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            } 
        }
    }
    else{
        require_once SITE_ROOT."/Views/sign-up.php";
    }
    
?>
            