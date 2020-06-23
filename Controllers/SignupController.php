<?php

    if($_GET['signup'] == 1)
    { 
        // đã ấn nút dky sau khi nhập phone,pass
        if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
            $phone = $_POST['inputPhone'];
            $pass= $_POST['inputPassword'];

            require_once SITE_ROOT."/Daos/UserDao.php";
            require_once SITE_ROOT."/Entities/Userr.php";
            require_once SITE_ROOT."/Daos/FriendDao.php";
            require_once SITE_ROOT."/Entities/Friend.php";
            require_once SITE_ROOT."/Daos/RoomDao.php";

            $userDao = new UserDao();
            $friendDao = new FriendDao();
            $roomDao = new RoomDao();
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
                    //echo("Dky thanh cong");
                    // add 2 tk ADMIN
                    $friendDao->AddFriend(new Friend($phone, '1122334455', ' '));
                    $friendDao->AddFriend(new Friend($phone, '2233445566', ' '));

                    $friendDao->updateStatusFriend(new Friend($phone, '1122334455', 'accept'));
                    $friendDao->updateStatusFriend(new Friend('1122334455', $phone, 'accept'));
                    $roomDao->InsertRoom($phone, '1122334455');
                    $friendDao->updateStatusFriend(new Friend($phone, '2233445566', 'accept'));
                    $friendDao->updateStatusFriend(new Friend('2233445566', $phone, 'accept'));
                    $roomDao->InsertRoom($phone, '2233445566');

                    require_once SITE_ROOT."/Views/sign-in.php";
                }
                else{
                    //echo("Dky fail");
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
            